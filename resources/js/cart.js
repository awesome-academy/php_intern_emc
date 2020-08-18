$(document).ready(() => {
    $('.btnAddCart').on('click', function() {
        let id = $(this).attr("data-id");

        const url = '/cart';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                id: id,
                quantity: 1
            },
            success: (res) => {
                if (res.error) {
                    Swal.fire({
                        title: res.name,
                        text: res.error,
                        icon: 'error',
                        confirmButtonText: 'Continue'
                    });
                } else {
                    Swal.fire({
                        title: res.name,
                        text: res.success,
                        icon: 'success',
                        confirmButtonText: 'Continue'
                    });
    
                    $('.cart-number__item').html(res.countCart);
                }
            },
            error: (err) => {
                Swal.fire({
                    title: 'Error',
                    text: 'Product not found',
                    icon: 'error',
                    confirmButtonText: 'Continue'
                });
            }
        })
    });

    // delete cart with ajax
    $('.cart__delete').on('click', function(event) {
        event.preventDefault();
        let id = $(this).attr("data-id");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'DELETE',
            url: 'cart/' +id,
            success: (res) => {
                if (res.error) {
                    Swal.fire({
                        title: 'Error',
                        text: res.error,
                        icon: 'error',
                        confirmButtonText: 'Continue'
                    });
                } else {
                    $(this).parent('.cart__product-icon').parent('.cart__product').remove();
                    $('.cart-number__item').html(res.countCart);
                    $('.total_cart').html(res.totalCart +' đ');
                }
            },
            error: (err) => {
                alert('Has errors');
            }
        })
    });

    // update cart
    $('.input_quantity').on('change', function() {
        let id = $(this).attr('name');
        let quantity = $(this).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'PUT',
            url: 'cart/' +id,
            data: {
                quantity: quantity
            },  
            success: (res) => {
                if (res.error) {
                    Swal.fire({
                        title: 'Error',
                        text: res.error,
                        icon: 'error',
                        confirmButtonText: 'Continue'
                    });
                    $(this).val(quantity - 1);
                } else {
                    $(this).parent().find('.total-price').html(res.totalThisProduct +' đ');
                    $('.total_cart').html(res.totalCart +' đ');
                }
            },
            error: (err) => {
                alert('Has errors');
            }
        })
    });
});
