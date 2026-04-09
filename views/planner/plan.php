<?php
$page_title = 'My Day Plan';
require_once __DIR__ . '/../partials/header.php';

$items = [];
$total_fee = $total_duration = 0;
if ($plan_items) {
    while ($item = $plan_items->fetch_assoc()) {
        $items[]         = $item;
        $total_fee      += $item['entrance_fee'];
        $total_duration += $item['estimated_duration'];
    }
}
?>

<div class="container py-4">
  <h2 class="fw-bold text-success mb-1">
    <i class="bi bi-calendar2-check me-2"></i>My One-Day Plan
  </h2>
  <p class="text-muted mb-4">
    Build your perfect day by adding places from the
    <a href="index.php?page=places">Places page</a>.
  </p>

  <?php if (empty($items)): ?>
  <div class="text-center py-5">
    <i class="bi bi-calendar2-x display-3 text-muted"></i>
    <h4 class="mt-3 text-muted">Your plan is empty</h4>
    <p class="text-muted">Browse places and click "Add to My Plan".</p>
    <a href="index.php?page=places" class="btn btn-success mt-2">
      <i class="bi bi-search me-1"></i> Explore Places
    </a>
  </div>

  <?php else: ?>

  <div class="row g-3 mb-4">
    <div class="col-md-4">
      <div class="p-3 rounded-3 bg-success text-white text-center shadow-sm">
        <div class="fs-3 fw-bold"><?php echo count($items); ?></div>
        <div class="small">Places planned</div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="p-3 rounded-3 bg-warning text-dark text-center shadow-sm">
        <div class="fs-3 fw-bold"><?php echo round($total_duration / 60, 1); ?> hrs</div>
        <div class="small">Estimated duration</div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="p-3 rounded-3 bg-info text-white text-center shadow-sm">
        <div class="fs-3 fw-bold">LKR <?php echo number_format($total_fee); ?></div>
        <div class="small">Total entry fees</div>
      </div>
    </div>
  </div>

  <div class="list-group shadow-sm mb-4">
    <?php foreach ($items as $i => $item): ?>
    <div class="list-group-item d-flex gap-3 align-items-center py-3">
      <div class="fw-bold text-success fs-5"><?php echo $i + 1; ?></div>
      <img src="<?php echo htmlspecialchars($item['image_path']); ?>"
           class="rounded-3 plan-thumb"
           alt="<?php echo htmlspecialchars($item['place_name']); ?>"
           onerror="this.src='assets/images/default.jpg'">
      <div class="flex-grow-1">
        <div class="fw-semibold"><?php echo htmlspecialchars($item['place_name']); ?></div>
        <div class="small text-muted">
          <span class="me-3">
            <i class="bi bi-clock me-1"></i>
            <?php echo date('g:i A', strtotime($item['opening_time'])); ?> –
            <?php echo date('g:i A', strtotime($item['closing_time'])); ?>
          </span>
          <span class="me-3">
            <i class="bi bi-currency-rupee me-1"></i>
            <?php echo $item['entrance_fee'] > 0 ? 'LKR '.number_format($item['entrance_fee']) : 'Free'; ?>
          </span>
          <span>
            <i class="bi bi-hourglass me-1"></i><?php echo $item['estimated_duration']; ?> min
          </span>
        </div>
      </div>
      <div class="d-flex gap-2">
        <a href="index.php?page=details&id=<?php echo $item['place_id']; ?>"
           class="btn btn-sm btn-outline-success">
          <i class="bi bi-eye"></i>
        </a>
        <form action="index.php?page=plan&action=remove" method="POST">
          <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
          <button type="submit" class="btn btn-sm btn-outline-danger"
                  onclick="return confirm('Remove this place?')">
            <i class="bi bi-trash"></i>
          </button>
        </form>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <form action="index.php?page=plan&action=clear" method="POST" class="d-inline">
    <button type="submit" class="btn btn-outline-danger"
            onclick="return confirm('Clear your entire plan?')">
      <i class="bi bi-trash3 me-1"></i> Clear Plan
    </button>
  </form>
  <a href="index.php?page=places" class="btn btn-outline-success ms-2">
    <i class="bi bi-plus-circle me-1"></i> Add More Places
  </a>

  <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>