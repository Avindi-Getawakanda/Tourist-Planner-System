<?php
$page_title = 'Admin Login';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | Visit Kelaniya</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-light">

<div class="d-flex align-items-center justify-content-center min-vh-100">
  <div class="card shadow border-0 rounded-4" style="width:100%;max-width:420px;">
    <div class="card-body p-5">
      <div class="text-center mb-4">
        <i class="bi bi-shield-lock-fill text-success display-4"></i>
        <h3 class="fw-bold mt-2">Admin Login</h3>
        <p class="text-muted small">Visit Kelaniya – Tourist Planner</p>
      </div>

      <?php if (!empty($login_error)): ?>
      <div class="alert alert-danger">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        <?php echo htmlspecialchars($login_error); ?>
      </div>
      <?php endif; ?>

      <form action="index.php?page=admin&action=do_login" method="POST">
        <div class="mb-3">
          <label class="form-label fw-semibold">Username</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" name="username" class="form-control"
                   placeholder="Enter username" required autofocus>
          </div>
        </div>
        <div class="mb-4">
          <label class="form-label fw-semibold">Password</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" name="password" class="form-control"
                   placeholder="Enter password" required>
          </div>
        </div>
        <button type="submit" class="btn btn-success w-100 fw-semibold">
          <i class="bi bi-box-arrow-in-right me-2"></i>Login
        </button>
      </form>
      <div class="text-center mt-3">
        <a href="index.php" class="text-muted small">← Back to website</a>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>