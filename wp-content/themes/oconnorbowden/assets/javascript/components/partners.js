var partners = (function() {
  var logoSwitch = function() {
    var $partnerLogos = $('.partner-logo');
    var random = Math.floor(Math.random() * $partnerLogos.length);
    $('.partner-logo')
      .eq(random)
      .addClass('active');
    setInterval(function() {
      for (var i = 0; i < 1; i++) {
        random = Math.floor(Math.random() * $partnerLogos.length);
        $('.partner-logo.active').removeClass('active');
        $('.partner-logo')
          .eq(random)
          .addClass('active');
      }
    }, 2000);
  };
  var init = function() {
    logoSwitch();
  };
  return { init: init };
})();
partners.init();
