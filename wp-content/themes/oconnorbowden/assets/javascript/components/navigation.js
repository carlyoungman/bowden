var navigation = (function() {
  var navShrink = function() {
    $(window).scroll(function() {
      var scrollPosition = $(this).scrollTop();

      if (scrollPosition > 100) {
        $('body').addClass('scrolling');
      } else {
        $('body').removeClass('scrolling');
      }
    });
  };

  var homeGroup = function() {
    $('.icon-wrapper .group-icon').on('click', function() {
      $('header').toggleClass('translate');
    });
  };

  var mobileNav = function() {
    var dataClass;

    $('.mobile-navigation li').on('click', function() {
      if ($(this).hasClass('active')) {
        $(this).removeClass('active');

        $('body').removeClass(function(index, className) {
          return (className.match(/(^|\s)show-\S+/g) || []).join(' ');
        });
      } else {
        $('.mobile-navigation li').removeClass('active');

        $('body').removeClass(function(index, className) {
          return (className.match(/(^|\s)show-\S+/g) || []).join(' ');
        });

        dataClass = $(this).attr('data-class');

        $(this).toggleClass('active');

        $('body').toggleClass(dataClass);
      }
    });
  };

  var loadBrochure = function() {
    setTimeout(function() {
      $('.btn.brochure').addClass('loaded');
    }, 1500);
  };
  var init = function() {
    navShrink();
    mobileNav();
    homeGroup();
    loadBrochure();
  };

  return { init: init };
})();

navigation.init();
