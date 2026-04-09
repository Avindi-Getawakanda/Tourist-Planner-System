<?php
$is_edit    = isset($place) && $place;
$page_title = $is_edit ? 'Edit Place' : 'Add Place';
$action_url = $is_edit
    ? "index.php?page=admin&action=do_edit"
    : "index.php?page=admin&action=do_add";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $page_title; ?> | Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark px-4 mb-4">
  <span class="navbar-brand fw-bold">
    <i class="bi bi-shield-fill-check text-success me-2"></i>
    <?php echo $page_title; ?>
  </span>
  <a href="index.php?page=admin" class="btn btn-sm btn-outline-light">
    <i class="bi bi-arrow-left me-1"></i> Back to Dashboard
  </a>
</nav>

<div class="container" style="max-width:760px;">
  <div class="card border-0 shadow-sm rounded-4 p-4">

    <form action="<?php echo $action_url; ?>" method="POST" enctype="multipart/form-data">

      <?php if ($is_edit): ?>
      <input type="hidden" name="place_id" value="<?php echo $place['place_id']; ?>">
      <?php endif; ?>

      <div class="row g-3">

        <div class="col-md-8">
          <label class="form-label fw-semibold">Place Name *</label>
          <input type="text" name="place_name" class="form-control" required
                 value="<?php echo $is_edit ? htmlspecialchars($place['place_name']) : ''; ?>">
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Category *</label>
          <select name="category_id" class="form-select" required>
            <option value="">Select…</option>
            <?php while ($cat = $categories->fetch_assoc()): ?>
            <option value="<?php echo $cat['category_id']; ?>"
              <?php echo ($is_edit && $place['category_id'] == $cat['category_id']) ? 'selected' : ''; ?>>
              <?php echo htmlspecialchars($cat['category_name']); ?>
            </option>
            <?php endwhile; ?>
          </select>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Description</label>
          <textarea name="description" class="form-control" rows="3"><?php
            echo $is_edit ? htmlspecialchars($place['description']) : '';
          ?></textarea>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Opening Time</label>
          <input type="time" name="opening_time" class="form-control"
                 value="<?php echo $is_edit ? $place['opening_time'] : ''; ?>">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Closing Time</label>
          <input type="time" name="closing_time" class="form-control"
                 value="<?php echo $is_edit ? $place['closing_time'] : ''; ?>">
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Entrance Fee (LKR)</label>
          <input type="number" name="entrance_fee" class="form-control" min="0" step="0.01"
                 value="<?php echo $is_edit ? $place['entrance_fee'] : '0'; ?>">
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Est. Duration (min)</label>
          <input type="number" name="estimated_duration" class="form-control" min="1"
                 value="<?php echo $is_edit ? $place['estimated_duration'] : '60'; ?>">
        </div>

        <div class="col-md-4">
          <label class="form-label fw-semibold">Distance from Kelaniya (km)</label>
          <input type="number" name="distance_from_kelaniya" class="form-control"
                 min="0" step="0.1"
                 value="<?php echo $is_edit ? $place['distance_from_kelaniya'] : ''; ?>">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Latitude</label>
          <input type="number" name="latitude" class="form-control" step="any"
                 value="<?php echo $is_edit ? $place['latitude'] : ''; ?>">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Longitude</label>
          <input type="number" name="longitude" class="form-control" step="any"
                 value="<?php echo $is_edit ? $place['longitude'] : ''; ?>">
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Travel Tips</label>
          <textarea name="travel_tips" class="form-control" rows="2"><?php
            echo $is_edit ? htmlspecialchars($place['travel_tips']) : '';
          ?></textarea>
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Place Image</label>
          <?php if ($is_edit && $place['image_path']): ?>
          <div class="mb-2">
            <img src="<?php echo htmlspecialchars($place['image_path']); ?>"
                 style="height:80px;border-radius:8px;object-fit:cover;"
                 onerror="this.src='assets/images/default.jpg'" alt="Current image">
            <small class="text-muted ms-2">Current image</small>
          </div>
          <?php endif; ?>
          <input type="file" name="image" class="form-control" accept="image/*">
          <div class="form-text">Accepted: jpg, jpeg, png, webp. Leave empty to keep current image.</div>
        </div>

        <div class="col-12 d-flex gap-2 pt-2">
          <button type="submit" class="btn btn-success px-4">
            <i class="bi bi-save me-1"></i>
            <?php echo $is_edit ? 'Update Place' : 'Add Place'; ?>
          </button>
          <a href="index.php?page=admin" class="btn btn-outline-secondary">Cancel</a>
        </div>

      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>