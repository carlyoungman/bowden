var SmoothScroll = require('SmoothScroll');

var gridBlock = (function() {
  var hideForms = function() {
    var $formID;

    $('.grid-item a').each(function() {
      $formID = $(this).attr('href');

      if ($formID.match('#')) {
        $($formID).hide();
      }
    });
  };

  var formScroll = function() {
    function closeForms() {
      $('.grid-item .form-link').removeClass('active');

      $('.spacer.open')
        .slideUp(400)

        .removeClass('open');
    }

    $('.grid-item .form-link').on('click', function(e) {
      var $formLink = $(this).attr('href');

      if (!$(this).is('.active')) {
        //    closeForms();

        $(this).addClass('active');

        $($formLink)
          .slideDown(400)

          .addClass('open');
      }
    });
  };

  var smoothScroll = function() {
    var scroll = new SmoothScroll('a[href*="#"]', {
      header: null,

      speed: 800,

      offset: 120,

      easing: 'easeInOutCubic'
    });
  };

  var init = function() {
    formScroll();

    smoothScroll();

    hideForms();
  };

  return { init: init };
})();

gridBlock.init();
