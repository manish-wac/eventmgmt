$(document).ready(function () {
    function disableSubmitButton() {
        $("#js-btn-submit").attr("disabled", true);
    }

    function enableSubmitButton() {
        $("#js-btn-submit").removeAttr("disabled");
    }

    // $("#js-btn-submit").on("click", function () {
    //     disableSubmitButton();
    //     $("#js-edit-event-form").submit();
    // });

    $("#js-edit-event-form").validate({
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
            city: {
                required: true,
            },
            title: {
                required: true,
            },
            location: {
                required: true,
            },
            address: {
                required: true,
            },
            event_from: {
                required: true,
            },
            event_to: {
                required: true,
            },
            reg_from: {
                required: true,
            },
            reg_to: {
                required: true,
            },
            status: {
                required: true,
            },
            event: {
                required: true,
                alpha: true,
            },
        },
        messages: {
            event: {},
        },
        submitHandler: function (form) {
            var formData = $("#js-edit-event-form").serialize();

            $.ajax({
                type: "POST",
                data: formData,
                success: function (res) {
                    if (res.status) {
                        window.location = EVENT_LISTING_PAGE;
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
    // $("#js-event").rules("add", {
    //     remote: function () {
    //         return {
    //             type: "GET",
    //             contentType: "application/json; charset=utf-8",
    //             url: CHECK_EVENT_UNIQUE_URL,
    //             dataType: "json",
    //             data: {
    //                 event: $("#js-event").val(),
    //                 district: $("#js-district").val(),
    //                 eventId: $("#js-hdn-record-id").val(),
    //             },
    //         };
    //     },
    // });
});
