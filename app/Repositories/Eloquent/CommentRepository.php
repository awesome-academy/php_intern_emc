<?php

namespace App\Repositories\Eloquent;

use App\Models\Comment;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Config;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{

    public function getModel()
    {
        return Comment::class;
    }

    public function getAllCommentProduct($product)
    {
        $comments = $this->model
            ->with('user')
            ->with('product')
            ->where('product_id', $product->id)
            ->orderBy('created_at','desc')
            ->paginate(Config::get('setting.pagination.comments'));
        return $comments;
    }
}
