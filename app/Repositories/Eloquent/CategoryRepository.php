<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return Category::class;
    }

    public function getRootCategory()
    {
        $categories = $this->model->where('parent_id', null)->get();
        return $categories;
    }

    public function updateCategory($id,array $data)
    {
        $result = 'Update failed';
        try {
            $category = $this->model->find($id);

            $category->name = $data['name'];
            $category->parent_id = $data['parent_id'];
            $category->save();

            $result = 'Update successfully';
        } catch (Exception $exception) {
            return $result;
        }
        return $result;
    }
}
