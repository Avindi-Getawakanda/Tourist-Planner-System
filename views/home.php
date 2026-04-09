<?php
require_once __DIR__ . '/../models/planModel.php';
require_once __DIR__ . '/../models/placeModel.php';
$plan_id    = getOrCreatePlan(session_id());
$plan_count = countPlanItems($plan_id);
$page_title = 'Home';
require_once __DIR__ . '/partials/header.php';
?>

<!-- ── HERO ─────────────────────────────────────────────────── -->
<section class="hero-section">
  <div class="hero-overlay"></div>
  <div class="hero-content text-center text-white">
    <p class="hero-sub animate-fade-up" style="animation-delay:0.1s">Sri Lanka • Kelaniya</p>
    <h1 class="hero-title animate-fade-up" style="animation-delay:0.3s">
      Your Perfect<br><span class="hero-highlight">Day Awaits</span>
    </h1>
    <p class="hero-desc animate-fade-up" style="animation-delay:0.5s">
      Ancient temples · Lush parks · Hidden beaches
    </p>
    <div class="hero-btns animate-fade-up" style="animation-delay:0.7s">
      <a href="index.php?page=places" class="btn btn-gold btn-lg px-5 py-3 me-2">
        <i class="bi bi-compass me-2"></i>Explore Places
      </a>
      <a href="index.php?page=plan" class="btn btn-outline-light btn-lg px-4 py-3">
        <i class="bi bi-calendar2-check me-2"></i>My Plan
      </a>
    </div>
  </div>
  <!-- Scroll arrow -->
  <div class="hero-scroll-arrow">
    <i class="bi bi-chevron-down"></i>
  </div>
</section>

<!-- ── STATS BAR ──────────────────────────────────────────────── -->
<section class="stats-bar">
  <div class="container">
    <div class="row text-center g-0">
      <div class="col-4">
        <div class="stat-item" data-count="10">
          <div class="stat-number" id="stat1">10+</div>
          <div class="stat-label">Tourist Spots</div>
        </div>
      </div>
      <div class="col-4">
        <div class="stat-item border-stat">
          <div class="stat-number">6</div>
          <div class="stat-label">Categories</div>
        </div>
      </div>
      <div class="col-4">
        <div class="stat-item">
          <div class="stat-number">Free</div>
          <div class="stat-label">Trip Planner</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── FEATURES + CTA ─────────────────────────────────────────── -->
<section class="features-section py-5">
  <div class="container">
    <div class="row g-4 align-items-center">

      <!-- Feature cards -->
      <div class="col-lg-7">
        <p class="section-eyebrow">Why Use This</p>
        <h2 class="section-heading mb-4">Plan Smarter,<br>Travel Better</h2>
        <div class="row g-3">
          <div class="col-sm-6">
            <div class="feat-card p-4 animate-on-scroll">
              <i class="bi bi-geo-alt-fill feat-icon mb-3"></i>
              <h6 class="fw-bold">Curated Places</h6>
              <p class="text-muted small mb-0">Hand-picked spots with real details — hours, fees, tips and maps.</p>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="feat-card p-4 animate-on-scroll" style="animation-delay:0.1s">
              <i class="bi bi-funnel-fill feat-icon mb-3"></i>
              <h6 class="fw-bold">Filter by Category</h6>
              <p class="text-muted small mb-0">Temples, beaches, parks, museums — find exactly what you want.</p>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="feat-card p-4 animate-on-scroll" style="animation-delay:0.2s">
              <i class="bi bi-map-fill feat-icon mb-3"></i>
              <h6 class="fw-bold">Live Maps</h6>
              <p class="text-muted small mb-0">See every place on an interactive map with your exact location.</p>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="feat-card p-4 animate-on-scroll" style="animation-delay:0.3s">
              <i class="bi bi-calendar2-check-fill feat-icon mb-3"></i>
              <h6 class="fw-bold">Day Planner</h6>
              <p class="text-muted small mb-0">Build your itinerary, track total costs and time — all in one place.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- CTA card -->
      <div class="col-lg-5">
        <div class="cta-card text-center p-5 animate-on-scroll">
          <i class="bi bi-map-fill cta-icon mb-3"></i>
          <h3 class="fw-bold text-white mb-2">Ready to Explore?</h3>
          <p class="text-white-50 mb-4">Browse 10+ handpicked destinations<br>and build your perfect day plan.</p>
          <a href="index.php?page=places" class="btn btn-gold btn-lg w-100 mb-3">
            <i class="bi bi-arrow-right-circle me-2"></i>Start Exploring
          </a>
          <a href="index.php?page=plan" class="btn btn-outline-light w-100">
            <i class="bi bi-calendar2-check me-2"></i>View My Plan
            <?php if ($plan_count > 0): ?>
              <span class="badge bg-warning text-dark ms-1"><?php echo $plan_count; ?></span>
            <?php endif; ?>
          </a>
        </div>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/partials/footer.php'; ?>