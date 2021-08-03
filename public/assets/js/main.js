"use strict";
$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".modal").on("hidden.bs.modal", function() {
        $(this).find('.alert').remove();
        $(this).find('form .is-valid').removeClass('is-valid');
        $(this).find('form .is-invalid').removeClass('is-invalid');
        $(this).find('form')[0].reset();
        $(this).find('form .form-control').val("");;

        $('div.error.invalid-feedback').remove();
        $('span.error.invalid-feedback').html('');

    });

});