<?php
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
require_once 'classes/config.php';
require_once 'classes/unificontroller.php';
require_once 'classes/user.php';
require_once 'classes/logging.php';
require_once "$_SERVER[DOCUMENT_ROOT]/simplesamlphp/lib/_autoload.php";
require_once "$_SERVER[DOCUMENT_ROOT]/vendor/autoload.php";
Route::start();