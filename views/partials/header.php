<?php
$plan_count   = isset($plan_count) ? $plan_count : 0;
$current_page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($page_title) ? htmlspecialchars($page_title).' | ' : ''; ?>Visit Kelaniya</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Base styles (navbar, footer, shared) -->
  <link rel="stylesheet" href="assets/css/main.css">
  <!-- Page-specific styles -->
  <?php if ($current_page === 'home'): ?>
    <link rel="stylesheet" href="assets/css/home.css">
  <?php elseif ($current_page === 'places' || $current_page === 'details'): ?>
    <link rel="stylesheet" href="assets/css/places.css">
  <?php elseif ($current_page === 'plan'): ?>
    <link rel="stylesheet" href="assets/css/plan.css">
  <?php endif; ?>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <i class="bi bi-map-fill me-1"></i>Visit Kelaniya
    </a>
    <button class="navbar-toggler border-0" type="button"
            data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto align-items-center gap-1">
        <li class="nav-item">
          <a class="nav-link <?php echo $current_page==='home' ? 'active':''; ?>"
             href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $current_page==='places' ? 'active':''; ?>"
             href="index.php?page=places">Places</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $current_page==='plan' ? 'active':''; ?>"
             href="index.php?page=plan">
            <i class="bi bi-calendar2-check me-1"></i>My Plan
            <?php if ($plan_count > 0): ?>
              <span class="badge bg-gold ms-1"><?php echo $plan_count; ?></span>
            <?php endif; ?>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>