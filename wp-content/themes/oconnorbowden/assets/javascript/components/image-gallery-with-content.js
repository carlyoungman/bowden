let imageGalleryWithContent = (function() {
  let masterImage = function() {
    let backgroundImage;
    const $section = $('section.image-gallery-with-content');

    $section.find('.col-sm-3 span').on('click', function() {
      backgroundImage = $(this).attr('data-image');
      $section
        .find('.master')
        .css('background-image', 'url(' + backgroundImage + ')');
      setTimeout(function() {
        $section.addClass('show');
      }, 200);
    });

    $('.master span.icon-button').on('click', function() {
      $section.removeClass('show');
    });
    $section.addClass('load');
  };

  let init = function() {
    masterImage();
  };

  return { init: init };
})();

imageGalleryWithContent.init();
