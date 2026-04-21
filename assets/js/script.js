document.addEventListener('DOMContentLoaded', function () {

  // ── Enable scroll animations ─────────────────────────────
  document.body.classList.add('js-loaded');

  // ── Scroll observer ──────────────────────────────────────
  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });

  document.querySelectorAll('.animate-on-scroll').forEach(function (el) {
    observer.observe(el);
  });

  // ── Auto-dismiss alerts ──────────────────────────────────
  document.querySelectorAll('.alert.alert-dismissible').forEach(function (alert) {
    setTimeout(function () {
      var a = bootstrap.Alert.getOrCreateInstance(alert);
      if (a) a.close();
    }, 4000);
  });

  // ── Navbar shrink on scroll ──────────────────────────────
  window.addEventListener('scroll', function () {
    var navbar = document.querySelector('.navbar');
    if (navbar) {
      if (window.scrollY > 60) {
        navbar.classList.add('navbar-shrunk');
      } else {
        navbar.classList.remove('navbar-shrunk');
      }
    }
  });

});