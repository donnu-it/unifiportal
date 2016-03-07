<?php

Class Controller_Redirect extends Controller
{
    public function action_index()
    {
        session_start();
        $this->view->generate('redirect_view.php','template_view.php');
    }
}