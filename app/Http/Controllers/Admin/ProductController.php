<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateProductRequest;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductController extends Controller
{
    private $productRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $products = $this->productRepository->getProducts();
        return view('admin.products.index', compact('products', $products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        if ($this->productRepository->addProduct($request->all())) {
            return redirect()->route('products.index')->with([
                'message' => trans('admin.notify.product.create.success'),
                'color' => 'success',
            ]);
        } else {
            return redirect()->route('products.index')->with([
                'message' => trans('admin.notify.product.create.fail'),
                'color' => 'success',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);
        return view('admin.products.edit', compact('product', $product));
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
        if ($this->productRepository->updateProduct($id, $request->all())) {
            return redirect()->route('products.index')->with([
                'message' => trans('admin.notify.product.update.success'),
                'color' => 'success',
            ]);
        } else {
            return redirect()->route('products.index')->with([
                'message' => trans('admin.notify.product.update.fail'),
                'color' => 'success',
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
        if ($this->productRepository->delete($id)) {
            return response()->json([
                'message' => trans('admin.notify.product.delete.success'),
                'color' => 'success',
            ]);
        }
    }

    public function importProduct(Request $request)
    {
        if ($this->productRepository->importProducts($request->file('excel_file'))){
            return redirect()->route('products.index')->with([
                'message' => trans('admin.notify.product.create.import_success'),
                'color' => 'success',
            ]);
        } else {
            return redirect()->route('products.index')->with([
                'message' => trans('admin.notify.product.create.import_fail'),
                'color' => 'danger',
            ]);
        }
    }
}
