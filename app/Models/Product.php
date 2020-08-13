<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'information',
        'image',
        'stock_amount',
        'price',
        'discount',
        'category_id',
    ];

    function orders()
    {
        return $this->belongsToMany(Order::class);

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        $this->hasMany(Comment::class);
    }

    public function rates()
    {
        $this->hasMany(Rate::class);
    }

}
