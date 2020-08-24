<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use Mockery\Exception;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index(Request $request)
    {
        if (count(session('cart', [])) == 0) {
            return redirect()->route('cart.index')->with('errorOrder', trans('home.order_emply_cart'));
        }

        if (Auth::check()) {
            return $this->userOrder($request);
        } else {
            $sessionCart = session('cart', []);
            return view('order', compact('sessionCart'));
        }
    }

    public function userOrder(Request $request)
    {
        $user_id = $request->user()->id;
        $result = $this->orderRepository->userOrderProducts($user_id);

        if ($result === 'Order successfully') {
            $sendMail = $this->sendMail($request->user()->email);
            session()->forget('cart');
            if ($sendMail === 'Send mail success') {
                return redirect()->route('cart.index')->with('successOrder', trans('home.success_order'));
            } else {
                return redirect()->route('cart.index')->with('errorOrder', trans('home.mail.error_mail'));
            }
        } else {
            return redirect()->route('cart.index')->with('errorOrder', trans('home.error_order'));
        }
    }

    public function guestOrder(OrderRequest $request)
    {
        if (count(session('cart', [])) == 0) {
            return redirect()->route('order.index')->with('errorOrder', trans('home.order_emply_cart'));
        }

        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'total_price' => total_cart(),
            'status' => config('enums.status.pending'),
        ];

        $result = $this->orderRepository->guestOrderProducts($data);

        if ($result === 'Order successfully') {
            $sendMail = $this->sendMail($request->email);
            session()->forget('cart');

            if ($sendMail === 'Send mail success') {
                return redirect()->route('cart.index')->with('successOrder', trans('home.success_order'));
            } else {
                return redirect()->route('cart.index')->with('errorOrder', trans('home.mail.error_mail'));
            }
        } else {
            return redirect()->route('order.index')->with('errorOrder', trans('home.error_order'));
        }
    }

    public function show($id)
    {
        $productsOrder = $this->orderRepository->viewOrder($id);
        return view('components.detailOrder', compact('productsOrder'));
    }

    public function sendMail($email)
    {
        try {
            $content = [
                'products' => session('cart'),
                'total' => total_cart(),
            ];
            Mail::to($email)->send(new OrderMail($content));
            return 'Send mail success';
        } catch(\Exception $e) {
            return 'Send mail error';
        }
    }
}
