"use strict";
$(function() {
   
    /* modal show after form submit of create a new country */
    if ($('#add-new-country #country-session').val()) {
        $('#add-new-country').modal('show');
    }
    /* modal show after form submit of updating country details */
    if ($('#edit-country #country-session').val()) {
        $('#edit-country').modal('show');
    }

    setTimeout(function(){
        $('#common-alert, .results').remove();
    }, 3000);

    /* new country form valid */
    $("#add-new-country-form").validate({
        rules: {
            js_country_code: {
                required: true,
                minlength: 2,
                maxlength: 3,
                alpha: true
            },
            js_country_name: {
                required: true,
                alpha: true
            }
        },
        messages: {
            // 
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    /* country update form validation */
    $("#js-update-country-details").validate({
        rules: {
            js_update_cn_code: {
                required: true,
                minlength: 2,
                maxlength: 3,
                alpha: true
            },
            js_update_cn_name: {
                required: true,
                alpha: true
            }
        },
        messages: {
            // 
        },
        submitHandler: function(form) {
            console.log(form);
            form.submit();
        }
    });



});
/* edit country details */
$(document).on('click', '#country-list .js-edit-country', function() {
    var _this = $(this),
        parent_tr = _this.parents('tr'),
        country_code = parent_tr.find('.country_code').text(),
        country_name = parent_tr.find('.country_name').text(),
        collection_id = _this.attr('data-index');
    if (country_code && country_name && collection_id) {
        $('#edit-country').find('#js-update-cn-code').val(country_code).end()
            .find('#js-update-cn-name').val(country_name).end()
            .find('#collection_id').val(collection_id);
        $('#edit-country').modal('show');
    } else {
        $('#show-jquery-fail-messages div.alert').html('Something went wrong. Try again later');
        $('#show-jquery-fail-messages').modal('show');
    }
});
/* delete confirmation and request submission */
$(document).on('click', '#country-list .js-delete-country', function() {
    var _id = $(this).attr('data-index');
    Swal.fire({
        title: 'Are you sure, do you want to delete this country?',
        text: "You won't be able to revert this!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: '/admin/location/delete-country?country_id=' + _id,
                type: "DELETE",
                dataType: "json",
                success: function(result) {
                    if (result.status) $('<div class="alert alert-success" id="common-alert">' + result.msg + '</div>').insertBefore($('.wrapper .content .container-fluid'));
                    else $('<div class="alert alert-danger" id="common-alert">' + result.msg + '</div>').insertBefore($('.wrapper .content .container-fluid'));
                    $("#country-list").DataTable().ajax.reload();
                    setTimeout(function() {
                        $('#common-alert').remove();
                    }, 1000);
                }
            });
        }
    });

});