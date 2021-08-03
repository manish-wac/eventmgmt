var url = $('#site-url').val();
$(document).ready(function () {
    setTimeout(function(){
        $('#common-alert, .alert').remove();
    }, 1500);

    $('input, select').on('change', function(){
        $(this).addClass('is-valid').removeClass('is-invalid');
        $(this).parents('.form-group').find('span.invalid-feedback').html('').removeAttr('style');
    });
    /* new country form valid */
    $("#js-add-new-questions-form").validate({
        rules: {
            question: {
                required: true
            },
            option_1: {
                required: true
            },
            option_2: {
                required: true
            },
            option_3: {
                required: true
            },
            option_4: {
                required: true
            },
            'isAnswer': {
                required: true
            }
        },
        ignore: ' ',
        submitHandler: function(form) {
        
            var form_data = new FormData($("#js-add-new-questions-form")[0]);
            
            $.ajax({
                url: url + '/admin/games/questions/add-submit',
                type: "POST",
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'JSON',
                beforeSend: function() {
                    $("#js-add-new-questions-form").find('.is-invalid').addClass('is-valid').removeClass('is-invalid').end()
                    .find('span.invalid-feedback').html('').removeAttr('style');

                    $('div.alert').remove();
                },
                error: function (error){
                    if ('errors' in error.responseJSON) {
                        $.each(error.responseJSON.errors, function(key, value) {
                            $('[name="'+ key + '"]').removeClass('is-valid').addClass('is-invalid');
                            $('[name="'+ key + '"]').parents('.form-group').find('span.invalid-feedback').html(value).attr('style','display:block');

                        });
                        
                    } 
                    $('<div class="alert alert-danger">'+ error.responseJSON.message +'</div>').appendTo($('#js-add-new-questions-form .results'));

                    setTimeout(function(){
                        $('#common-alert, .alert').remove();
                    }, 2000);
                },
                success: function(result) {
                    var html = '';
                    if(result.status) {
                        $("#state-list").DataTable().ajax.reload();

                        $("#js-add-new-questions-form")[0].reset();
                        $("#js-add-new-questions-form .is-valid").removeClass('is-valid');

                        $('<div id="common-alert" class="results"><div class="alert alert-success">' + result.msg +'</div></div>').insertBefore($('.wrapper .content .container-fluid'))
                    } else {
                        if ('error' in result) {
                            $.each(result.error, function(key, value) {
                                $('[name="'+ key + '"]').removeClass('is-valid').addClass('is-invalid');
                                $('[name="'+ key + '"]').parents('.form-group').find('span.invalid-feedback').html(value).attr('style','display:block');

                            });
                        } else {
                            $('<div class="alert alert-danger">' + result.msg +'</div>').appendTo($('#js-add-new-questions-form .results'));
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
