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
        $driver->isLogged();
        $driver->index();
        break;
    case URL_SIGNIN:
        $sign->index();
        break;
    case URL_DRIVER_RESERVATION:
        $driver->reservation();
        break;
    case URL_MAKE_RESERVATION:
        $driver->makeReservation();
        break;
    case URL_DRIVER . '/logout':
        $driver->logout();
        break;
    case URL_DRIVER_PROFILE:
        $driver->profile();
        break;
    case URL_UPDATE_PROFILE:
        $driver->updateProfile();
        break;
    case URL_DRIVER_PROFILE_PASSWORD:
        $driver->changePassword();
        break;
    case URL_PROFILE_DELETE:
        $driver->deleteDriver();
        break;
    case URL_TREATMENT_REGISTER:
        $sign->signUp();
        break;
    case URL_REGISTER_SUCCESS:
        $sign->registerSuccess();
        break;
    case URL_TREATMENT_SIGNIN:
        $sign->signIn();
        break;
    case URL_SIGNIN_SUCCESS:
        $sign->signInSuccess();
        break;
    default:
        echo ('<p>Erreur 404 : Page introuvable</p>');
        break;
}