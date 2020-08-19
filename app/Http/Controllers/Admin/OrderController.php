<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->orderRepository->getOrders();
        return view('admin.orders.index', compact('orders', $orders));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->orderRepository->viewOrder($id)->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = $this->orderRepository->find($id);
        return view('admin.orders.edit', compact('order', $order));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = $this->orderRepository->find($id);
        if ($order->update($request->all())) {
            return redirect()->route('orders.index')->with([
                'message' => trans('admin.notify.order.update.success'),
                'color' => 'success',
            ]);
        } else {
            return redirect()->route('orders.index')->with([
                'message' => trans('admin.order.order.update.fail'),
                'color' => 'danger',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->orderRepository->deleteOrder($id)) {
            return response()->json([
                'message' => trans('admin.notify.order.delete.success'),
                'color' => 'success',
            ]);
        }
    }
}
