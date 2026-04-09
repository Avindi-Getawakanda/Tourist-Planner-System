<?php
require_once __DIR__ . '/../config/db.php';

function getAllPlaces($category_id = null) {
    global $conn;
    $sql = "SELECT p.*, c.category_name
            FROM places p
            JOIN categories c ON p.category_id = c.category_id
            WHERE p.is_active = 1";
    if ($category_id) {
        $cid = (int)$category_id;
        $sql .= " AND p.category_id = $cid";
    }
    $sql .= " ORDER BY p.place_name";
    return $conn->query($sql);
}

function getPlaceById($id) {
    global $conn;
    $id  = (int)$id;
    $sql = "SELECT p.*, c.category_name
            FROM places p
            JOIN categories c ON p.category_id = c.category_id
            WHERE p.place_id = $id AND p.is_active = 1";
    $result = $conn->query($sql);
    return $result ? $result->fetch_assoc() : null;
}

function getAllCategories() {
    global $conn;
    return $conn->query("SELECT * FROM categories ORDER BY category_name");
}

function searchPlaces($term) {
    global $conn;
    $term = $conn->real_escape_string($term);
    $sql  = "SELECT p.*, c.category_name
             FROM places p
             JOIN categories c ON p.category_id = c.category_id
             WHERE p.is_active = 1
               AND (p.place_name LIKE '%$term%' OR p.description LIKE '%$term%')
             ORDER BY p.place_name";
    return $conn->query($sql);
}

function insertPlace($data) {
    global $conn;
    $name  = $conn->real_escape_string($data['place_name']);
    $cat   = (int)$data['category_id'];
    $desc  = $conn->real_escape_string($data['description']);
    $open  = $conn->real_escape_string($data['opening_time']);
    $close = $conn->real_escape_string($data['closing_time']);
    $fee   = (float)$data['entrance_fee'];
    $dur   = (int)$data['estimated_duration'];
    $dist  = (float)$data['distance_from_kelaniya'];
    $tips  = $conn->real_escape_string($data['travel_tips']);
    $lat   = (float)$data['latitude'];
    $lng   = (float)$data['longitude'];
    $img   = $conn->real_escape_string($data['image_path']);

    $sql = "INSERT INTO places
            (place_name, category_id, description, opening_time, closing_time,
             entrance_fee, estimated_duration, distance_from_kelaniya, travel_tips,
             latitude, longitude, image_path)
            VALUES
            ('$name', $cat, '$desc', '$open', '$close',
             $fee, $dur, $dist, '$tips',
             $lat, $lng, '$img')";
    return $conn->query($sql) ? $conn->insert_id : false;
}

function updatePlace($id, $data) {
    global $conn;
    $id    = (int)$id;
    $name  = $conn->real_escape_string($data['place_name']);
    $cat   = (int)$data['category_id'];
    $desc  = $conn->real_escape_string($data['description']);
    $open  = $conn->real_escape_string($data['opening_time']);
    $close = $conn->real_escape_string($data['closing_time']);
    $fee   = (float)$data['entrance_fee'];
    $dur   = (int)$data['estimated_duration'];
    $dist  = (float)$data['distance_from_kelaniya'];
    $tips  = $conn->real_escape_string($data['travel_tips']);
    $lat   = (float)$data['latitude'];
    $lng   = (float)$data['longitude'];
    $img   = $conn->real_escape_string($data['image_path']);

    $sql = "UPDATE places SET
              place_name='$name', category_id=$cat, description='$desc',
              opening_time='$open', closing_time='$close',
              entrance_fee=$fee, estimated_duration=$dur,
              distance_from_kelaniya=$dist, travel_tips='$tips',
              latitude=$lat, longitude=$lng, image_path='$img'
            WHERE place_id=$id";
    return $conn->query($sql);
}

function deletePlace($id) {
    global $conn;
    $id = (int)$id;
    return $conn->query("UPDATE places SET is_active=0 WHERE place_id=$id");
}