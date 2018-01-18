// navigation slide-in
$(window).load(function() {
  $('.nav_slide_button').click(function() {
    $('.pull').slideToggle();
  });
});


$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='commentform']").validate({
    // Specify validation rules
    ignore: ".ignore",
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      name: "required",
      phone: "required",
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
    hiddenRecaptcha: {
                required: function () {
                    if (grecaptcha.getResponse() == '') {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
    },
    // Specify validation error messages
    messages: {
      name: "Please enter your name",
      phone: "Please enter your phone number",
      email: "Please enter a valid email address",
     hiddenRecaptcha:"Please enter the captcha"

    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});