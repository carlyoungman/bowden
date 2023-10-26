function newMap($el) {
	const $markers = $el.find('.marker');

	const stylez = [
		{
			featureType: 'administrative',

			elementType: 'labels.text.fill',

			stylers: [
				{
					color: '#0c0b0b',
				},
			],
		},

		{
			featureType: 'landscape',

			elementType: 'all',

			stylers: [
				{
					color: '#f2f2f2',
				},
			],
		},

		{
			featureType: 'poi',

			elementType: 'all',

			stylers: [
				{
					visibility: 'off',
				},
			],
		},

		{
			featureType: 'road',

			elementType: 'all',

			stylers: [
				{
					saturation: -100,
				},

				{
					lightness: 45,
				},
			],
		},

		{
			featureType: 'road',

			elementType: 'labels.text.fill',

			stylers: [
				{
					color: '#090909',
				},
			],
		},

		{
			featureType: 'road.highway',

			elementType: 'all',

			stylers: [
				{
					visibility: 'simplified',
				},
			],
		},

		{
			featureType: 'road.arterial',

			elementType: 'labels.icon',

			stylers: [
				{
					visibility: 'off',
				},
			],
		},

		{
			featureType: 'transit',

			elementType: 'all',

			stylers: [
				{
					visibility: 'off',
				},
			],
		},

		{
			featureType: 'water',

			elementType: 'all',

			stylers: [
				{
					color: '#d4e4eb',
				},

				{
					visibility: 'on',
				},
			],
		},

		{
			featureType: 'water',

			elementType: 'geometry.fill',

			stylers: [
				{
					visibility: 'on',
				},

				{
					color: '#fef7f7',
				},
			],
		},

		{
			featureType: 'water',

			elementType: 'labels.text.fill',

			stylers: [
				{
					color: '#9b7f7f',
				},
			],
		},

		{
			featureType: 'water',

			elementType: 'labels.text.stroke',

			stylers: [
				{
					color: '#fef7f7',
				},
			],
		},
	];

	// consts

	const args = {
		zoom: 15,

		styles: stylez,

		scrollwheel: false,

		navigationControl: false,

		mapTypeControl: false,

		scaleControl: false,

		draggable: false,

		center: new google.maps.LatLng(0, 0),

		mapTypeId: google.maps.MapTypeId.ROADMAP,
	};

	// create map

	const map = new google.maps.Map($el[0], args);

	// add a markers reference

	map.markers = [];

	// add markers

	$markers.each(function () {
		addMarker($(this), map);
	});

	// center map

	center_map(map);

	// return

	return map;
}

function addMarker($marker, map) {
	const body = $('body');

	let iconBase;

	if (body.hasClass('gray')) {
		iconBase = '/wp-content/themes/oconnorbowden/dist/assets/images/raster/pin-gray.png';
	} else if (body.hasClass('green')) {
		iconBase = '/wp-content/themes/oconnorbowden/dist/assets/images/raster/pin-green.png';
	} else if (body.hasClass('blue')) {
		iconBase = '/wp-content/themes/oconnorbowden/dist/assets/images/raster/pin-blue.png';
	} else if (body.hasClass('yellow')) {
		iconBase = '/wp-content/themes/oconnorbowden/dist/assets/images/raster/pin-yellow.png';
	} else if (body.hasClass('orange')) {
		iconBase = '/wp-content/themes/oconnorbowden/dist/assets/images/raster/pin-orange.png';
	} else if (body.hasClass('purple')) {
		iconBase = '/wp-content/themes/oconnorbowden/dist/assets/images/raster/pin-purple.png';
	} else {
		iconBase = '/wp-content/themes/oconnorbowden/dist/assets/images/raster/pin-gray.png';
	}

	// const

	const latlng = new google.maps.LatLng(
		$marker.attr('data-lat'),

		$marker.attr('data-lng')
	);

	const markerLabel = 'GO!';

	// create marker

	const marker = new google.maps.Marker({
		position: latlng,

		map: map,

		icon: iconBase,

		animation: google.maps.Animation.DROP,
	});

	// add to array

	map.markers.push(marker);

	// if marker contains HTML, add it to an infoWindow

	if ($marker.html()) {
		// create info window

		const infowindow = new google.maps.InfoWindow({ content: $marker.html() });

		// show info window when marker is clicked

		google.maps.event.addListener(marker, 'click', function () {
			infowindow.open(map, marker);
		});
	}
}

function center_map(map) {
	// consts

	const bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds

	$.each(map.markers, function (i, marker) {
		const latlng = new google.maps.LatLng(
			marker.position.lat(),

			marker.position.lng()
		);

		bounds.extend(latlng);
	});

	// only 1 marker?

	if (map.markers.length === 1) {
		// set center of map

		map.setCenter(bounds.getCenter());

		map.setZoom(15);
	} else {
		// fit to bounds

		map.fitBounds(bounds);
	}
}

const map = null;

document.addEventListener('DOMContentLoaded', function () {
	var maps = document.querySelectorAll('.map');
	for (var i = 0; i < maps.length; i++) {
		var map = newMap(maps[i]);
	}
});
