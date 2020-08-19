$(document).ready(function () {
    $('.remove-product').click(function () {
        var id = $(this).val();
        deleteItem('products/', id);
    })

    $('.remove-order').click(function () {
        var id = $(this).val();
        deleteItem('orders/', id);
    })

    $('.view-order').click(function () {
        $('#show_order').modal('show');
        var order_id = $(this).val();
        fetchProductOrders(order_id);
    })
});

function fetchProductOrders(order_id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'orders/' + order_id,
        method: 'GET',
        success: function (data) {
            var product = '';
            data.forEach(function (item) {
                product += '<tr>\n' +
                    '<td>' + item.name + '</td>\n' +
                    '<td>' + item.price + '</td>\n' +
                    '<td>\n' +
                    '<img class="img img-thumbnail"\n' +
                    'src='+ window.location.origin +'/image/products/' + item.image + '>\n' +
                    '</td>\n' +
                    '<td>' + item.pivot.quantity + '</td>\n' +
                    '</tr>';
            })
            $('.content_order').html(product);
        },
        error: function (data) {
            console.log('ER', data);
        }
    })
}

function deleteItem(link, id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: link + id,
        method: 'DELETE',
        success: function (data) {
            $('#item' + id).parent('td').parent('tr').remove();
        },
        error: function (data) {
            console.log('ER', data);
        }
    })
}
