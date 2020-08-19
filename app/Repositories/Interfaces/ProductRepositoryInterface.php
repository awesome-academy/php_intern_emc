<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function getProducts();
    public function addProduct(array $data);
    public function updateProduct($id, $data);
    public function importProducts($data);
    public function getProductsOrderbyHome($field, $sort);
    public function getProductsOrderby($field, $sort);
    public function getManyProducts(array $data);
    public function filterProduct($request);
    public function showProductShop();
}
