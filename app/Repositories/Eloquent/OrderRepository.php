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

    public function guestOrderProducts(array $data)
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

    public function statistical()
    {
        $data = [];

        $chart = DB::table('orders')
            ->select(DB::raw('month(created_at) as month'), DB::raw('sum(total_price) as TotalAmount '))
            ->where(DB::raw('year(created_at)'), config('setting.year'))
            ->where('status', config('enums.status.accepted'))
            ->groupBy(DB::raw('month(created_at)'))
            ->get();

        // lặp dữ liệu vừa query để gán vào data
        foreach ($chart as $item) {
            $data[$item->month - 1] = $item->TotalAmount;
        }

        return $data;
    }

    public function countOrder()
    {
        $orderPending = $this->model->where('status', 0)->count();
        $orderSuccess = $this->model->where('status', 1)->count();
        return [
            'order_pending' => $orderPending,
            'order_success' => $orderSuccess
        ];
    }

    public function sumOrderAtWeekend($friday)
    {
        $monday = date_sub($friday, date_interval_create_from_date_string('4 days'));
        $monday_date = date_format($monday, 'Y-m-d');
        $total_order = Order::whereBetween('created_at', [$monday_date, $friday])->count();
        return $total_order;
    }
    
    public function totalOrderOneDay()
    {
        $data = DB::table('orders')
            ->select(DB::raw('count(id) as total'))
            ->where(DB::raw('date(created_at)'), date("Y-m-d"))
            ->groupBy(DB::raw('date(created_at)'))
            ->first();

        $result = $data ? $data->total : 0;
        return $result;
    }
}
