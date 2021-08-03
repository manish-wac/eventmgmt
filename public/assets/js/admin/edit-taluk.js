$(document).ready(function () {
    function disableSubmitButton() {
        $("#js-btn-submit").attr("disabled", true);
    }

    function enableSubmitButton() {
        $("#js-btn-submit").removeAttr("disabled");
    }

    $("#js-btn-submit").on("click", function () {
        disableSubmitButton();
        $("#js-edit-taluk-form").submit();
    });

    $("#js-edit-taluk-form").validate({
        rules: {
            country: {
                required: true,
            },
            state: {
                required: true,
            },
            district: {
                required: true,
            },
            taluk: {
                required: true,
                alpha: true,
            },
        },
        messages: {
            taluk: {},
        },
        submitHandler: function (form) {
            var formData = $("#js-edit-taluk-form").serialize();

            $.ajax({
                type: "POST",
                data: formData,
                success: function (res) {
                    if (res.status) {
                        window.location = TALUK_LISTING_PAGE;
                    }
                },
                error: function (error) {
                    enableSubmitButton();
                    if ("errors" in error.responseJSON) {
                        $.each(
                            error.responseJSON.errors,
                            function (key, value) {
                                $('[name="' + key + '"]')
                                    .removeClass("is-valid")
                                    .addClass("is-invalid");
                                $('[name="' + key + '"]')
                                    .parents(".form-group")
                                    .find("span.invalid-feedback")
                                    .html(value)
                                    .attr("style", "display:block");
                            }
                        );
                    } else {
                        var responseJson = error.responseJSON;
                        var msg = responseJson.msg;
                        $("#js-common-alert").html(
                            '<div class="alert alert-danger">' + msg + "</div>"
                        );
                    }
                },
            });
        },

        invalidHandler: function (form, validator) {
            enableSubmitButton();
        },
    });

    /* this separate adding required due to this bug : https://stackoverflow.com/questions/3170778/jquery-validation-plugin-remote-method-data-issue
     */
    $("#js-taluk").rules("add", {
        remote: function () {
            return {
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: CHECK_TALUK_UNIQUE_URL,
                dataType: "json",
                data: {
                    taluk: $("#js-taluk").val(),
                    district: $("#js-district").val(),
                    talukId: $("#js-hdn-record-id").val(),
                },
            };
        },
    });
});
