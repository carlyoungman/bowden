var icons = (function() {
  var injection = function() {
    var baseURL = '/wp-content/themes/oconnorbowden/dist/assets/images/SVG/';
    $.get(baseURL + 'master.svg', function(data) {
      var div = document.createElement('div');
      div.className += 'master-svg';
      div.innerHTML = new XMLSerializer().serializeToString(
        data.documentElement
      );
      document.body.insertBefore(div, document.body.childNodes[0]);
    });
  };
  var init = function() {
    injection();
  };
  return { init: init };
})();
icons.init();
