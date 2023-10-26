const slick = require('slick');

const sliders = (function() {
  const homeSlider = function() {
    $('.site-slider').each(function() {
      $(this).slick({
        slidesToShow: 1,

        slidesToScroll: 1,

        autoplay: false,

        speed: 600,

        dots: false,

        arrows: false,

        infinite: true,

        fade: true,

        cssEase: 'ease',

        centerMode: true,

        focusOnSelect: true,

        pauseOnHover: false
      });
    });

    function activate() {
      $('.site-slider')
        .eq([Math.floor(Math.random() * $('.site-slider').length)])

        .slick('slickNext');

      setTimeout(activate, 3000);
    }

    activate();
  };

  const heroSlider = function() {
    $('section.hero.slider').slick({
      slidesToShow: 1,

      slidesToScroll: 1,

      autoplay: true,

      autoplaySpeed: 6000,

      speed: 600,

      dots: false,

      arrows: false,

      infinite: true,

      fade: true,

      cssEase: 'ease',

      centerMode: true,

      adaptiveHeight: true,

      focusOnSelect: true,

      pauseOnHover: false
    });
  };

  const propertySlider = function() {
    $('.single-property .main-slider').slick({
      slidesToShow: 1,

      slidesToScroll: 1,

      autoplay: true,

      autoplaySpeed: 8000,

      adaptiveHeight: true,

      dots: false,

      arrows: true,

      fade: true,

      cssEase: 'ease',

      asNavFor: '.single-property .thumbnails'
    });
  };

  const propertySiderNav = function() {
    $('.single-property .thumbnails').slick({
      slidesToShow: 4,

      slidesToScroll: 4,

      asNavFor: '.single-property .main-slider',

      centerMode: true,

      arrows: false,

      focusOnSelect: true,

      responsive: [
        {
          breakpoint: 768,

          settings: {
            slidesToShow: 1
          }
        },

        {
          breakpoint: 992,

          settings: {
            slidesToShow: 3
          }
        }
      ]
    });
  };

  const sliderNavigation = function() {
    $('.images-overlay .arrow-left').on('click', function() {
      $('.single-property .main-slider').slick('slickPrev');
    });

    $('.images-overlay .arrow-right').on('click', function() {
      $('.single-property .main-slider').slick('slickNext');
    });
  };

  const floorPlanSlider = function() {
    $('.panel-slides').each(function() {
      $(this).slick({
        slidesToShow: 1,

        slidesToScroll: 1,

        dots: true,

        arrows: true,

        preconstrow:
          '<div class="slick-nav icon-button slick-prev"><svg class="icon icon-s arrow-left"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow-up"></use></svg></div>',

        nextArrow:
          '<div class="slick-nav icon-button slick-next"><svg class="icon icon-s arrow-right"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow-up"></use></svg></div>'
      });
    });
  };

  const officeSlider = function() {
    $('.office-slider').slick({
      slidesToShow: 1,

      slidesToScroll: 1,

      autoplay: true,

      autoplaySpeed: 8000,

      dots: false,

      arrows: false,

      fade: true,

      cssEase: 'ease',

      asNavFor: '.office-slider-nav'
    });
  };

  const officeSliderNav = function() {
    $('.office-slider-nav').slick({
      slidesToShow: 4,

      slidesToScroll: 1,

      asNavFor: '.office-slider',

      centerMode: true,

      arrows: false,

      focusOnSelect: true
    });
  };

  const init = function() {
    heroSlider();

    propertySlider();

    propertySiderNav();

    sliderNavigation();

    floorPlanSlider();

    homeSlider();

    officeSlider();

    officeSliderNav();
  };

  return { init: init };
})();

sliders.init();
