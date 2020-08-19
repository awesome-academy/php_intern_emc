<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    private $productRepository;
    private $categoryRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->showProductShop();
        $categories = Category::with('products')->get();
        return view('shop.index')->with('products', $products)
            ->with('categories', $categories);
    }

    public function filterProduct(Request $request)
    {
        if ($request->ajax()) {
            $products = $this->productRepository->filterProduct($request);
            return view('shop.product', compact('products', $products))->render();
        }
    }
}
