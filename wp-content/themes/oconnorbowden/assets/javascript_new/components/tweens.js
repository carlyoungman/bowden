import inview from 'inview';

const tweens = (function () {
	const waypoints = function () {
		window.addEventListener('scroll', function () {
			document.querySelectorAll('ul.list-content-block li').forEach(function (elem) {
				if (elem && inview(elem)) {
					elem.classList.add('fadeup');
				}
			});
		});
	};

	const scrollDown = function () {
		const arrowDown = document.querySelector('.arrow-down');
		if (arrowDown) {
			arrowDown.addEventListener('click', function () {
				const windowH = document.querySelector('.hero').offsetHeight;

				window.scrollTo({
					top: windowH,
					behavior: 'smooth',
				});
			});
		}
	};

	const scrollTop = function () {
		const backToTopIcon = document.querySelector('.back-to-top-icon .icon');
		if (backToTopIcon) {
			backToTopIcon.addEventListener('click', function () {
				window.scrollTo({
					top: 0,
					behavior: 'smooth',
				});
			});
		}
	};

	var animateText = function () {
		const animateElem = document.querySelector('h1.animate');
		if (animateElem) {
			setTimeout(function () {
				animateElem.classList.remove('animate');
			}, 600);
		}
	};

	const loadAnimation = function () {
		const mainElem = document.querySelector('main#main');
		if (mainElem) {
			mainElem.classList.add('loaded');
			setTimeout(function () {
				mainElem.classList.remove('loadin loaded');
			}, 1200);
		}
	};

	const init = function () {
		waypoints();
		animateText();
		scrollDown();
		scrollTop();
		loadAnimation();
	};

	return { init };
})();

document.addEventListener('DOMContentLoaded', function () {
	tweens.init();
});
