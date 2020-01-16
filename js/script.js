// Javascript helpers
jQuery(document).ready(function($) {

  /* Add and Remove disabled class on active collapse */
  // $('.show').parent('#accordion').children('#content-collapse').children("button:not(.collapsed)").addClass('disable');
  // $("button:not(.collapsed)").css("background-color", "yellow");

  /* Remove and add active class on speaker buttons */

  /* Contact form submission */
  $('#speakerBureauContact').on('submit', function(e) {
    e.preventDefault();

    $('.js-show-feedback').removeClass('js-show-feeback');

    let form = $(this);

    /* user input variables */
    let firstname    = form.find('#firstname').val(),
        lastname     = form.find('#lastname').val(),
        companyname  = form.find('#companyname').val(),
        designation  = form.find('#designation').val(),
        email        = form.find('#email').val(),
        phone        = form.find('#phone').val(),
        state        = form.find('#area').val(),
        category     = form.find('#category').val(),
        requirements = form.find('#requirements').val(),
        send         = form.find('#yes').val(),
        donotsend    = form.find('#no').val(),
        ajaxurl      = form.data('url');

    /* Validate Input */
      if (firstname === '' || lastname === '' || email === '' || companyname === '' || designation === ''
          || phone === '' || state === '' || requirements === '') {
          console.log('Inputs are empty');
          return;
      } else {

        form.find('input, button, textarea').attr('disabled', 'disabled');
        $('.js-form-submission').removeClass('form-control-msg').addClass('js-show-feeback');


        $.ajax({

          url: ajaxurl,
          type: 'post',
          data : {
            firstname : firstname,
            lastname : lastname,
            companyname : companyname,
            category: category,
            designation : designation,
            email : email,
            phone : phone,
            state : state,
            requirements : requirements,
            send : send,
            donotsend : donotsend,
            action : 'speaker_bureau_save_user_contact_form_data'
          },
          error: function(response) {
            console.log(response);
            $('.js-form-submission').removeClass('js-show-feeback').addClass('form-control-msg');
            $('.js-form-error').removeClass('form-control-message').addClass('js-show-feeback');
            form.find('input, button, textarea').removeAttr('disabled');
          },
          success: function(response) {
            if(response == 0) {
              console.log('Unable to save your message, Please try again later');

              setTimeout(function(){
                $('.js-form-submission').removeClass('js-show-feeback').addClass('form-control-msg');
                form.find('input, button, textarea').removeAttr('disabled').val('');
                $('.js-form-success').removeClass('form-control-msg').addClass('js-show-feeback');
              }, 1500)

            } else {
              console.log('Message saved');

              setTimeout(function(){
                $('.js-form-submission').removeClass('js-show-feeback').addClass('form-control-msg');
                form.find('input, button, textarea').removeAttr('disabled').val('');
                $('.js-form-success').removeClass('form-control-msg').addClass('js-show-feeback');
              }, 1500)
            }
          }
        });
      }

  });

  /* Simple Contact Form */
  $('#speakerBureauSimpleContact').on('submit', function(e) {
    e.preventDefault();

    $('.js-show-feedback').removeClass('js-show-feeback');

    let form = $(this);

    /* user input variables */
    let firstname    = form.find('#firstname').val(),
        lastname     = form.find('#lastname').val(),
        companyname  = form.find('#companyname').val(),
        designation  = form.find('#designation').val(),
        email        = form.find('#email').val(),
        phone        = form.find('#phone').val(),
        message      = form.find('#message').val(),
        ajaxurl      = form.data('url');

    /* Validate Input */
      if (firstname === '' || lastname === '' || email === '' || companyname === '' || designation === ''
          || phone === '' || message === '') {
          console.log('Inputs are empty');
          return;
      } else {
          form.find('input, button, textarea').attr('disabled', 'disabled');
          $('.js-form-submission').removeClass('form-control-msg').addClass('js-show-feeback');

        $.ajax({

          url: ajaxurl,
          type: 'post',
          data : {
            firstname : firstname,
            lastname : lastname,
            companyname : companyname,
            designation : designation,
            email : email,
            phone : phone,
            message : message,
            action : 'speaker_bureau_save_user_simple_contact_form_data'
          },
          error: function(response) {
            console.log(response);
            $('.js-form-submission').removeClass('js-show-feeback').addClass('form-control-msg');
            $('.js-form-error').removeClass('form-control-message').addClass('js-show-feeback');
            form.find('input, button, textarea').removeAttr('disabled');
          },
          success: function(response) {
              console.log('Message saved');

              setTimeout(function(){
                $('.js-form-submission').removeClass('js-show-feeback').addClass('form-control-msg');
                form.find('input, button, textarea').removeAttr('disabled').val('');
                $('.js-form-success').removeClass('form-control-msg').addClass('js-show-feeback');
              }, 1500)

          }
        });
      }

  });

});
