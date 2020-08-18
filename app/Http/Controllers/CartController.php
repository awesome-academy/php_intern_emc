<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class CartController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Dữ liệu để test
        $sessionCart = session('cart', []);
        return view('cart', compact('sessionCart'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $this->productRepository->find($request->id);
        $id = $product->id;

        if ($product->stock_amount <= 0) {
            // dừng lại nếu sản phẩm hết hàng
            return response()->json([
                'name' => $product->name,
                'error' => trans('home.out_of_stock'),
            ]);
        }

        if (session()->has("cart.$id")) {
            // nếu sản phẩm đã tồn tại thì cập nhật số lượng sản phẩm
            $productExists = session("cart.$id");
            $productExists['quantity'] += $request->quantity;
            session(["cart.$id" => $productExists]);

        } else {
            $data = [
                'name' => $product->name,
                'image' => $product->image,
                'price' => price_discount($product->price, $product->discount),
                'quantity' => (int) $request->quantity
            ];
            session()->put("cart.$id", $data);
        }

        return response()->json([
            'name' => $product->name,
            'success' => trans('home.cart_success'),
            'countCart' => count(session('cart')),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = $this->productRepository->find($id);
        if ($product->stock_amount < $request->quantity) {
            // dừng lại nếu sản phẩm hết hàng
            return response()->json([
                'name' => $product->name,
                'error' => trans('home.not_enough'),
            ]);
        }
        
        $productExists = session("cart.$id");
        $productExists['quantity'] = $request->quantity;
        session(["cart.$id" => $productExists]);

        $totalThisProduct = $productExists['quantity'] * $productExists['price'];

        return response()->json([
            'totalThisProduct' => number_format($totalThisProduct),
            'totalCart' => number_format(total_cart()),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (session()->has("cart.$id")) {
            session()->forget("cart.$id");
            return response()->json([
                'countCart' => count(session('cart')),
                'totalCart' => number_format(total_cart()),
            ]);
        } else {
            return response()->json([
                'error' => trans('home.not_exist_cart'),
            ]);
        }
        
    }
}
