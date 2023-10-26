const injection = () => {
	const baseURL = '/wp-content/themes/oconnorbowden/dist/assets/images/SVG/';
	fetch(`${baseURL}master.svg`)
		.then((response) => response.text())
		.then((data) => {
			const div = document.createElement('div');
			div.classList.add('master-svg');
			div.innerHTML = data;
			document.body.insertBefore(div, document.body.firstChild);
		})
		.catch((error) => console.error(error));
};
injection();
