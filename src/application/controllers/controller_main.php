<?php

class Controller_Main extends Controller
{
    private $config;
    private $auth;

    function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
        $this->auth = new SimpleSAML_Auth_Simple('adfs-sp');
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
        if (!$this->auth->isAuthenticated())
        {
            if ($_POST) {
                $this->auth->requireAuth();
            }
        } else {
            $this->model->unificontroller->sendAuthorization();
        }

        $this->view->generate('main_view.php','template_view.php');
    }
}