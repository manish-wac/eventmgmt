"use strict";
$(function() {


    if ($('#forgot-session').val()) {
        $('#forgot-password').modal('show');

    }

    if ($('#reset-password-form #user_email').val()) {
        $('#reset-password').modal('show');
    }
    /* */
    if ($('#reset-session').val()) {
        $('#forgot-password').modal('show');
    }

    /* adminlogin form valid */
    $("#login-form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Please enter your email",
                email: "Your email is not valid"
            },
            password: {
                required: "Please provide your password"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    /* admin forgot password form valid */
    $("#forgot-password-form").validate({
        rules: {
            forgot: {
                required: true,
                email: true
            }
        },
        messages: {
            forgot: {
                required: "Please enter your email",
                email: "Your email is not valid"
            }
        },
        submitHandler: function(form) {

            form.submit();
        }
    });

    $("#reset-password-form").validate({
        rules: {
            user_email: {
                required: true,
                email: true
            },
            new_password: {
                required: true
            },
            confirm_password: {
                required: true,
                // equalTo : "#new_password"
            }
        },
        messages: {
            user_email: {
                required: "Please enter your email",
                email: "Your email is not valid"
            },
            confirm_password: {
                equalTo: "The new password and confirm password must match."
            }
        },
        submitHandler: function(form) {

            form.submit();
        }
    });
});