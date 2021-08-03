$(document).ready(function () {
    $("#js-merchant-unit-country").on("change", function () {
        var countryId = this.value;
        disableSubmitButton();
        fetchStates(countryId);
    });

    $("#js-merchant-unit-state").on("change", function () {
        var stateId = this.value;
        disableSubmitButton();
        fetchDistricts(stateId);
    });

    $("#js-merchant-unit-district").on("change", function () {
        var districtId = this.value;
        disableSubmitButton();
        fetchTaluk(districtId);
    });

    $("#js-merchant-unit-taluk").on("change", function () {
        var talukId = this.value;
        disableSubmitButton();
        fetchLocalBody(talukId);
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

                $("#js-merchant-unit-state").html(html);
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

                $("#js-merchant-unit-district").html(html);
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

                $("#js-merchant-unit-taluk").html(html);
                enableSubmitButton();
            },
        });
    }

    function fetchLocalBody(talukId) {
        $.ajax({
            url: BASE_URL + "/admin/location/local-body/get-all/" + talukId,
            type: "GET",
            success: function (res) {
                var local_bodi = res.local_bodi;
                var html = "<option value=''> Select </option>";
                console.log(local_bodi)
                $.each(local_bodi, function (ind, item) {
                    html +=
                        "<option value='" +
                        item._id +
                        "'> " +
                        item.name +
                        "</option>";
                });

                $("#js-merchant-unit-local-body").html(html);
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
        $("#js-add-merchant-unit-form").submit();
    });

    $("#js-add-merchant-unit-form").validate({
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
            },
            local_body: {
                required: true,
            },
            name: {
                required: true,
                remote: {
                    url: CHECK_MERCHANT_UNIQUE_URL,
                    type: "post",
                    data: {
                        name: function() { return $('#js-local-name').val(); },
                        local_body: function() { return $('#js-merchant-unit-local-body').val(); },
                    },
                },
            },
        },
        messages: {
            taluk: {},
        },
        submitHandler: function (form) {
            var formData = $("#js-add-merchant-unit-form").serialize();

            $.ajax({
                type: "POST",
                data: formData,
                success: function (res) {
                    if (res.status) {
                        window.location = MERCHANT_UNIT_LISTING_PAGE;
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
