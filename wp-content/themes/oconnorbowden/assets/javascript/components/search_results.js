var searchResults = (function() {
  var addSearchTypeClass = function() {
    var className = $('.control-department input[type="radio"]:checked').val();
    $('body').addClass(className);

    let $newHomes = new URLSearchParams(window.location.search);

    if ($newHomes.has('new-homes')) {
      $('body')
        .removeClass('residential-lettings residential-sales')
        .addClass('residential-letting-new-homes');
    }
  };

  var setDefaultLayout = function() {
    if ($('.propertyhive-views .list-view').hasClass('active')) {
      $('body').addClass('list-layout');
    } else if ($('.propertyhive-views .grid-view').hasClass('active')) {
      $('body').addClass('grid-layout');
    } else if ($('.propertyhive-views .map-view').hasClass('active')) {
      $('body').addClass('map-layout');
    } else {
      $('body').addClass('list-layout');
    }
  };

  var init = function() {
    setDefaultLayout();

    addSearchTypeClass();
  };

  return { init: init };
})();

searchResults.init();
