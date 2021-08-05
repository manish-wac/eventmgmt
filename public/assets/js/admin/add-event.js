$(document).ready(function () {
    $("#js-country").on("change", function () {
        var countryId = this.value;
        disableSubmitButton();
        fetchStates(countryId);
    });

    $("#js-state").on("change", function () {
        var stateId = this.value;
        disableSubmitButton();
        fetchDistricts(stateId);
    });

    $("#js-district").on("change", function () {
        var districtId = this.value;
        disableSubmitButton();
        fetchTaluk(districtId);
    });

    $("#js-taluk").on("change", function () {
        var talukId = this.value;
        disableSubmitButton();
        fetchCitys(talukId);
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

                $("#js-state").html(html);
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

                $("#js-district").html(html);
                enableSubmitButton();
            },
        });
    }

    function fetchCitys(talukId) {
        $.ajax({
            url: BASE_URL + "/admin/location/city/get-all/" + talukId,
            type: "GET",
            success: function (res) {
                var city = res.city;
                var html = "<option value=''> Select </option>";

                $.each(city, function (ind, item) {
                    html +=
                        "<option value='" +
                        item._id +
                        "'> " +
                        item.name +
                        "</option>";
                });

                $("#js-city").html(html);
                enableSubmitButton();
            },
        });
    }

    function fetchTaluk(district) {
        $.ajax({
            url: BASE_URL + "/admin/location/taluk/get-all/" + district,
            type: "GET",
            success: function (res) {
                var taluk = res.taluk;
                var html = "<option value=''> Select </option>";

                $.each(taluk, function (ind, item) {
                    html +=
                        "<option value='" +
                        item._id +
                        "'> " +
                        item.name +
                        "</option>";
                });

                $("#js-taluk").html(html);
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

    $("#js-add-event-form").validate({
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
                remote: {
                    url: CHECK_EVENT_UNIQUE_URL,
                    data: {
                        event: $("#js-event").val(),
                        district: $("#js-district").val(),
                    },
                },
            },
        },
        messages: {
            event: {},
        },
        submitHandler: function (form) {
            form.submit();
        },
    });
});
