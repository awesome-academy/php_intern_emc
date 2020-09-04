<?php
namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function checkOldPassword($id, $oldPass);

    public function getAllUsers();

    public function getUserSocialNetWork($getInfo, $provider);

}
