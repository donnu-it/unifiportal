<?php

class Controller_Main extends Controller
{
    private $config;
    private $auth;
    private $portalName;
    private $unifiController;
    private $logging;

    function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
        $this->auth = new SimpleSAML_Auth_Simple('adfs-sp');
        $this->unifiController = new UnifiController();
        $this->logging = new Logging();
        $this->config = Config::get();
    }

    function action_index()
    {
        session_start();
        if ($_GET['id']) {
            $_SESSION['id'] = $_GET['id'];
        } else {
            echo "Direct Access is not allowed";
            exit();
        }
        if ($_GET['url']) {
            $_SESSION['url'] = $_GET['url'];
        } else {
            $_SESSION['url'] = $this->config['ulrRedirect'];
        }

        if ($_GET['ap']){
            $_SESSION['ap'] = $_GET['ap'];
        }

        $user = new User($_SESSION['id'],$this->portalName);
        $vipUserParam = $user::isVip();

        if (!$this->auth->isAuthenticated())
        {
            if ($_POST) {
                if($vipUserParam === false)
                {
                    $this->auth->requireAuth();

                } else {
                    $this->unifiController->sendAuthorization($_SESSION['id'],$this->portalName, $this->config[$this->portalName]['vipUsers'][$vipUserParam]);
                    $this->sendLog($vipUserParam);
                    header('Location:/redirect?url='.$_SESSION['url']);
                }
            }
        } else {
            $this->unifiController->sendAuthorization($_SESSION['id'],$this->portalName);
            $this->sendLog($vipUserParam);
            header('Location:/redirect?url='.$_SESSION['url']);
        }

        $this->view->generate('main_view.php','template_view.php');
    }

    private function sendLog($userParam)
    {
        if($userParam === false){
            $atr = $this->auth->getAttributes();
            $mail = $atr['mail'][0];
        } else {
            $mail = $this->config[$this->portalName]['vipUsers'][$userParam]['mail'];
        }

        $this->logging->createData($this->portalName, $_SESSION['ap'], $mail, $_SESSION['id']);
    }

    public function __call($method_name, $argument)
    {
        $args = preg_split('/(?<=\w)(?=[A-Z])/', $method_name);
        $action = array_shift($args);
        $property_name = strtolower(implode('_', $args));

        switch ($action)
        {
            case 'get':
                return isset($this->$property_name) ? $this->$property_name : null;

            case 'set':
                $this->$property_name = $argument[0];
                return $this;
        }
    }

    public function setPortalName($portalName)
    {
        $portalName = trim($portalName);
        if($portalName == ''){
            throw new Exception('Undefined portal name');
        }
        $this->portalName = $portalName;
        return $this;
    }

}