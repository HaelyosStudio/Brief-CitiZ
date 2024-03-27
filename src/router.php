<?php

require_once __DIR__ . '/Controllers/HomeController.php';
require_once __DIR__ . '/Controllers/DriverController.php';
require_once __DIR__ . '/Controllers/SignController.php';

$home = new HomeController();
$driver = new DriverController();
$sign = new SignController();

$route = $_SERVER['REQUEST_URI'];

switch ($route) {
    case URL_HOMEPAGE:
        $home->index();
        break;
    case URL_DRIVER:
        $driver->index();
        break;
    case URL_SIGNIN:
        $sign->index();
        break;
    case URL_TREATMENT_REGISTER:
        $sign->signUp();
        break;
    case URL_REGISTER_SUCCESS:
        $sign->registerSuccess();
        break;
    case URL_REGISTER_ERROR:
        $home->index();
        break;
    case URL_TREATMENT_SIGNIN:
        $sign->signIn();
    default:
        echo ('<p>Erreur 404 : Page introuvable</p>');
        break;
}