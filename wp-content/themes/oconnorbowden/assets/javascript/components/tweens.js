var inview = require('inview');

var tweens = (function () {
  var waypoints = function () {
    // var itemQueue = [];

    // var delay = 200;

    // var queueTimer;

    //

    // function processItemQueue() {

    //   if (queueTimer) {

    //     return;

    //   }

    //   queueTimer = window.setInterval(function() {

    //     if (itemQueue.length) {

    //       $(itemQueue.shift()).addClass('fadeup');

    //       processItemQueue();

    //     } else {

    //       window.clearInterval(queueTimer);

    //       queueTimer = null;

    //     }

    //   }, delay);

    // }

    $(window).scroll(function () {
      $('ul.list-content-block li').each(function () {
        if ($('window').inview(this) === true) {
          $(this).addClass('fadeup');
        }
      });
    });
  };

  var scrollDown = function () {
    $('.arrow-down').on('click', function () {
      var windowH = $('.hero').height();

      $('html, body').animate(
        {
          scrollTop: windowH
        },

        'slow'
      );
    });
  };

  var scrollTop = function () {
    $('.back-to-top-icon .icon').on('click', function () {
      $('html, body').animate(
        {
          scrollTop: 0
        },

        'slow'
      );
    });
  };

  var animateText = function () {
    setTimeout(function () {
      $('h1.animate').removeClass('animate');
    }, 600);
  };


  const loadAnimation = function() {
    $('main#main').addClass('loaded');
    setTimeout(function() {
      $('main#main').removeClass('loadin loaded');
    }, 1200);
  };

  var init = function () {
    waypoints();
    animateText();
    scrollDown();
    scrollTop();
    loadAnimation();
  };

  return { init: init };
})();

tweens.init();
