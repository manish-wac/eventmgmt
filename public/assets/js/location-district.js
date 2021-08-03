"use strict";
var url = $('#site-url').val();
$(function() {
    
    setTimeout(function(){
        $('#common-alert, .alert').remove();
    }, 1500);

    $('input, select').on('change', function(){
        $(this).addClass('is-valid').removeClass('is-invalid');
        $(this).parents('.form-group').find('span.invalid-feedback').html('').removeAttr('style');
    });
    /* new country form valid */
    $("#add-new-district-form").validate({
        rules: {
            js_district_name: {
                required: true,
                alpha: true
            },
            js_state_id: {
                required: true
            },
            js_country_id: {
                required: true
            }
        },
        ignore: ' ',
        submitHandler: function(form) {
        
            var form_data = new FormData($("#add-new-district-form")[0]);
            
            $.ajax({
                url: url + '/admin/location/add-district',
                type: "POST",
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'JSON',
                beforeSend: function() {
                    $("#add-new-district-form").find('.is-invalid').addClass('is-valid').removeClass('is-invalid').end()
                    .find('span.invalid-feedback').html('').removeAttr('style');

                    $('div.alert').remove();
                },
                error: function (error){
                    if ('errors' in error.responseJSON) {
                        $.each(error.responseJSON.errors, function(key, value) {
                            $('[name="'+ key + '"]').removeClass('is-valid').addClass('is-invalid');
                            $('[name="'+ key + '"]').parents('.form-group').find('span.invalid-feedback').html(value).attr('style','display:block');

                        });
                    }  else {
                        $('<div class="alert alert-danger">Something went wrong. Try again later.</div>').appendTo($('#add-new-district-form .results'));
                    }
                },
                success: function(result) {
                    var html = '';
                    if(result.status) {
                        $("#district-list").DataTable().ajax.reload();

                        $("#add-new-district-form")[0].reset();
                        $('#add-new-district').find('#state, #js-district-name').parent().addClass('country-not-selected');
                        $('#add-new-district').modal('hide');

                        $('<div id="common-alert" class="results"><div class="alert alert-success">' + result.msg +'</div></div>').insertBefore($('.wrapper .content .container-fluid'))
                    } else {
                        if ('error' in result) {
                            $.each(result.error, function(key, value) {
                                $('[name="'+ key + '"]').removeClass('is-valid').addClass('is-invalid');
                                $('[name="'+ key + '"]').parents('.form-group').find('span.invalid-feedback').html(value).attr('style','display:block');

                            });
                        } else {
                            $('<div class="alert alert-danger">' + result.msg +'</div>').appendTo($('#add-new-district-form .results'));
                        }
                    }

                    setTimeout(function(){
                        $('#common-alert, .alert').remove();
                    }, 2000);
                }
            });
        }
    });
    /* country update form validation */
    $("#update-district-form").validate({
        rules: {
            js_state_code: {
                required: true,
                minlength: 2,
                maxlength: 3,
                alpha: true
            },
            js_state_name: {
                required: true,
                alpha: true
            },
            js_country_id: {
                required:true
            }
        },
        messages: {
            // 
        },
        submitHandler: function(form) {
            var form_data = new FormData($("#update-district-form")[0]);
            
            $.ajax({
                url: url + '/admin/location/update-district',
                type: "POST",
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'JSON',
                beforeSend: function() {
                    $("#update-district-form").find('.is-invalid').addClass('is-valid').removeClass('is-invalid').end()
                    .find('span.invalid-feedback').html('').removeAttr('style');

                    $('div.alert').remove();
                },
                error: function (error){
                    if ('errors' in error.responseJSON) {
                        $.each(error.responseJSON.errors, function(key, value) {
                            $('#update-district-form [name="'+ key + '"]').removeClass('is-valid').addClass('is-invalid');
                            $('#update-district-form [name="'+ key + '"]').parents('.form-group').find('span.invalid-feedback').html(value).attr('style','display:block');
                        });
                    }  else {
                        $('<div class="alert alert-danger">Something went wrong. Try again later.</div>').appendTo($('#update-district-form .results'));
                    }
                },
                success: function(result) {
                    var html = '';
                    if(result.status) {
                        $("#district-list").DataTable().ajax.reload();

                        $("#update-district-form")[0].reset();
                        $('#update-district').modal('hide');
                        
                        $('<div id="common-alert" class="results"><div class="alert alert-success">' + result.msg +'</div></div>').insertBefore($('.wrapper .content .container-fluid'));
                    } else {
                        if ('error' in result) {
                            $.each(result.error, function(key, value) {
                                $('[name="'+ key + '"]').removeClass('is-valid').addClass('is-invalid');
                                $('[name="'+ key + '"]').parents('.form-group').find('span.invalid-feedback').html(value).attr('style','display:block');
                            });
                        } else {
                            $('<div class="alert alert-danger">' + result.msg +'</div>').appendTo($('#update-district-form .results'));
                        }
                    }

                    setTimeout(function(){
                        $('#common-alert, .alert').remove();
                    }, 2000);
                }
            });
        }
    });
});
$(document).on('change', '#country', function(){
    var _this = $(this),
        active_form = _this.parents('form');

    $.ajax({
        url: url + '/admin/location/state/get-all/' + _this.val(),
        type: 'GET',
        datatype: 'JSON',
        beforeSend: function () {
            active_form.find('#state').removeClass('is-valid is-invalid').parent().addClass('country-not-selected');
            active_form.find('#js-district-name').removeClass('is-valid is-invalid').val('').parent().addClass('country-not-selected');
        },
        success: function (result) {
            if(result.states.length) {
                var html = '<option value="" selected="selected" disabled>Choose state</option>';
                $.each(result.states, function(key, value) {
                    html += '<option value="' + value['_id'] + '">' + value['name'] + '</option>';
                });

                active_form.find('#state').html(html).parent().removeClass('country-not-selected');
            } else {
                active_form.find('#state').parent().addClass('country-not-selected');
                active_form.find('#state').html('<option value="" selected="selected" disabled>Choose state</option>').removeClass('is-valid');
                $('<div class="alert alert-danger">No states linked with selected country. Choose another country.</div>').appendTo(active_form.find('.results'));
            }

            setTimeout(function(){
                active_form.find('#common-alert, .alert').remove();
            }, 1500);

        }
    });
});

$(document).on('change', '#state', function() {
    var _this = $(this),
    active_form = _this.parents('form');
    if ($(this).val())
        active_form.find('#js-district-name').removeClass('is-valid is-invalid').val('').parent().removeClass('country-not-selected');
    else
        active_form.find('#js-district-name').removeClass('is-valid is-invalid').val('').parent().addClass('country-not-selected');
});

/* edit country details */
$(document).on('click', '#district-list .js-edit-district', function() {
    var _this = $(this),
        collection_id = _this.attr('data-index');
        $.ajax({
            url: url + '/admin/location/get-district-details?district_id=' + collection_id,
            type: 'GET',
            datatype: 'JSON',
            success: function (result) {
                if(result.status) {
                    var html = '';
                    if(result.data.states) {
                        html = '<option value="" disabled>Choose state</option>';
                        $.each(result.data.states, function(key, value) {
                            var selected = '';

                            if(value['_id'] == result.data.state)
                                selected = 'selected';

                            html += '<option value="' + value['_id'] + '" '+ selected + '>' + value['name'] + '</option>';
                        });

                        $('#update-district').find('#state').html(html);
                    }
                    $('#update-district-form').find('.country-not-selected').removeClass('country-not-selected');
                    $('#update-district').find('#js-district-name').val(result.data.name).end()
                        .find('#js-district-id').val(result.data.district_id).end()
                        .find('#country').val(result.data.country).end()
                        .find('#js-district-code').val(result.data.district_id).end()
                        .modal('show');

                }
            }
        });
});
/* delete confirmation and request submission */
$(document).on('click', '#district-list .js-delete-district', function() {
    var _id = $(this).attr('data-index');
    Swal.fire({
        title: 'Are you sure, do you want to delete this district?',
        text: "You won't be able to revert this!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: '/admin/location/delete-district?district_id=' + _id,
                type: "DELETE",
                dataType: "json",
                success: function(result) {
                    if (result.status) 
                        $('<div class="alert alert-success" id="common-alert">' + result.msg + '</div>').insertBefore($('.wrapper .content .container-fluid'));
                    else 
                        $('<div class="alert alert-danger" id="common-alert">' + result.msg + '</div>').insertBefore($('.wrapper .content .container-fluid'));

                    $("#district-list").DataTable().ajax.reload();
                    setTimeout(function() {
                        $('#common-alert').remove();
                    }, 1000);
                }
            });
        }
    });

});