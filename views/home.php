<?php
require_once __DIR__ . '/../models/planModel.php';
require_once __DIR__ . '/../models/placeModel.php';
$plan_id    = getOrCreatePlan(session_id());
$plan_count = countPlanItems($plan_id);
$page_title = 'Home';
require_once __DIR__ . '/partials/header.php';
?>


<section class="hero" id="hero">
  <div class="hero__overlay"></div>
  <div class="hero__particles" id="heroParticles"></div>

  <div class="hero__content">
    <p class="hero__eyebrow">
      <span class="hero__line"></span>
      Sri Lanka &nbsp;·&nbsp; Kelaniya
      <span class="hero__line"></span>
    </p>
    <h1 class="hero__title">
      Your Perfect<br>
      <em class="hero__title-gold">Day Awaits</em>
    </h1>
    <p class="hero__sub">Ancient temples &nbsp;·&nbsp; Lush parks &nbsp;·&nbsp; Hidden escapes</p>
    <div class="hero__btns">
      <a href="index.php?page=places" class="btn-primary-gold">
        <i class="bi bi-compass"></i> Explore Places
      </a>
      <a href="index.php?page=plan" class="btn-outline-ivory">
        <i class="bi bi-calendar2-check"></i> My Plan
        <?php if ($plan_count > 0): ?>
          <span class="plan-badge"><?php echo $plan_count; ?></span>
        <?php endif; ?>
      </a>
    </div>
  </div>

  <div class="hero__scroll-cue">
    <span>Scroll</span>
    <div class="hero__scroll-line"></div>
  </div>
</section>


<section class="about reveal-section">
  <div class="about__inner">

    <div class="about__text">
      <p class="label-gold">About Kelaniya</p>
      <h2 class="about__heading">A Sacred Town<br>Worth Exploring</h2>
      <div class="about__divider"></div>
      <p class="about__body">
        Just minutes from Colombo, Kelaniya is home to one of Sri Lanka's most revered
        Buddhist temples — believed to have been visited by the Buddha himself. It is
        the gateway to some of the island's most memorable day trips: ancient shrines,
        lush riverside parks, world-class museums and golden beaches.
      </p>
      <p class="about__body">
        Whether you seek spirituality, nature, history or adventure, this
        sacred corner of Sri Lanka delivers it all.
      </p>
      <a href="index.php?page=places" class="btn-outline-navy">
        Discover All Places <i class="bi bi-arrow-right"></i>
      </a>
    </div>

    <div class="about__collage">
      <div class="collage__main reveal-img">
        <img src="assets/images/kelaniya_temple.jpg"
             onerror="this.src='assets/images/default.jpg'"
             alt="Kelaniya Temple">
        <div class="collage__caption">Kelaniya Raja Maha Vihara</div>
      </div>
      <div class="collage__stack">
        <div class="collage__sm reveal-img" style="--delay:0.15s">
          <img src="assets/images/gangaramaya.jpg"
               onerror="this.src='assets/images/default.jpg'"
               alt="Gangaramaya Temple">
          <div class="collage__caption">Gangaramaya Temple</div>
        </div>
        <div class="collage__sm reveal-img" style="--delay:0.3s">
          <img src="assets/images/beira_lake.jpg"
               onerror="this.src='assets/images/default.jpg'"
               alt="Beira Lake">
          <div class="collage__caption">Beira Lake, Colombo</div>
        </div>
      </div>
    </div>

  </div>
</section>


<section class="quote-section reveal-section">
  <div class="quote-section__inner">
    <div class="quote-ornament">
      <i class="bi bi-flower1"></i>
    </div>
    <div class="quote-rule"></div>
    <blockquote class="quote-text">
      "From sacred landmarks to hidden escapes, Kelaniya offers more than
      a destination — it offers a day worth remembering."
    </blockquote>
    <div class="quote-rule"></div>
    <div class="quote-ornament">
      <i class="bi bi-flower1"></i>
    </div>
  </div>
</section>


<section class="hiw reveal-section">
  <div class="hiw__inner">
    <div class="hiw__header">
      <p class="label-gold">How It Works</p>
      <h2 class="hiw__heading">Plan Beautifully,<br>Explore Effortlessly</h2>
    </div>

    <div class="hiw__steps">
      <div class="hiw__step reveal-card" style="--delay:0s">
        <div class="hiw__num">01</div>
        <div class="hiw__icon"><i class="bi bi-map"></i></div>
        <h5 class="hiw__title">Browse Places</h5>
        <p class="hiw__desc">Explore top attractions, filter by category, and find the places that inspire you.</p>
        <div class="hiw__connector"></div>
      </div>
      <div class="hiw__step hiw__step--featured reveal-card" style="--delay:0.12s">
        <div class="hiw__num">02</div>
        <div class="hiw__icon"><i class="bi bi-calendar2-check"></i></div>
        <h5 class="hiw__title">Build Your Plan</h5>
        <p class="hiw__desc">Add your favourite places to your itinerary and see estimated time and travel details.</p>
        <div class="hiw__connector"></div>
      </div>
      <div class="hiw__step reveal-card" style="--delay:0.24s">
        <div class="hiw__num">03</div>
        <div class="hiw__icon"><i class="bi bi-geo-alt"></i></div>
        <h5 class="hiw__title">Go Explore</h5>
        <p class="hiw__desc">Follow your plan and enjoy a seamless, unforgettable day in Kelaniya.</p>
      </div>
    </div>
  </div>
</section>


<section class="cats reveal-section">
  <div class="cats__inner">
    <div class="cats__header">
      <p class="label-gold">Explore by Category</p>
      <h2 class="cats__heading">Choose Your Kind<br>of Escape</h2>
    </div>

    <div class="cats__grid">
      <a href="index.php?page=places&category=1" class="cat-card reveal-card" style="--delay:0s">
        <img src="assets/images/kelaniya_temple.jpg"
             onerror="this.src='assets/images/default.jpg'" alt="Religious">
        <div class="cat-card__overlay"></div>
        <div class="cat-card__body">
          <i class="bi bi-moon-stars-fill cat-card__icon"></i>
          <h5 class="cat-card__title">Religious</h5>
          <p class="cat-card__desc">Sacred temples and spiritual places.</p>
          <span class="cat-card__link">Explore <i class="bi bi-arrow-right"></i></span>
        </div>
      </a>
      <a href="index.php?page=places&category=2" class="cat-card reveal-card" style="--delay:0.1s">
        <img src="assets/images/viharamahadevi.jpg"
             onerror="this.src='assets/images/default.jpg'" alt="Nature">
        <div class="cat-card__overlay"></div>
        <div class="cat-card__body">
          <i class="bi bi-tree-fill cat-card__icon"></i>
          <h5 class="cat-card__title">Nature</h5>
          <p class="cat-card__desc">Parks, gardens and natural beauty.</p>
          <span class="cat-card__link">Explore <i class="bi bi-arrow-right"></i></span>
        </div>
      </a>
      <a href="index.php?page=places&category=3" class="cat-card reveal-card" style="--delay:0.2s">
        <img src="assets/images/independence_hall.jpg"
             onerror="this.src='assets/images/default.jpg'" alt="Heritage">
        <div class="cat-card__overlay"></div>
        <div class="cat-card__body">
          <i class="bi bi-bank2 cat-card__icon"></i>
          <h5 class="cat-card__title">Heritage</h5>
          <p class="cat-card__desc">Historical sites and cultural landmarks.</p>
          <span class="cat-card__link">Explore <i class="bi bi-arrow-right"></i></span>
        </div>
      </a>
      <a href="index.php?page=places&category=4" class="cat-card reveal-card" style="--delay:0.3s">
        <img src="assets/images/colombo_museum.jpg"
             onerror="this.src='assets/images/default.jpg'" alt="Cultural">
        <div class="cat-card__overlay"></div>
        <div class="cat-card__body">
          <i class="bi bi-building cat-card__icon"></i>
          <h5 class="cat-card__title">Cultural</h5>
          <p class="cat-card__desc">Arts, museums and local experiences.</p>
          <span class="cat-card__link">Explore <i class="bi bi-arrow-right"></i></span>
        </div>
      </a>
    </div>

    <div class="cats__cta">
      <a href="index.php?page=places" class="btn-outline-navy">
        View All Places <i class="bi bi-arrow-right"></i>
      </a>
    </div>
  </div>
</section>


<section class="cta-banner reveal-section">
  <div class="cta-banner__overlay"></div>
  <div class="cta-banner__inner">
    <div class="cta-banner__icon"><i class="bi bi-compass"></i></div>
    <h2 class="cta-banner__heading">Ready to Discover Kelaniya?</h2>
    <p class="cta-banner__sub">Plan your perfect day and make memories that last a lifetime.</p>
    <a href="index.php?page=places" class="btn-primary-gold">
      Start Your Plan <i class="bi bi-arrow-right"></i>
    </a>
  </div>
</section>


<footer class="site-footer">
  <div class="site-footer__top">
    <div class="site-footer__inner">

      <div class="footer-col footer-col--brand">
        <div class="footer-logo">
          <i class="bi bi-map-fill"></i> Visit Kelaniya
        </div>
        <p class="footer-tagline">
          Your trusted travel companion for exploring the best places within 25 km of Kelaniya, Sri Lanka.
        </p>
        <div class="footer-social">
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-youtube"></i></a>
        </div>
      </div>

      <div class="footer-col">
        <h6 class="footer-col__title">Quick Links</h6>
        <ul class="footer-links">
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php?page=places">Places</a></li>
          <li><a href="index.php?page=plan">My Plan</a></li>
          <li><a href="#">About Kelaniya</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h6 class="footer-col__title">Categories</h6>
        <ul class="footer-links">
          <li><a href="index.php?page=places&category=1">Religious</a></li>
          <li><a href="index.php?page=places&category=2">Nature</a></li>
          <li><a href="index.php?page=places&category=3">Heritage</a></li>
          <li><a href="index.php?page=places&category=4">Cultural</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h6 class="footer-col__title">Contact</h6>
        <ul class="footer-links footer-links--contact">
          <li><i class="bi bi-geo-alt-fill"></i> Kelaniya, Sri Lanka</li>
          <li><i class="bi bi-telephone-fill"></i> +94 71 123 4567</li>
          <li><i class="bi bi-envelope-fill"></i> info@visitkelaniya.lk</li>
        </ul>
      </div>

    </div>
  </div>
  <div class="site-footer__bottom">
    <p>&copy; <?php echo date('Y'); ?> Visit Kelaniya. All rights reserved.</p>
  </div>
</footer>

<script src="assets/js/home.js"></script>
</body>
</html>