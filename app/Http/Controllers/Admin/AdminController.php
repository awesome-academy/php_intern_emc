<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class AdminController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        return view('admin.index');
    }

    public function getStatistical()
    {
        $statistical = $this->orderRepository->statistical();
        return $statistical;
    }
}
