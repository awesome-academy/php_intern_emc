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
}
