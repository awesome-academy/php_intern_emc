$(document).ready(function () {
    $('.remove-product').click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var id = $(this).val();
        $.ajax({
            url: "products/" + id,
            method: 'DELETE',
            success: function (data) {
                $('#item' + id).parent('td').parent('tr').remove();
            },
            error: function (data) {
                alert("Error");
            }
        })
    })
});
