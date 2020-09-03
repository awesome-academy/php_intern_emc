<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class HomeController extends Controller
{
    protected $productRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $newProducts = $this->productRepository->getProductsOrderbyHome('created_at', 'DESC');
        $saleProducts = $this->productRepository->getProductsOrderbyHome('discount', 'DESC');
        $trendProducts = $this->productRepository->getProductsOrderbyHome('view', 'DESC');
        $viewedProducts = $this->productRepository->getManyProducts([1, 2, 3, 4]); // dữ liệu test

        return view('home', compact(['newProducts', 'saleProducts', 'trendProducts', 'viewedProducts']));
    }
}
