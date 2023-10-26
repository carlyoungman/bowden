var validation = require('validation');

var forms = (function () {
  var dynamicDropdowns = function () {
    $('.control select').on('change', function () {
      var text = $(this)
        .find(':selected')

        .text();

      $(this)
        .closest('.control')

        .find('label')

        .text(text);
    });
  };

  var dropdownsLoad = function () {
    $('.control select').each(function () {
      if (
        !$(this)
          .find(':selected')

          .val() === ''
      ) {
        var text = $(this)
          .find(':selected')

          .text();

        $(this)
          .siblings('label')

          .text(text);
      }
    });
  };

  var enquiryForm = function () {
    var isSubmitting = false;

    var formObj;

    var $form = $('#property-enquiry-form');

    $form.validate({
      rules: {
        name: {
          required: true
        },

        email_address: {
          required: true
        },

        telephone_number: {
          required: true
        },

        message: {
          required: true
        }
      },

      submitHandler: function () {
        submitform();
      }
    });

    var submitform = function () {
      if (!isSubmitting) {
        isSubmitting = true;

        var data =
          $form.serialize() +
          '&' +
          $.param({ action: 'propertyhive_make_property_enquiry' });

        formObj = $form;

        formObj.find('#enquirySuccess').hide();

        formObj.find('#enquiryValidation').hide();

        formObj.find('#enquiryError').hide();

        $.post(
          propertyhive_make_property_enquiry_params.ajax_url,

          data,

          function (response) {
            if (response.success == true) {
              if (
                propertyhive_make_property_enquiry_params.redirect_url &&
                propertyhive_make_property_enquiry_params.redirect_url != ''
              ) {
                window.location.href =
                  propertyhive_make_property_enquiry_params.redirect_url;
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
          }
        );
      }

      return false;
    };
  };

  var inputLabel = function () {
    $('.control input').each(function () {
      var $label = $(this)
        .closest('.control')

        .find('label');

      $(this).on('focus', function () {
        $label.addClass('moveup');
      });

      $(this).on('focusout', function () {
        if (!$(this).val()) {
          $label.removeClass('moveup');
        }
      });
    });
  };

  var init = function () {
    dynamicDropdowns();

    dropdownsLoad();

    inputLabel();

    //  enquiryForm();
  };

  return { init: init };
})();

forms.init();
