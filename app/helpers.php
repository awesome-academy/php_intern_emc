<?php

if (! function_exists('price_discount')) {
    function price_discount($price, $discount)
    {
        return $price - ($price * ($discount / 100));
    }
}

if (! function_exists('total_cart')) {
    function total_cart()
    {
        $total = 0;
        foreach(session('cart', []) as $key => $product) {
            $total += $product['quantity'] * $product['price'];
        }
        return $total;
    }
}
