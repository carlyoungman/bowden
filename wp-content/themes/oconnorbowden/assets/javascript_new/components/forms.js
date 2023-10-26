import $ from 'jquery';
import validation from 'jquery-validation';

const forms = (() => {
	const dynamicDropdowns = () => {
		$('.control select').on('change', function () {
			const text = $(this).find(':selected').text();
			$(this).closest('.control').find('label').text(text);
		});
	};

	const dropdownsLoad = () => {
		$('.control select').each(function () {
			if (!$(this).find(':selected').val() === '') {
				const text = $(this).find(':selected').text();
				$(this).siblings('label').text(text);
			}
		});
	};

	const enquiryForm = () => {
		let isSubmitting = false;
		let formObj;

		const $form = $('#property-enquiry-form');

		$form.validate({
			rules: {
				name: {
					required: true,
				},
				email_address: {
					required: true,
				},
				telephone_number: {
					required: true,
				},
				message: {
					required: true,
				},
			},
			submitHandler: function () {
				submitform();
			},
		});

		const submitform = () => {
			if (!isSubmitting) {
				isSubmitting = true;
				const data =
					$form.serialize() + '&' + $.param({ action: 'propertyhive_make_property_enquiry' });
				formObj = $form;
				formObj.find('#enquirySuccess').hide();
				formObj.find('#enquiryValidation').hide();
				formObj.find('#enquiryError').hide();

				$.post(propertyhive_make_property_enquiry_params.ajax_url, data, function (response) {
					if (response.success == true) {
						if (
							propertyhive_make_property_enquiry_params.redirect_url &&
							propertyhive_make_property_enquiry_params.redirect_url != ''
						) {
							window.location.href = propertyhive_make_property_enquiry_params.redirect_url;
						} else {
							formObj.find('#enquirySuccess').fadeIn();
							formObj.trigger('reset');
						}
					} else if (response.reason === 'validation') {
						formObj.find('#enquiryValidation').fadeIn();
					} else if (response.reason === 'nosend') {
						formObj.find('#enquiryError').fadeIn();
					}

					isSubmitting = false;
				});
			}

			return false;
		};
	};

	const inputLabel = () => {
		$('.control input').each(function () {
			const $label = $(this).closest('.control').find('label');

			$(this).on('focus', () => {
				$label.addClass('moveup');
			});

			$(this).on('focusout', () => {
				if (!$(this).val()) {
					$label.removeClass('moveup');
				}
			});
		});
	};

	const init = () => {
		dynamicDropdowns();
		dropdownsLoad();
		inputLabel();
		// enquiryForm();
	};

	return { init };
})();

forms.init();
