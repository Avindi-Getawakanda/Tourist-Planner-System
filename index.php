<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {

    case 'places':
        require_once 'controllers/placeController.php';
        break;

    default:
        echo "<h1>Welcome to Tourist Planner</h1>";
        echo "<a href='?page=places'>View Places</a>";
        break;
}