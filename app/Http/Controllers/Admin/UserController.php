<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class UserController extends Controller
{
    private $userRepository;
    private $orderRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        OrderRepositoryInterface $orderRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->getAllUsers(); 
        return view('admin.users.index', compact('users'));
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
    public function store(RegisterRequest $request)
    {
        $data = [
            'username' => $request->username,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'role' => 0,
        ];

        if ($this->userRepository->create($data)) {
            return redirect()->route('users.index')->with([
                'message' => trans('admin.notify.user.create.success'),
                'color' => 'success',
            ]);
        } else {
            return redirect()->route('users.index')->with([
                'message' => trans('admin.notify.user.create.fail'),
                'color' => 'success',
            ]);
        }
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
        $user = $this->userRepository->find($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->only(['full_name', 'email' ,'birthday', 'address', 'gender', 'phone_number']);

        if ($this->userRepository->update($id, $data)) {
            return redirect()->back()->with([
                'message' => trans('admin.notify.user.update.success'),
                'color' => 'success',
            ]);
        } else {
            return redirect()->back()->with([
                'message' => trans('admin.notify.user.update.fail'),
                'color' => 'success',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->userRepository->delete($id)) {
            return response()->json([
                'message' => trans('admin.notify.user.delete.success'),
                'color' => 'success',
            ]);
        }
    }

    public function order($id)
    {
        $user = $this->userRepository->find($id);
        $orders = $this->orderRepository->getOrdersOfUser($user->id);
        return view('admin.users.detail', compact('orders'));
    }
}
