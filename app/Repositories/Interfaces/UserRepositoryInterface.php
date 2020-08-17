<?php
namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function checkOldPassword($id, $oldPass);
}
