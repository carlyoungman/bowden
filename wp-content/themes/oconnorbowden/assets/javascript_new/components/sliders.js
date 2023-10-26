import $ from 'jquery';
import slick from 'slick-carousel';

const sliders = () => {
	const sliderOptions = {
		autoplay: false,
		autoplaySpeed: 6000,
		arrows: false,
		centerMode: true,
		cssEase: 'ease',
		dots: false,
		fade: true,
		focusOnSelect: true,
		infinite: true,
		pauseOnHover: false,
		slidesToShow: 1,
		slidesToScroll: 1,
	};

	const homeSlider = () => {
		const $siteSliders = $('.site-slider');
		$siteSliders.each((index, element) => {
			const options = { ...sliderOptions };
			options.centerMode = false;
			$(element).slick(options);
		});

		const activate = () => {
			const randomIndex = Math.floor(Math.random() * $siteSliders.length);
			$siteSliders.eq(randomIndex).slick('slickNext');
			setTimeout(activate, 3000);
		};
		activate();
	};

	const heroSlider = () => {
		const options = { ...sliderOptions, autoplay: true, adaptiveHeight: true };
		$('section.hero.slider').slick(options);
	};

	const propertySlider = () => {
		const options = { ...sliderOptions, autoplay: true, autoplaySpeed: 8000, adaptiveHeight: true };
		const $mainSlider = $('.single-property .main-slider');
		const $thumbnails = $('.single-property .thumbnails');
		$mainSlider.slick({ ...options, asNavFor: $thumbnails });
		$thumbnails.slick({
			...sliderOptions,
			slidesToShow: 4,
			slidesToScroll: 4,
			asNavFor: $mainSlider,
			centerMode: true,
			arrows: false,
			responsive: [
				{ breakpoint: 768, settings: { slidesToShow: 1 } },
				{ breakpoint: 992, settings: { slidesToShow: 3 } },
			],
		});
	};

	const sliderNavigation = () => {
		$('.images-overlay .arrow-left').on('click', () => {
			$('.single-property .main-slider').slick('slickPrev');
		});
		$('.images-overlay .arrow-right').on('click', () => {
			$('.single-property .main-slider').slick('slickNext');
		});
	};

	const floorPlanSlider = () => {
		$('.panel-slides').each((index, element) => {
			$(element).slick({
				...sliderOptions,
				dots: true,
				arrows: true,
				prevArrow:
					'<div class="slick-nav icon-button slick-prev"><svg class="icon icon-s arrow-left"><use xlink:href="#icon-arrow-up"></use></svg></div>',
				nextArrow:
					'<div class="slick-nav icon-button slick-next"><svg class="icon icon-s arrow-right"><use xlink:href="#icon-arrow-up"></use></svg></div>',
			});
		});
	};

	const officeSlider = () => {
		const options = {
			...sliderOptions,
			autoplay: true,
			autoplaySpeed: 8000,
			asNavFor: '.office-slider-nav',
		};
		$('.office-slider').slick(options);
	};

	const officeSliderNav = () => {
		const options = {
			...sliderOptions,
			slidesToShow: 4,
			slidesToScroll: 1,
			asNavFor: '.office-slider',
			centerMode: true,
			arrows: false,
			focusOnSelect: true,
		};
		$('.office-slider-nav').slick(options);
	};

	heroSlider();

	propertySlider();

	sliderNavigation();

	floorPlanSlider();

	homeSlider();

	officeSlider();

	officeSliderNav();
};
sliders();
