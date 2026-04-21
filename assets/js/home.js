(function () {
  'use strict';

  
  document.body.classList.add('js-ready');


  var revealTargets = document.querySelectorAll(
    '.reveal-section, .reveal-img, .reveal-card'
  );

  if ('IntersectionObserver' in window) {
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    });

    revealTargets.forEach(function (el) {
      observer.observe(el);
    });
  } else {
    // Fallback: show everything immediately
    revealTargets.forEach(function (el) {
      el.classList.add('in-view');
    });
  }

  var navbar = document.querySelector('.navbar');
  if (navbar) {
    window.addEventListener('scroll', function () {
      if (window.scrollY > 70) {
        navbar.classList.add('navbar-shrunk');
      } else {
        navbar.classList.remove('navbar-shrunk');
      }
    }, { passive: true });
  }

  document.querySelectorAll('.alert.alert-dismissible').forEach(function (alert) {
    setTimeout(function () {
      if (typeof bootstrap !== 'undefined') {
        var a = bootstrap.Alert.getOrCreateInstance(alert);
        if (a) a.close();
      }
    }, 4000);
  });

})();