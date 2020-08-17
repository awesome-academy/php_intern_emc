$(document).ready(() => {
    $('.btnAddCart').on('click', function() {
        var id = $(this).attr("data-id");
        Swal.fire({
            title: 'Something',
            text: 'Do you want to continue ' +id,
            icon: 'success',
            confirmButtonText: 'Continue'
        });
    });
});
