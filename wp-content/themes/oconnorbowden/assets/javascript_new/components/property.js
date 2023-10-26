const property = (() => {
	const propertyActions = document.querySelectorAll('.property_actions li');
	const propertyPanels = document.querySelectorAll('.property-panel li');
	const searchSwitch = document.querySelectorAll('.search-switch li');
	const shortList = document.querySelector('.view-short-list');

	const propertyActionNav = () => {
		propertyActions.forEach((action) => {
			action.addEventListener('click', () => {
				propertyActions.forEach((active) => {
					active.classList.remove('active');
				});
				action.classList.add('active');
				showPanel();
			});
		});
	};

	const propertyActionNavHoverEffect = () => {
		const active = document.querySelector('.property_actions li.active');
		const propertyActionsElement = document.querySelector('.property_actions');

		if (active && propertyActionsElement) {
			propertyActionsElement.addEventListener('mouseenter', () => {
				active.classList.add('hover');
			});

			propertyActionsElement.addEventListener('mouseleave', () => {
				active.classList.remove('hover');
			});
		}
	};

	const showPanel = () => {
		const current = document.querySelector('.property_actions li.active').getAttribute('data-link');

		propertyPanels.forEach((panel) => {
			panel.classList.remove('active');
		});

		const currentPanel = document.querySelector(`.property-panel [data-panel="${current}"]`);
		currentPanel.classList.add('active');
	};

	const searchSwitchWidth = () => {
		const control = document.querySelector('.full-width-search .property-search-form .control');
		const searchSwitch = document.querySelector('.full-width-search ul.search-switch');

		if (
			control &&
			searchSwitch &&
			getComputedStyle(control).display !== 'none' &&
			getComputedStyle(control).visibility !== 'hidden'
		) {
			const setMinWidth = () => {
				searchSwitch.style.minWidth = `${control.offsetWidth}px`;
			};

			setMinWidth();
			window.addEventListener('resize', setMinWidth);
		}
	};

	const searchSwitchMove = () => {
		searchSwitch.forEach((switchBtn) => {
			switchBtn.addEventListener('click', () => {
				const activeSwitch = document.querySelector('.search-switch li.active');

				if (!switchBtn.classList.contains('active')) {
					searchSwitch.forEach((btn) => {
						btn.classList.remove('active');
					});

					switchBtn.classList.add('active');

					if (switchBtn.is(':first-child')) {
						switchBtn.parentNode.classList.remove('right');
						switchBtn.parentNode.classList.add('left');
						document.querySelector('.free-text-search span').textContent = 'Properties for sale';
					} else {
						switchBtn.parentNode.classList.remove('left');
						switchBtn.parentNode.classList.add('right');
						document.querySelector('.free-text-search span').textContent = 'Properties for rent';
					}
				}
				switchSearchOptions();
			});
		});
	};

	const switchSearchOptions = () => {
		const uncheckedOption = document.querySelectorAll(
			'.control-department input[type="radio"]:not(:checked)'
		);

		uncheckedOption.forEach((option) => {
			option.click();
		});
	};

	const cloneActions = () => {
		const morePropertyActions = document.querySelector('.more-property-actions .drop-down a');
		if (morePropertyActions) {
			morePropertyActions.addEventListener('click', (e) => {
				e.preventDefault();
				morePropertyActions.classList.toggle('active');
				morePropertyActions.nextElementSibling.slideToggle();
			});
		}
	};

	const viewShortList = () => {
		if (document.cookie.indexOf('propertyhive_shortlist=') >= 0) {
			shortList.classList.add('show');
			document.querySelector('.mobile-navigation li.shortlist-icon').classList.add('show');
		}
	};

	const init = () => {
		propertyActionNav();
		propertyActionNavHoverEffect();
		searchSwitchWidth();
		searchSwitchMove();
		cloneActions();
		viewShortList();
	};
	return { init: init };
})();
property.init();
