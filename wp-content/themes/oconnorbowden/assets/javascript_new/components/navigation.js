const navigation = (() => {
	const navShrink = () => {
		window.addEventListener('scroll', () => {
			const scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
			const body = document.body;

			if (scrollPosition > 100) {
				body.classList.add('scrolling');
			} else {
				body.classList.remove('scrolling');
			}
		});
	};

	const homeGroup = () => {
		const iconWrapper = document.querySelector('.icon-wrapper');
		const header = document.querySelector('header');

		if (iconWrapper instanceof HTMLElement && header instanceof HTMLElement) {
			iconWrapper.addEventListener('click', () => {
				header.classList.toggle('translate');
			});
		}
	};

	const mobileNav = () => {
		const mobileNavigation = document.querySelector('.mobile-navigation');

		if (mobileNavigation instanceof HTMLElement) {
			mobileNavigation.addEventListener('click', (event) => {
				const clickedElement = event.target;

				if (clickedElement.classList.contains('active')) {
					clickedElement.classList.remove('active');
					document.body.classList.remove(
						...document.body.classList.filter((className) => className.startsWith('show-'))
					);
				} else {
					const activeElements = document.querySelectorAll('.mobile-navigation .active');

					activeElements.forEach((element) => {
						element.classList.remove('active');
					});

					document.body.classList.remove(
						...document.body.classList.filter((className) => className.startsWith('show-'))
					);

					const dataClass = clickedElement.getAttribute('data-class');

					clickedElement.classList.add('active');
					document.body.classList.add(dataClass);
				}
			});
		}
	};

	const loadBrochure = () => {
		setTimeout(() => {
			const brochureButton = document.querySelector('.btn.brochure');
			brochureButton.classList.add('loaded');
		}, 1500);
	};

	const init = () => {
		navShrink();
		mobileNav();
		homeGroup();
		loadBrochure();
	};

	return { init };
})();

navigation.init();
