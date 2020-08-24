<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Interfaces\RequestProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class AdminController extends Controller
{
    private $orderRepository;
    private $requestProductRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        RequestProductRepositoryInterface $requestProductRepository
    )
    {
        $this->middleware(['auth.admin', 'auth']);
        $this->orderRepository = $orderRepository;
        $this->requestProductRepository = $requestProductRepository;
    }

    public function index()
    {
        $requestCount = $this->requestProductRepository->requestProductCount();
        $orderCount = $this->orderRepository->countOrder();
        return view('admin.index')
            ->with('requestCount', $requestCount)
            ->with('orderCount', $orderCount);
    }

    public function getStatistical()
    {
        $statistical = $this->orderRepository->statistical();
        return $statistical;
    }
}
