<?php
session_start();

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {

    case 'places':
        require_once 'controllers/placeController.php';
        break;

    case 'details':
        require_once 'controllers/detailController.php';
        break;

    case 'plan':
        require_once 'controllers/planController.php';
        break;

    case 'admin':
        require_once 'controllers/adminController.php';
        break;

    default:
        require_once 'views/home.php';
        break;
}