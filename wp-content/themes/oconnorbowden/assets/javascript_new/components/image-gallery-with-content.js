const imageGalleryWithContent = (function () {
	const masterImage = function () {
		let backgroundImage;
		const section = document.querySelector('section.image-gallery-with-content');
		if (!section) return;

		const colSpans = section.querySelectorAll('.col-sm-3 span');
		const master = section.querySelector('.master');
		if (!colSpans || !master) return;

		const iconButton = master.querySelector('span.icon-button');
		if (!iconButton) return;

		colSpans.forEach((colSpan) => {
			colSpan.addEventListener('click', () => {
				backgroundImage = colSpan.getAttribute('data-image');
				master.style.backgroundImage = `url(${backgroundImage})`;
				setTimeout(() => {
					section.classList.add('show');
				}, 200);
			});
		});

		iconButton.addEventListener('click', () => {
			section.classList.remove('show');
		});

		section.classList.add('load');
	};

	const init = function () {
		masterImage();
	};

	return { init };
})();

imageGalleryWithContent.init();
