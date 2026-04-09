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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">
      <i class="bi bi-map-fill me-1"></i> Visit Kelaniya
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto align-items-center gap-1">
        <li class="nav-item">
          <a class="nav-link <?php echo $current_page==='home'   ? 'active' : ''; ?>" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $current_page==='places' ? 'active' : ''; ?>" href="index.php?page=places">Places</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $current_page==='plan'   ? 'active' : ''; ?>" href="index.php?page=plan">
            <i class="bi bi-calendar2-check"></i> My Plan
            <?php if ($plan_count > 0): ?>
              <span class="badge bg-warning text-dark"><?php echo $plan_count; ?></span>
            <?php endif; ?>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>