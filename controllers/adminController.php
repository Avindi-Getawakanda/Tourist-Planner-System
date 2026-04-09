<?php
require_once __DIR__ . '/../models/adminModel.php';
require_once __DIR__ . '/../models/placeModel.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'dashboard';

// Auth check
if ($action !== 'login' && $action !== 'do_login') {
    if (empty($_SESSION['admin_id'])) {
        header("Location: index.php?page=admin&action=login");
        exit;
    }
}

// Login POST
if ($action === 'do_login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin = findAdmin($_POST['username'] ?? '');
    if ($admin && verifyAdminPassword($_POST['password'] ?? '', $admin['password_hash'])) {
        $_SESSION['admin_id']   = $admin['admin_id'];
        $_SESSION['admin_user'] = $admin['username'];
        header("Location: index.php?page=admin");
        exit;
    }
    $login_error = "Invalid username or password.";
    require_once __DIR__ . '/../views/admin/login.php';
    exit;
}

// Logout
if ($action === 'logout') {
    session_destroy();
    header("Location: index.php?page=admin&action=login");
    exit;
}

// Dashboard
if ($action === 'dashboard' || $action === '') {
    $places     = getAllPlaces();
    $categories = getAllCategories();
    require_once __DIR__ . '/../views/admin/dashboard.php';
    exit;
}

// Show add form
if ($action === 'add') {
    $categories = getAllCategories();
    require_once __DIR__ . '/../views/admin/place_form.php';
    exit;
}

// Process add
if ($action === 'do_add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $img_path = 'assets/images/default.jpg';
    if (!empty($_FILES['image']['name'])) {
        $ext     = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        if (in_array($ext, $allowed)) {
            $filename = 'place_' . time() . '.' . $ext;
            $dest     = __DIR__ . '/../assets/images/' . $filename;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $dest)) {
                $img_path = 'assets/images/' . $filename;
            }
        }
    }
    $_POST['image_path'] = $img_path;
    insertPlace($_POST);
    header("Location: index.php?page=admin&saved=1");
    exit;
}

// Show edit form
if ($action === 'edit') {
    $place_id   = (int)($_GET['id'] ?? 0);
    $place      = getPlaceById($place_id);
    $categories = getAllCategories();
    require_once __DIR__ . '/../views/admin/place_form.php';
    exit;
}

// Process edit
if ($action === 'do_edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $place_id = (int)($_POST['place_id'] ?? 0);
    $place    = getPlaceById($place_id);
    $img_path = $place['image_path'];

    if (!empty($_FILES['image']['name'])) {
        $ext     = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        if (in_array($ext, $allowed)) {
            $filename = 'place_' . time() . '.' . $ext;
            $dest     = __DIR__ . '/../assets/images/' . $filename;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $dest)) {
                $img_path = 'assets/images/' . $filename;
            }
        }
    }
    $_POST['image_path'] = $img_path;
    updatePlace($place_id, $_POST);
    header("Location: index.php?page=admin&saved=1");
    exit;
}

// Delete
if ($action === 'delete') {
    deletePlace((int)($_GET['id'] ?? 0));
    header("Location: index.php?page=admin&deleted=1");
    exit;
}

require_once __DIR__ . '/../views/admin/login.php';