<?php


require_once('config.php');

session_start();

// Setup the session variables and display errors if not set
if ($_GET['id']) {
    $_SESSION['id'] = $_GET['id'];
} else {
    echo "Direct Access is not allowed";
    exit();
}

if ($_GET['url']) {
    $_SESSION['url'] = $_GET['url'];
} else {
    $_SESSION['url'] = $ulrRedirect;
}
require_once('authorize.php');
?>

<script src="../../../js/jquery.min.js"></script>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ДонНУ Wi-Fi</title>
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../css/cover.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="../../../js/html5shiv.min.js"></script>
      <script src="../../../js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="fon" style="position: absolute; width: 100%; height: 100%; background-color: #000; display:none;">
        <div style="position: relative; top: 40%;">
            <p class="lead">Зачекайте, будь ласка</p><br><img src="380.gif"></div>
        </div>
    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">
                <div class="inner cover">
                    <h1 class="cover-heading">ДонНУ
                        <nobr>Wi-Fi</nobr>
                    </h1>
                    <h3>Безкоштовний Wi-Fi для студентів та викладачів ДонНУ</h3>
                    <p class="lead">Натисніть на кнопку нижче, щоб увійти під корпоративним обліковим записом ДонНУ</p>
                    <p class="lead">
                        <?php
                        
                        $as = new SimpleSAML_Auth_Simple('adfs-sp');
                        if(!$as->isAuthenticated()){
                            if($_POST){
                                if(!selectTypeUsers($_SESSION['id'], $clientParam, $vipUsers, $unifi, $arrVip)){
                                    $as->requireAuth();                               
                                } else {
                                    sendAuthorization($_SESSION['id'], $unifi, $arrVip);
                                    echo('<input type="hidden" id="urlRedirect" value="'.$_SESSION['url'].'"/><script>
        $(document).ready(function(){
            $("#fon").css("display", "block");
            setTimeout(function(){
              var urlRedirect = $("#urlRedirect").val();
              window.location.replace(urlRedirect);
            }, 6000);
        });
    </script>');
                                    //header("Location: ".$_SESSION['url']);
                                }
                            } else {
                                $sendURL = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                                echo('<form method=POST action="'.$sendURL.'">
                                     <input name="submit" type="submit" value="Підключитися" class="btn btn-lg btn-success">
                                     </form>');                                                                
                            }
                        } else {
                            sendAuthorization($_SESSION['id'], $unifi, $clientParam);
                            echo('<input type="hidden" id="urlRedirect" value="'.$_SESSION['url'].'"/><script>
        $(document).ready(function(){  
            $("#fon").css("display", "block");
            setTimeout(function(){
              var urlRedirect = $("#urlRedirect").val();
              window.location.replace(urlRedirect);
            }, 6000);
        });
    </script>');
                            //header("Location: ".$_SESSION['url']);
                        }
                        
                        ?>
                    </p>
                </div>
                <div class="mastfoot">
                    <div class="inner">
                        <p>
                            Служба техпідтримки:
                            <nobr>+380 (432) 50-89-49</nobr>
                            <nobr>(ПН-ПТ: 9:00 – 17:00)</nobr>,
                            <nobr>e-mail: <a href="mailto:support@donnu.edu.ua">support@donnu.edu.ua</a></nobr>
                        </p>
                        <p>                            
                            <nobr><img src="gsi.png" /> Розроблено в <a href="http://gsi.ms">GSI</a></nobr><br />
                            <nobr><img src="azure.png" /> Працює в Azure</nobr>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="../../../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../../js/ie10-viewport-bug-workaround.js"></script>
    <!--<script>
        $(document).ready(function(){    
            var urlRedirect = $('input[name = urlRedirect]').val();
            window.location.replace(urlRedirect);           
        });
    </script> -->
</body>
</html>
