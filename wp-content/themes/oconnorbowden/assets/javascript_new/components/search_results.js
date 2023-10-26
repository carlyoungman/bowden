const searchResults = (() => {
	const addSearchTypeClass = () => {
		const radioInput = document.querySelector('.control-department input[type="radio"]:checked');
		if (radioInput) {
			const className = radioInput.value;
			const body = document.body;
			if (body) {
				body.classList.add(className);
			}
		}

		const params = new URLSearchParams(window.location.search);

		if (params.has('new-homes')) {
			document.body.classList.remove('residential-lettings', 'residential-sales');
			document.body.classList.add('residential-letting-new-homes');
		}
	};

	const setDefaultLayout = () => {
		const $listView = document.querySelector('.propertyhive-views .list-view');
		const $gridView = document.querySelector('.propertyhive-views .grid-view');
		const $mapView = document.querySelector('.propertyhive-views .map-view');
		if (
			$listView instanceof HTMLElement &&
			$gridView instanceof HTMLElement &&
			$mapView instanceof HTMLElement
		) {
			if ($listView.classList.contains('active')) {
				document.body.classList.add('list-layout');
			} else if ($gridView.classList.contains('active')) {
				document.body.classList.add('grid-layout');
			} else if ($mapView.classList.contains('active')) {
				document.body.classList.add('map-layout');
			} else {
				document.body.classList.add('list-layout');
			}
		}
	};

	const init = () => {
		setDefaultLayout();
		addSearchTypeClass();
	};

	return { init };
})();

searchResults.init();
