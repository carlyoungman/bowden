const partners = (() => {
	const logoSwitch = () => {
		const partnerLogos = document.querySelectorAll('span.partner-logo');
		if (partnerLogos.length === 0) {
			return;
		}

		let random = Math.floor(Math.random() * partnerLogos.length);
		partnerLogos[random].classList.add('active');

		setInterval(() => {
			for (let i = 0; i < 1; i++) {
				random = Math.floor(Math.random() * partnerLogos.length);
				const activeLogo = document.querySelector('.partner-logo.active');
				activeLogo.classList.remove('active');
				partnerLogos[random].classList.add('active');
			}
		}, 2000);
	};

	const init = () => {
		logoSwitch();
	};

	return { init };
})();

partners.init();
