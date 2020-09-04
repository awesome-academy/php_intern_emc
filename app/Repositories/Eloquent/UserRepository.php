<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function checkOldPassword($id, $oldPass)
    {
        $user = $this->model->find($id);

        if (Hash::check($oldPass, $user->password)) {
            return 'The old password is correct';
        } else {
            return "The old password is not correct";
        }
    }

    public function getAllUsers()
    {
        $users = $this->model->where('role', 0)->get();

        return $users;
    }

    public function getUserSocialNetWork($getInfo, $provider)
    {
        $user = User::where('provider_id', $getInfo->id)->first();

        if (!$user) {
            $user = User::create([
                'full_name' => $getInfo->name,
                'email' => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id,
                'username' => $getInfo->email,
                'password' => Hash::make('123456789'),
                'birthday' => config('setting.default_birthday'),
                'address' => config('setting.default_address'),
                'phone_number' => config('setting.default_phone_number'),
                'gender' => config('setting.default_gender'),
                'role' => 0,
            ]);
        }
        return $user;
    }
}
