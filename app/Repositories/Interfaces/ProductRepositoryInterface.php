<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function getProducts();
    public function addProduct(array $data);
    public function updateProduct($id, $data);
}
