<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\RequestProductStatus;
use App\Repositories\Interfaces\RequestProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequestProductController extends Controller
{
    private $requestProductRepository;

    public function __construct(RequestProductRepositoryInterface $requestProductRepository)
    {
        $this->requestProductRepository = $requestProductRepository;
    }

    public function index()
    {
        $requestProducts = $this->requestProductRepository->getAllRequests();
        return view('admin.requests.index', compact('requestProducts', $requestProducts));
    }

    public function requestProductFromUser(Request $request)
    {
        $user_id = Auth::user()->id;
        $data = $request->all();
        if ($this->requestProductRepository->requestProductFromUser($user_id, $data)) {
            return redirect()->route('requests.index')->with([
                'message' => trans('admin.notify.product.create.request_success'),
                'color' => 'success',
            ]);
        } else {
            return redirect()->route('requests.index')->with([
                'message' => trans('admin.notify.product.create.request_fail'),
                'color' => 'danger',
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $request_product = $this->requestProductRepository->find($id);
        if ($request_product->update($request->all())) {
            $request_product->user->notify(new RequestProductStatus($request_product));
            return response()->json($request_product->status);
        }
    }

    public function destroy($id)
    {
        if ($this->requestProductRepository->delete($id)) {
            return response()->json([
                'message' => trans('admin.notify.product.delete.success'),
                'color' => 'success',
            ]);
        } else {
            return response()->json([
                'message' => trans('admin.notify.product.delete.success'),
                'color' => 'danger',
            ]);
        }
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        if ($this->requestProductRepository->storeRequestProduct($user_id, $request->all())) {
            return redirect()->route('shop.index')->with([
                'message' => trans('admin.notify.product.create.success'),
                'color' => 'success',
            ]);
        } else {
            return redirect()->route('shop.index')->with([
                'message' => trans('admin.notify.product.create.fail'),
                'color' => 'danger',
            ]);
        }

    }

    public function createProductFromRequest(Request $request)
    {
        if ($this->requestProductRepository->createProductFromRequest($request->all())) {
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
}
