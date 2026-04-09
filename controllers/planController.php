<?php

require_once __DIR__ . '/../models/planModel.php';

$plan_id = getOrCreatePlan(session_id());
$action  = isset($_GET['action']) ? $_GET['action'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($action === 'add' && isset($_POST['place_id'])) {
        addToPlan($plan_id, (int)$_POST['place_id']);
        header("Location: index.php?page=details&id=" . (int)$_POST['place_id'] . "&added=1");
        exit;
    }

    if ($action === 'remove' && isset($_POST['item_id'])) {
        removeFromPlan((int)$_POST['item_id']);
        header("Location: index.php?page=plan");
        exit;
    }

    if ($action === 'clear') {
        clearPlan($plan_id);
        header("Location: index.php?page=plan");
        exit;
    }
}

$plan_items = getPlanItems($plan_id);
$plan_count = countPlanItems($plan_id);

require_once __DIR__ . '/../views/planner/plan.php';