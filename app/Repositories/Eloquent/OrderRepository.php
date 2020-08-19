<?php

namespace App\Repositories\Eloquent;

use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Mockery\Exception;
use DB;

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

    public function getOrdersOfUser($user_id)
    {
        return $this->model->where('user_id', $user_id)->get();
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

    public function userOrderProducts($user_id)
    {
        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => $user_id,
                'total_price' => total_cart(),
                'status' => config('enums.status.pending'),
            ]);
    
            foreach (session('cart') as $key => $product) {
                $order->productOrders()->create([
                    'product_id' => $key,
                    'quantity' => $product['quantity'],
                    'price' => $product['price'],
                ]);
            }

            DB::commit();
            return 'Order successfully';
        } catch (\Exception $e) {
            DB::rollback();
            return 'Order error';
        }
    }

    public function guestOrderProducts($data)
    {
        DB::beginTransaction();

        try {
            $order = Order::create($data);
    
            foreach (session('cart') as $key => $product) {
                $order->productOrders()->create([
                    'product_id' => $key,
                    'quantity' => $product['quantity'],
                    'price' => $product['price'],
                ]);
            }

            DB::commit();
            return 'Order successfully';
        } catch (\Exception $e) {
            DB::rollback();
            return 'Order error';
        }
    }
}
