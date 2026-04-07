<?php
require_once 'config/db.php';

function getAllPlaces() {
    global $conn;

    $sql = "SELECT * FROM places";
    $result = $conn->query($sql);

    return $result;
}