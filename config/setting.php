<?php

return [
    'product' => [
        'pagination' => 5,
        'paginationHome' => 4,
        'pagination_shop' => 9
    ],
    'path_image_url' => 'image/products/',
    'role' => [
        'admin' => 1,
        'guess' => 0,
    ],
    'filter' => [
        '0,50000' => 'Dưới 50.000 đ',
        '50000,100000' => '50.000đ đến 100.000đ',
        '100000,150000' => '100.000đ đến 150.000đ',
        '150000,10000000' => 'Trên 150.000đ',
    ],
    'discount_filter' => [
        '0,20' => 'Dưới 20%',
        '20,50' => 'Discount 20% đến 50%',
        '50,100' => 'Discount 50% đến 100%',
    ],
    'pagination' => [
        'comments' => 7,
    ],
    'default_avatar' => 'http://bootdey.com/img/Content/avatar/avatar1.png',
    'year' => 2020,
];
