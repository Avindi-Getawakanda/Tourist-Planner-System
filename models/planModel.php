<?php
require_once __DIR__ . '/../config/db.php';

function getOrCreatePlan($session_id) {
    global $conn;
    $sid = $conn->real_escape_string($session_id);
    $res = $conn->query("SELECT plan_id FROM visit_plans WHERE session_id='$sid' LIMIT 1");
    if ($res && $res->num_rows > 0) {
        return $res->fetch_assoc()['plan_id'];
    }
    $conn->query("INSERT INTO visit_plans (session_id) VALUES ('$sid')");
    return $conn->insert_id;
}

function getPlanItems($plan_id) {
    global $conn;
    $pid = (int)$plan_id;
    $sql = "SELECT pi.item_id, p.place_id, p.place_name, p.image_path,
                   p.opening_time, p.closing_time, p.entrance_fee,
                   p.estimated_duration, p.distance_from_kelaniya,
                   c.category_name
            FROM visit_plan_items pi
            JOIN places p     ON pi.place_id    = p.place_id
            JOIN categories c ON p.category_id  = c.category_id
            WHERE pi.plan_id = $pid
            ORDER BY pi.sort_order, pi.item_id";
    return $conn->query($sql);
}

function addToPlan($plan_id, $place_id) {
    global $conn;
    $pid  = (int)$plan_id;
    $plid = (int)$place_id;
    $check = $conn->query("SELECT item_id FROM visit_plan_items
                           WHERE plan_id=$pid AND place_id=$plid");
    if ($check && $check->num_rows > 0) return false; // already added
    return $conn->query("INSERT INTO visit_plan_items (plan_id, place_id)
                         VALUES ($pid, $plid)");
}

function removeFromPlan($item_id) {
    global $conn;
    $id = (int)$item_id;
    return $conn->query("DELETE FROM visit_plan_items WHERE item_id=$id");
}

function clearPlan($plan_id) {
    global $conn;
    $pid = (int)$plan_id;
    return $conn->query("DELETE FROM visit_plan_items WHERE plan_id=$pid");
}

function countPlanItems($plan_id) {
    global $conn;
    $pid = (int)$plan_id;
    $res = $conn->query("SELECT COUNT(*) AS cnt FROM visit_plan_items WHERE plan_id=$pid");
    return $res ? (int)$res->fetch_assoc()['cnt'] : 0;
}