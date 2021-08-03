"use strict";
var url = $('#site-url').val();

/* delete confirmation and request submission */
$(document).on('click', '#js-merchant-unit-list .js-delete-merchant-unit', function() {
    var _id = $(this).attr('data-index');
    Swal.fire({
        title: 'Are you sure, do you want to delete this document?',
        text: "You won't be able to revert this!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: '/admin/location/delete-merchant-unit?id=' + _id,
                type: "DELETE",
                dataType: "json",
                success: function(result) {
                    if (result.status) $('<div class="alert alert-success" id="common-alert">' + result.msg + '</div>').insertBefore($('.wrapper .content .container-fluid'));
                    else $('<div class="alert alert-danger" id="common-alert">' + result.msg + '</div>').insertBefore($('.wrapper .content .container-fluid'));
                    $("#js-merchant-unit-list").DataTable().ajax.reload();
                    setTimeout(function() {
                        $('#common-alert').remove();
                    }, 1000);
                }
            });
        }
    });

});