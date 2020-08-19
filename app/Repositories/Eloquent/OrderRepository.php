<?php

namespace App\Repositories\Eloquent;

use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Mockery\Exception;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{

    public function getModel()
    {
        return Order::class;
    }

    public function getOrders()
    {
        return $this->model->with('user')->get();
    }

    public function viewOrder($id)
    {
        $order = $this->model->find($id);
        return $order->products()->get();
    }

    public function deleteOrder($id)
    {
        $result = false;
        try {
            $order = $this->model->find($id);
            $order->delete();
            $result = true;
        } catch (Exception $exception) {
            $result = false;
        }
        return $result;
    }
}
