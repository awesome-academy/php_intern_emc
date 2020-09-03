<?php

namespace App\Repositories\Interfaces;

interface OrderRepositoryInterface
{
    public function getOrders();
    public function viewOrder($id);
    public function deleteOrder($id);
    public function userOrderProducts($user_id);
    public function guestOrderProducts(array $data);
    public function getOrdersOfUser($user_id);
    public function statistical();
    public function countOrder();
    public function sumOrderAtWeekend($friday);
    public function totalOrderOneDay();
    public function getChart($request);
}
