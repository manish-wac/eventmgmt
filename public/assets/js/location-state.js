"use strict";
var url = $('#site-url').val();
$(function() {
     
    /* modal show after form submit of create a new country */
    if ($('#add-new-state #state-session').val()) {
        $('#add-new-state').modal('show');
    }
    /* modal show after form submit of updating country details */
    if ($('#edit-state #state-session').val()) {
        $('#edit-state').modal('show');
    }

    setTimeout(function(){
        $('#common-alert, .alert').remove();
    }, 1500);

    $('input, select').on('change', function(){
        $(this).addClass('is-valid').removeClass('is-invalid');
        $(this).parents('.form-group').find('span.invalid-feedback').html('').removeAttr('style');
    });
    /* new country form valid */
    $("#add-new-state-form").validate({
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
                required: true
            }
        },
        ignore: ' ',
        submitHandler: function(form) {
        
            var form_data = new FormData($("#add-new-state-form")[0]);
            
            $.ajax({
                url: url + '/admin/location/add-state',
                type: "POST",
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'JSON',
                beforeSend: function() {
                    $("#add-new-state-form").find('.is-invalid').addClass('is-valid').removeClass('is-invalid').end()
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
                        $('<div class="alert alert-danger">Something went wrong. Try again later.</div>').appendTo($('#add-new-state-form .results'));
                    }
                },
                success: function(result) {
                    var html = '';
                    if(result.status) {
                        $("#state-list").DataTable().ajax.reload();

                        $("#add-new-state-form")[0].reset();
                        $('#add-new-state').modal('hide');

                        $('<div id="common-alert" class="results"><div class="alert alert-success">' + result.msg +'</div></div>').insertBefore($('.wrapper .content .container-fluid'))
                    } else {
                        if ('error' in result) {
                            $.each(result.error, function(key, value) {
                                $('[name="'+ key + '"]').removeClass('is-valid').addClass('is-invalid');
                                $('[name="'+ key + '"]').parents('.form-group').find('span.invalid-feedback').html(value).attr('style','display:block');

                            });
                        } else {
                            $('<div class="alert alert-danger">' + result.msg +'</div>').appendTo($('#add-new-state-form .results'));
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
    $("#update-state-form").validate({
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
            var form_data = new FormData($("#update-state-form")[0]);
            
            $.ajax({
                url: url + '/admin/location/update-state',
                type: "POST",
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'JSON',
                beforeSend: function() {
                    $("#update-state-form").find('.is-invalid').addClass('is-valid').removeClass('is-invalid').end()
                    .find('span.invalid-feedback').html('').removeAttr('style');

                    $('div.alert').remove();
                },
                error: function (error){
                    if ('errors' in error.responseJSON) {
                        $.each(error.responseJSON.errors, function(key, value) {
                            $('#update-state-form [name="'+ key + '"]').removeClass('is-valid').addClass('is-invalid');
                            $('#update-state-form [name="'+ key + '"]').parents('.form-group').find('span.invalid-feedback').html(value).attr('style','display:block');

                        });
                    }  else {
                        $('<div class="alert alert-danger">Something went wrong. Try again later.</div>').appendTo($('##update-state-form .results'));
                    }
                },
                success: function(result) {
                    var html = '';
                    if(result.status) {
                        $("#state-list").DataTable().ajax.reload();

                        $("#update-state-form")[0].reset();
                        $('#update-state').modal('hide');
                        
                        $('<div id="common-alert" class="results"><div class="alert alert-success">' + result.msg +'</div></div>').insertBefore($('.wrapper .content .container-fluid'))
                    } else {
                        if ('error' in result) {
                            $.each(result.error, function(key, value) {
                                $('[name="'+ key + '"]').removeClass('is-valid').addClass('is-invalid');
                                $('[name="'+ key + '"]').parents('.form-group').find('span.invalid-feedback').html(value).attr('style','display:block');

                            });
                        } else {
                            $('<div class="alert alert-danger">' + result.msg +'</div>').appendTo($('#update-state-form .results'));
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
/* edit country details */
$(document).on('click', '#state-list .js-edit-state', function() {
    var _this = $(this),
        collection_id = _this.attr('data-index');
        $.ajax({
            url: url + '/admin/location/get-state-details?state_id=' + collection_id,
            type: 'GET',
            datatype: 'JSON',
            success: function (result) {
                if(result.status) {
                    $('#update-state').find('#js-state-code').val(result.data.code).end()
                        .find('#js-state-name').val(result.data.name).end()
                        .find('#js-state-id').val(collection_id).end()
                        .find('#country').val(result.data.country).end()
                        .modal('show');
                }
            }
        });

});
/* delete confirmation and request submission */
$(document).on('click', '#state-list .js-delete-state', function() {
    var _id = $(this).attr('data-index');
    Swal.fire({
        title: 'Are you sure, do you want to delete this state?',
        text: "You won't be able to revert this!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: '/admin/location/delete-state?state_id=' + _id,
                type: "DELETE",
                dataType: "json",
                success: function(result) {
                    if (result.status) $('<div class="alert alert-success" id="common-alert">' + result.msg + '</div>').insertBefore($('.wrapper .content .container-fluid'));
                    else $('<div class="alert alert-danger" id="common-alert">' + result.msg + '</div>').insertBefore($('.wrapper .content .container-fluid'));
                    $("#state-list").DataTable().ajax.reload();
                    setTimeout(function() {
                        $('#common-alert').remove();
                    }, 1000);
                }
            });
        }
    });

});