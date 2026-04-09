// Auto-dismiss alerts 
document.addEventListener('DOMContentLoaded', function () {

  // Dismiss alerts after 4s
  document.querySelectorAll('.alert.alert-dismissible').forEach(function (alert) {
    setTimeout(function () {
      var a = bootstrap.Alert.getOrCreateInstance(alert);
      if (a) a.close();
    }, 4000);
  });

  //  Scroll animations 
  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15 });

  document.querySelectorAll('.animate-on-scroll').forEach(function (el) {
    observer.observe(el);
  });

});