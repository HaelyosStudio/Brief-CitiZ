<?php

require_once __DIR__ . '/Controllers/HomeController.php';
require_once __DIR__ . '/Controllers/DriverController.php';

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
    case URL_TREATMENT:
        break;
    default:
        echo ('<p>Erreur 404 : Page introuvable</p>');
        break;
}