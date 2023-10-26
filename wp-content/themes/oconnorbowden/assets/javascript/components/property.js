var property = (function() {
  var propertyActionNav = function() {
    $('.property_actions li').on('click', function() {
      $('.property_actions li.active').removeClass('active');
      $(this).addClass('active');
      showPanel();
    });
  };
  var propertyActionNavHoverEffect = function() {
    $('.property_actions').on({
      mouseenter: function() {
        $('.property_actions li.active').addClass('hover');
      },
      mouseleave: function() {
        $('.property_actions li.active').removeClass('hover');
      }
    });
  };
  var showPanel = function() {
    var current = $('.property_actions li.active').attr('data-link');
    $('.property-panel li.active').removeClass('active');
    $('.property-panel')
      .find("[data-panel='" + current + "']")
      .addClass('active');
  };
  var searchSwitchWidth = function() {
    var widthItem;
    widthItem = $(
      '.full-width-search .property-search-form .control:visible'
    ).outerWidth();
    $('.full-width-search ul.search-switch').css('min-width', widthItem + 'px');
    $(window).resize(function() {
      widthItem = $('.property-search-form .control:visible').outerWidth();
      $('.full-width-search ul.search-switch').css(
        'min-width',
        widthItem + 'px'
      );
    });
  };
  var searchSwitchMove = function() {
    $('.search-switch li').on('click', function() {
      var $this = $(this);
      switchSearchOptions();
      if (!$this.hasClass('active')) {
        $('.search-switch li').removeClass('active');
        $this.addClass('active');
        if ($this.is(':first-child')) {
          $this
            .parent()
            .removeClass('right')
            .addClass('left');
          $('.free-text-search span').text('Properties for sale');
        } else {
          $this
            .parent()
            .removeClass('left')
            .addClass('right');
          $('.free-text-search span').text('Properties for rent');
        }
      }
    });
  };
  var switchSearchOptions = function() {
    var $option = $('.control-department input[type="radio"]').not(':checked');
    $option.click();
  };
  var cloneActions = function() {
    $('.more-property-actions .drop-down a').on('click', function(e) {
      e.preventDefault();
      $(this)
        .toggleClass('active')
        .next('*')
        .slideToggle();
    });
  };
  var viewShortList = function() {
    if (document.cookie.indexOf('propertyhive_shortlist=') >= 0) {
      $('.view-short-list').addClass('show');
      $('.mobile-navigation li.shortlist-icon').addClass('show');
    }
  };
  var init = function() {
    propertyActionNav();
    propertyActionNavHoverEffect();
    searchSwitchWidth();
    searchSwitchMove();
    cloneActions();
    viewShortList();
  };
  return { init: init };
})();
property.init();
