<?php
$as = new SimpleSAML_Auth_Simple('adfs-sp');
if(!$as->isAuthenticated()){
    if($_POST){
        if(!selectTypeUsers($_SESSION['id'], $clientParam, $vipUsers, $unifi, $arrVip)){
            $as->requireAuth();
        } else {
            sendAuthorization($_SESSION['id'], $unifi, $arrVip);
            echo('<input type="hidden" id="urlRedirect" value="&apos;.$_SESSION[&apos;url&apos;].&apos;"><script src="../../../script/redirect.js">');
        }
    } else {
        $sendURL = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        echo('<form method=POST action="'.$sendURL.'">
                                            <input name="submit" type="submit" value="Підключитися" class="btn btn-lg btn-success">
                                         </form>');
    }
} else {
    sendAuthorization($_SESSION['id'], $unifi, $clientParam);
    echo('<input type="hidden" id="urlRedirect" value="'.$_SESSION['url'].'"/><script src="../../../script/redirect.js"/>');
}
?>