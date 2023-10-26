import SmoothScroll from '../../../node_modules/smooth-scroll/dist/js/smooth-scroll.js';

const gridBlock = (() => {
	const hideForms = () => {
		const formLinks = document.querySelectorAll('.grid-item a');
		formLinks.forEach((formLink) => {
			const formId = formLink.getAttribute('href');
			if (formId.match('#')) {
				document.querySelector(formId).style.display = 'none';
			}
		});
	};

	const formScroll = () => {
		const formLinks = document.querySelectorAll('.grid-item .form-link');
		const closeForms = () => {
			const formLinks = document.querySelectorAll('.grid-item .form-link');
			formLinks.forEach((formLink) => formLink.classList.remove('active'));

			const spacers = document.querySelectorAll('.spacer.open');
			spacers.forEach((spacer) => {
				spacer.style.display = 'none';
				spacer.classList.remove('open');
			});
		};

		formLinks.forEach((formLink) => {
			formLink.addEventListener('click', function (e) {
				const formId = this.getAttribute('href');
				if (!this.classList.contains('active')) {
					closeForms();

					this.classList.add('active');
					document.querySelector(formId).style.display = 'block';
					document.querySelector(formId).classList.add('open');
				}
			});
		});
	};

	const smoothScroll = () => {
		const scroll = new SmoothScroll('a[href*="#"]', {
			header: null,
			speed: 800,
			offset: 120,
			easing: 'easeInOutCubic',
		});
	};

	const init = () => {
		formScroll();
		smoothScroll();
		hideForms();
	};

	return { init };
})();

gridBlock.init();
