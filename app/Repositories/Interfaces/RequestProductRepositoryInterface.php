<?php

namespace App\Repositories\Interfaces;

interface RequestProductRepositoryInterface
{
    public function requestProductFromUser($userId, $data);

    public function createProductFromRequest($data);

    public function storeRequestProduct($user_id, $data);

    public function getAllRequests();
}
