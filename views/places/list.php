<?php

require_once __DIR__ . '/../../models/planModel.php';
$plan_id    = getOrCreatePlan(session_id());
$plan_count = countPlanItems($plan_id);
$page_title = 'Explore Places';
require_once __DIR__ . '/../partials/header.php';
?>

<div class="container py-4">

  <div class="row align-items-center mb-4">
    <div class="col-md-6">
      <h2 class="fw-bold text-success">
        <i class="bi bi-geo-alt-fill me-2"></i>Explore Tourist Places
      </h2>
    </div>
    <div class="col-md-6">
      <form action="index.php" method="GET" class="d-flex gap-2">
        <input type="hidden" name="page" value="places">
        <input type="text" name="search" class="form-control"
               placeholder="Search places…"
               value="<?php echo htmlspecialchars($search ?? ''); ?>">
        <button class="btn btn-success px-3" type="submit">
          <i class="bi bi-search"></i>
        </button>
      </form>
    </div>
  </div>

  <!-- Category filter pills -->
  <div class="mb-4 d-flex flex-wrap gap-2">
    <a href="index.php?page=places"
       class="btn btn-sm <?php echo !$category_id ? 'btn-success' : 'btn-outline-success'; ?>">
      All
    </a>
    <?php $categories->data_seek(0); while ($cat = $categories->fetch_assoc()): ?>
    <a href="index.php?page=places&category=<?php echo $cat['category_id']; ?>"
       class="btn btn-sm <?php echo $category_id == $cat['category_id'] ? 'btn-success' : 'btn-outline-success'; ?>">
      <i class="bi <?php echo htmlspecialchars($cat['icon']); ?> me-1"></i>
      <?php echo htmlspecialchars($cat['category_name']); ?>
    </a>
    <?php endwhile; ?>
  </div>

  <!-- Places grid -->
  <div class="row g-4">
    <?php if ($places && $places->num_rows > 0):
      while ($row = $places->fetch_assoc()): ?>
    <div class="col-sm-6 col-lg-4">
      <div class="card h-100 shadow-sm border-0 place-card">
        <img src="<?php echo htmlspecialchars($row['image_path']); ?>"
             class="card-img-top place-thumb"
             alt="<?php echo htmlspecialchars($row['place_name']); ?>"
             onerror="this.src='assets/images/default.jpg'">
        <div class="card-body d-flex flex-column">
          <span class="badge bg-success-subtle text-success mb-2">
            <?php echo htmlspecialchars($row['category_name']); ?>
          </span>
          <h5 class="card-title fw-bold"><?php echo htmlspecialchars($row['place_name']); ?></h5>
          <p class="card-text text-muted small flex-grow-1">
            <?php echo htmlspecialchars(mb_substr($row['description'], 0, 120)) . '…'; ?>
          </p>
          <div class="d-flex justify-content-between text-muted small mb-3">
            <span>
              <i class="bi bi-clock me-1"></i>
              <?php echo date('g:i A', strtotime($row['opening_time'])); ?> –
              <?php echo date('g:i A', strtotime($row['closing_time'])); ?>
            </span>
            <span><i class="bi bi-geo me-1"></i><?php echo $row['distance_from_kelaniya']; ?> km</span>
          </div>
          <a href="index.php?page=details&id=<?php echo $row['place_id']; ?>"
             class="btn btn-success btn-sm w-100">View Details</a>
        </div>
      </div>
    </div>
    <?php endwhile;
    else: ?>
    <div class="col-12 text-center py-5">
      <i class="bi bi-search display-4 text-muted"></i>
      <p class="mt-3 text-muted">No places found. Try a different search or category.</p>
      <a href="index.php?page=places" class="btn btn-outline-success">Show All</a>
    </div>
    <?php endif; ?>
  </div>
</div>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>