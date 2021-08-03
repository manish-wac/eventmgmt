$(document).ready(function () {

    var countryId = $('#js-promoter-l1-country').val();
    fetchStates(countryId);

    $("#js-promoter-l1-state").on("change", function () {
        var stateId = this.value;
        disableSubmitButton();
        fetchDistricts(stateId);
    });

    $("#js-promoter-l1-district").on("change", function () {
        var districtId = this.value;
        disableSubmitButton();
        fetchTaluk(districtId);
    });

    function fetchStates(countryId) {
        $.ajax({
            url: BASE_URL + "/admin/location/state/get-all/" + countryId,
            type: "GET",
            success: function (res) {
                var states = res.states;
                var html = "<option value=''> Select </option>";

                $.each(states, function (ind, item) {
                    html +=
                        "<option value='" +
                        item._id +
                        "'> " +
                        item.name +
                        "</option>";
                });

                $("#js-promoter-l1-state").html(html);
                enableSubmitButton();
            },
        });
    }

    function fetchDistricts(stateId) {
        $.ajax({
            url: BASE_URL + "/admin/location/district/get-all/" + stateId,
            type: "GET",
            success: function (res) {
                var district = res.district;
                var html = "<option value=''> Select </option>";

                $.each(district, function (ind, item) {
                    html +=
                        "<option value='" +
                        item._id +
                        "'> " +
                        item.name +
                        "</option>";
                });

                $("#js-promoter-l1-district").html(html);
                enableSubmitButton();
            },
        });
    }

    function fetchTaluk(districtId) {
        $.ajax({
            url: BASE_URL + "/admin/location/taluk/get-all/" + districtId,
            type: "GET",
            success: function (res) {
                var taluk = res.taluk;
                var html = "<option value=''> Select </option>";
                console.log(res)
                $.each(taluk, function (ind, item) {
                    html +=
                        "<option value='" +
                        item._id +
                        "'> " +
                        item.name +
                        "</option>";
                });

                $("#js-promoter-l1-taluk").html(html);
                enableSubmitButton();
            },
        });
    }

    function disableSubmitButton() {
        $("#js-btn-submit").attr("disabled", true);
    }

    function enableSubmitButton() {
        $("#js-btn-submit").removeAttr("disabled");
    }

    $("#js-btn-submit").on("click", function () {
        $("#js-add-promoter-l1-form").submit();
    });

    $.validator.addMethod("noSpace", function(value, element) { 
        return value == '' || value.trim().length != 0;  
      }, "No space please and don't leave it empty");

    $("#js-add-promoter-l1-form").validate({
        rules: {
            first_name: {
                required: true,
                alpha: true,
                noSpace: true
            },
            last_name: {
                required: true,
                alpha: true,
                noSpace: true
            },
            email: {
                required: true,
                email: true,
                noSpace: true
            },
            level: {
                required: true,
            },
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
            },
            country_code: {
                required: true,
            },
        },
        messages: {
            taluk: {},
        },
        submitHandler: function (form) {
            var formData = $("#js-add-promoter-l1-form").serialize();

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
    });
});
