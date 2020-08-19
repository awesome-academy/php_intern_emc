<?php


namespace App\Repositories\Interfaces;


interface OrderRepositoryInterface
{
    public function getOrders();
    public function viewOrder($id);
    public function deleteOrder($id);
}
