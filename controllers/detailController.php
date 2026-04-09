<?php
require_once __DIR__ . '/../models/placeModel.php';
require_once __DIR__ . '/../models/planModel.php';

$id    = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$place = getPlaceById($id);

if (!$place) {
    header("Location: index.php?page=places");
    exit;
}


$plan_id    = getOrCreatePlan(session_id());
$plan_count = countPlanItems($plan_id);

require_once __DIR__ . '/../views/places/details.php';