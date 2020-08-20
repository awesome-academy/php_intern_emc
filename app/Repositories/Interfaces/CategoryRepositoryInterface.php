<?php

namespace App\Repositories\Interfaces;

interface CategoryRepositoryInterface
{
    public function getRootCategory();
    public function updateCategory($id, array $data);
}
