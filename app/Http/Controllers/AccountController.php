<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Http\Requests\UpdateInfoRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    protected $user;
    protected $orderRepository;

    public function __construct(
        UserRepositoryInterface $user,
        OrderRepositoryInterface $orderRepository
    )
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->orderRepository = $orderRepository;
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $orders = $this->orderRepository->getOrdersOfUser($user->id);
        return view('account', compact(['user', 'orders']));
    }

    public function update(UpdateInfoRequest $request, User $user)
    {
        $id = $request->user()->id;
        $data = $request->only(['full_name', 'birthday', 'address', 'gender', 'phone_number']);
        $this->user->update($id, $data);

        return redirect()->back()->with('updateInfoSuccess', trans('home.update_success'));
    }

    public function updatePass(UpdatePasswordRequest $request)
    {
        $id = $request->user()->id;
        $checkOldPass = $this->user->checkOldPassword($id, $request->old_pass);
    
        if ($checkOldPass === 'The old password is correct') {
            $hashNewPass = Hash::make($request->password);
            $this->user->update($id, ['password' => $hashNewPass]);

            return redirect()->back()->with('updatePasswordSuccess', trans('home.update_pass_success'));
        } else {
            return redirect()->back()->with('updatePasswordError', trans('home.update_pass_error'));
        }
    }
}
