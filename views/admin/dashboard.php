<?php
$page_title = 'Admin Dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard | Visit Kelaniya</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-dark bg-dark px-4 d-flex justify-content-between">
  <span class="navbar-brand fw-bold">
    <i class="bi bi-shield-fill-check text-success me-2"></i>Admin Panel
  </span>
  <div class="d-flex align-items-center gap-3">
    <span class="text-white small">
      <i class="bi bi-person-circle me-1"></i>
      <?php echo htmlspecialchars($_SESSION['admin_user']); ?>
    </span>
    <a href="index.php?page=admin&action=logout" class="btn btn-sm btn-outline-light">
      <i class="bi bi-box-arrow-right me-1"></i>Logout
    </a>
    <a href="index.php" class="btn btn-sm btn-outline-success">
      <i class="bi bi-globe me-1"></i>View Site
    </a>
  </div>
</nav>

<div class="container py-4">

  <?php if (isset($_GET['saved'])): ?>
  <div class="alert alert-success alert-dismissible fade show">
    <i class="bi bi-check-circle-fill me-2"></i> Place saved successfully!
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  <?php endif; ?>

  <?php if (isset($_GET['deleted'])): ?>
  <div class="alert alert-warning alert-dismissible fade show">
    <i class="bi bi-trash-fill me-2"></i> Place deleted successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  <?php endif; ?>

  <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0"><i class="bi bi-geo-alt-fill text-success me-2"></i>Manage Places</h3>
    <a href="index.php?page=admin&action=add" class="btn btn-success">
      <i class="bi bi-plus-circle me-1"></i> Add New Place
    </a>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Image</th>
            <th>Place Name</th>
            <th>Category</th>
            <th>Fee (LKR)</th>
            <th>Distance</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          if ($places && $places->num_rows > 0):
            while ($row = $places->fetch_assoc()): ?>
          <tr>
            <td class="text-muted"><?php echo $i++; ?></td>
            <td>
              <img src="<?php echo htmlspecialchars($row['image_path']); ?>"
                   class="rounded-2" style="width:60px;height:45px;object-fit:cover;"
                   onerror="this.src='assets/images/default.jpg'"
                   alt="">
            </td>
            <td class="fw-semibold"><?php echo htmlspecialchars($row['place_name']); ?></td>
            <td><span class="badge bg-success-subtle text-success"><?php echo htmlspecialchars($row['category_name']); ?></span></td>
            <td><?php echo $row['entrance_fee'] > 0 ? number_format($row['entrance_fee']) : '<span class="text-muted">Free</span>'; ?></td>
            <td><?php echo $row['distance_from_kelaniya']; ?> km</td>
            <td class="text-center">
              <a href="index.php?page=details&id=<?php echo $row['place_id']; ?>"
                 class="btn btn-sm btn-outline-info me-1" target="_blank" title="View">
                <i class="bi bi-eye"></i>
              </a>
              <a href="index.php?page=admin&action=edit&id=<?php echo $row['place_id']; ?>"
                 class="btn btn-sm btn-outline-warning me-1" title="Edit">
                <i class="bi bi-pencil"></i>
              </a>
              <a href="index.php?page=admin&action=delete&id=<?php echo $row['place_id']; ?>"
                 class="btn btn-sm btn-outline-danger"
                 onclick="return confirm('Delete this place?')" title="Delete">
                <i class="bi bi-trash"></i>
              </a>
            </td>
          </tr>
          <?php endwhile;
          else: ?>
          <tr>
            <td colspan="7" class="text-center text-muted py-4">No places found.</td>
          </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>