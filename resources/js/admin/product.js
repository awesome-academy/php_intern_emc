$(document).ready(function () {
    $("#datatable tbody").on("click", ".remove-product", function () {
        var id = $(this).val();
        deleteItem('products/', id);
    })

    $("#datatable tbody").on("click", ".remove-request", function () {
        var id = $(this).val();
        deleteItem('requestproducts/', id);
    })

    $("#datatable tbody").on("click", ".remove-order", function () {
        var id = $(this).val();
        deleteItem('orders/', id);
    })

    $("#datatable tbody").on("click", ".remove-category", function () {
        var id = $(this).val();
        deleteItem('categories/', id);
    })

    $("#datatable tbody").on("click", ".remove-user", function () {
        var id = $(this).val();
        deleteItem('users/', id);
    })

    $('.view-order').click(function () {
        $('#show_order').modal('show');
        var order_id = $(this).val();
        fetchProductOrders(order_id);
    })

    $("#datatable tbody").on("click", ".pending_btn", function () {
        var request_id = $(this).val();
        var status_text = $(this).parents('tr').find('td')[4].innerText;
        updateStatusRequest('requestproducts/', request_id, 0);
    })

    $("#datatable tbody").on("click", ".cancel_btn", function () {
        var request_id = $(this).val();
        var status_text = $(this).parents('tr').find('td')[4].innerText;
        updateStatusRequest('requestproducts/', request_id, 2);
    })

    $("#datatable tbody").on("click", ".success_btn", function () {
        var product_name = $(this).parents('tr').find('td')[1].innerText;
        var description = $(this).parents('tr').find('td')[2].innerText;
        var image_src = $(this).parents('tr').find('td').children('img').attr('src');
        var image = image_src.split('/')[5];
        var request_id = $(this).val();
        var status_text = $(this).parents('tr').find('td')[4].innerText;
        updateStatusRequest('requestproducts/', request_id, 1);
        $('#add_product_request').modal('show');
        $('#name').val(product_name);
        $('#description').val(description);
        $('#image').val(image);
        $('#img_request').attr('src', image_src);
    })

    $(document).on('click', '.pagination_comment .pagination a', function (event) {
        event.preventDefault();
        var pageNum = $(this).attr('href').split('page=')[1];
        var product_id = $('#product_id').val();
        $.ajax({
            url: '/comments/' + product_id + '?page=' + pageNum,
            method: "GET",
            success: function (data) {
                $('#all_comments').html(data);
            }
        })
    });

    $('.js-btn-mark-all').click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            'url': '/markallnotifications',
            'method': 'GET',
            success: function (data) {
                $('.notification_count').text('0');
            }
        });
    })

    $('.js-btn-delete-noty').click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            'url': '/deletenotifications',
            'method': 'DELETE',
            success: function (data) {
                $('#all_notifications').html('<div></div>');
            }
        });
    })

    $('.js-btn-customer-request').click(function () {
        $('#create_request_product').modal('show');
    })

    $('.js-btn-review').click(function () {
        $('#show_review').modal('show');
    })

    $('.js-btn-add-review').click(function () {
        var product_id = $(this).val();
        var content = $('#content_comment').val();
        var rating = $("input[name='rating_comment']:checked").val();
        var user_name = $('#navbarDropdown').text().trim();

        var data;
        if (rating === undefined) {
            data = {
                'content': content
            };
        } else {
            data = {
                'content': content,
                'rating': rating,
            }
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: product_id + '/reviews',
            method: 'POST',
            data: data,
            success: function (data) {
                var comment = '    <div class="reviews-members pt-4">\n' +
                    '                    <div class="media">\n' +
                    '                        <a href="#"><img alt="Generic placeholder image"\n' +
                    '                                         src="http://bootdey.com/img/Content/avatar/avatar1.png"\n' +
                    '                                         class="mr-3 rounded-pill"></a>\n' +
                    '                        <div class="media-body">\n' +
                    '                            <div class="reviews-members-header">\n' +
                    '                                <h5 class="mb-1"><a class="text-black" href="#">' + user_name + '</a></h5>\n' +
                    '                                <p class="text-gray">' + data.created_at + '</p>\n' +
                    '                            </div>\n' +
                    '                            <div class="reviews-members-body">\n' +
                    '                                <p>' + data.content + '</p>\n' +
                    '                            </div>\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                </div>';
                $('.all_comments').prepend(comment);
                $('#show_review').modal('hide');
            },
            error: function (data) {
                console.log('ER', data);
            }
        })
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
                    'src=' + window.location.origin + '/image/products/' + item.image + '>\n' +
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

function updateStatusRequest(link, id, status_id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: link + id,
        method: 'PUT',
        data: {status: status_id},
        success: function (data) {
            var status_change = '<span class="badge badge-pill ' + data.color + '">' + data.status + '</span>';
            $('#item' + id).parents('tr').find('span').replaceWith(status_change);
        },
        error: function (data) {
        }
    })
}
