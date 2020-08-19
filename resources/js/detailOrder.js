$(document).ready(function() {
    $('.detail_order').on('click', function(event) {
        const id = $(this).attr('data-id');
        const url = '/order/' +id;

        $.ajax({
            type: 'GET',
            url: url,
            success: res => {
                $('#content_detail').html(res);
            },
            error: err => {
                alert('Has error');
            }
        });
    });
});
