<?php
$page_title = $place['place_name'];
require_once __DIR__ . '/../partials/header.php';
?>

<div class="container py-4">

  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="index.php?page=places">Places</a></li>
      <li class="breadcrumb-item active"><?php echo htmlspecialchars($place['place_name']); ?></li>
    </ol>
  </nav>

  <?php if (isset($_GET['added'])): ?>
  <div class="alert alert-success alert-dismissible fade show">
    <i class="bi bi-check-circle-fill me-2"></i>
    <strong><?php echo htmlspecialchars($place['place_name']); ?></strong> added to your day plan!
    <a href="index.php?page=plan" class="alert-link ms-2">View Plan →</a>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  <?php endif; ?>

  <div class="row g-4">
    <div class="col-lg-5">
      <img src="<?php echo htmlspecialchars($place['image_path']); ?>"
           class="img-fluid rounded-4 shadow w-100 detail-img"
           alt="<?php echo htmlspecialchars($place['place_name']); ?>"
           onerror="this.src='assets/images/default.jpg'">
    </div>

    <div class="col-lg-7">
      <span class="badge bg-success mb-2"><?php echo htmlspecialchars($place['category_name']); ?></span>
      <h1 class="fw-bold"><?php echo htmlspecialchars($place['place_name']); ?></h1>
      <p class="lead text-muted"><?php echo nl2br(htmlspecialchars($place['description'])); ?></p>

      <div class="row g-3 my-3">
        <div class="col-6 col-md-3">
          <div class="info-tile text-center p-3 rounded-3 bg-light">
            <i class="bi bi-clock text-success fs-4"></i>
            <div class="small mt-1 text-muted">Opens</div>
            <div class="fw-semibold"><?php echo date('g:i A', strtotime($place['opening_time'])); ?></div>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="info-tile text-center p-3 rounded-3 bg-light">
            <i class="bi bi-door-closed text-danger fs-4"></i>
            <div class="small mt-1 text-muted">Closes</div>
            <div class="fw-semibold"><?php echo date('g:i A', strtotime($place['closing_time'])); ?></div>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="info-tile text-center p-3 rounded-3 bg-light">
            <i class="bi bi-currency-rupee text-warning fs-4"></i>
            <div class="small mt-1 text-muted">Entry Fee</div>
            <div class="fw-semibold">
              <?php echo $place['entrance_fee'] > 0 ? 'LKR '.number_format($place['entrance_fee']) : 'Free'; ?>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="info-tile text-center p-3 rounded-3 bg-light">
            <i class="bi bi-geo-alt text-info fs-4"></i>
            <div class="small mt-1 text-muted">Distance</div>
            <div class="fw-semibold"><?php echo $place['distance_from_kelaniya']; ?> km</div>
          </div>
        </div>
      </div>

      <p class="text-muted small">
        <i class="bi bi-hourglass-split me-1"></i>
        Estimated visit: <strong><?php echo $place['estimated_duration']; ?> minutes</strong>
      </p>

      <?php if ($place['travel_tips']): ?>
      <div class="alert alert-warning">
        <i class="bi bi-lightbulb-fill me-2"></i>
        <strong>Travel Tips:</strong><br>
        <?php echo nl2br(htmlspecialchars($place['travel_tips'])); ?>
      </div>
      <?php endif; ?>

      <form action="index.php?page=plan&action=add" method="POST" class="d-inline">
        <input type="hidden" name="place_id" value="<?php echo $place['place_id']; ?>">
        <button type="submit" class="btn btn-success btn-lg me-2">
          <i class="bi bi-plus-circle me-1"></i> Add to My Plan
        </button>
      </form>
      <a href="index.php?page=places" class="btn btn-outline-secondary btn-lg">
        <i class="bi bi-arrow-left me-1"></i> Back
      </a>
    </div>
  </div>

 <?php if ($place['latitude'] && $place['longitude']): ?>
<div class="mt-5">
  <h4 class="fw-bold mb-3">
    <i class="bi bi-map me-2 text-success"></i>Location on Map
  </h4>
  <?php
    $lat = (float)$place['latitude'];
    $lng = (float)$place['longitude'];
  ?>
  <iframe
    class="rounded-4 shadow w-100"
    style="height: 350px; border: 0;"
    loading="lazy"
    allowfullscreen
    src="https://www.openstreetmap.org/export/embed.html?bbox=<?php echo ($lng-0.01).','.($lat-0.01).','.($lng+0.01).','.($lat+0.01); ?>&layer=mapnik&marker=<?php echo $lat.','.$lng; ?>">
  </iframe>
  <p class="mt-2 text-end">
    <a href="https://www.openstreetmap.org/?mlat=<?php echo $lat; ?>&mlon=<?php echo $lng; ?>#map=15/<?php echo $lat.'/'.$lng; ?>"
       target="_blank" class="small text-muted">
      <i class="bi bi-box-arrow-up-right me-1"></i>View larger map
    </a>
  </p>
</div>
<?php endif; ?>

</div>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>