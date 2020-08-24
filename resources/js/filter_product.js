$(document).ready(function () {
    var search_name = '';
    var price = '';
    var category = '';
    var sort = '';
    var discount = '';
    var page = 1;

    var delay = (function () {
        var timer = 0;
        return function (callback, ms) {
            clearTimeout(timer);
            timer = setTimeout(callback, ms);
        };
    })();

    $('#search_txt').keyup(function () {
        delay(function () {
            inputText = $('#search_txt').val().toLowerCase();
            fetchProduct(category, inputText, price, sort, discount, page);
            search_name = inputText;
        }, 300)
    });

    $('input[type=radio][name=category_radio]').change(function () {
        var category_id = $(this).val();
        fetchProduct(category_id, search_name, price, sort, discount, page);
        category = category_id;
    });


    $('input[type=radio][name=price_filter]').change(function () {
        var price_filter = $(this).val();
        fetchProduct(category, search_name, price_filter, sort, discount, page);
        price = price_filter;
    });

    $('#sort_price').change(function () {
        var sort_price = $(this).val();
        fetchProduct(category, search_name, price, sort_price, discount, page);
        sort = sort_price;
    });
    $('#filter_discount').change(function () {
        var filter_discount = $(this).val();
        if (filter_discount == '') {
            fetchProduct('', '', '', '', '', 1);
        } else {
            fetchProduct(category, search_name, price, sort, filter_discount, page);
            discount = filter_discount;
        }
    });

    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var pageNum = $(this).attr('href').split('page=')[1];
        fetchProduct(category, search_name, price, sort, discount, pageNum);
    });

    function fetchProduct(category, search_name, price, sort, discount, page) {
        $.ajax({
            url: '/filter/products?' + 'category=' + category +
                '&price=' + price +
                '&name=' + search_name +
                '&sort=' + sort +
                '&discount=' + discount +
                '&page=' + page,
            method: 'GET',
            success: function (data) {
                $('.product_show').hide().html(data).fadeIn(1000);
            }
        })
    }
});
