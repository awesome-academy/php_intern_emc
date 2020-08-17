<?php

if (! function_exists('price_discount')) {
    function price_discount($price, $discount)
    {
        return $price - ($price * ($discount / 100));
    }
}
