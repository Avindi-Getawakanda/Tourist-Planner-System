<?php
require_once __DIR__ . '/../models/placeModel.php';

$category_id = isset($_GET['category']) ? (int)$_GET['category'] : null;
$search      = isset($_GET['search'])   ? trim($_GET['search'])   : '';

if ($search !== '') {
    $places = searchPlaces($search);
} else {
    $places = getAllPlaces($category_id);
}

$categories = getAllCategories();

require_once __DIR__ . '/../views/places/list.php';