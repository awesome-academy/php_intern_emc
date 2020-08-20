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
       return $this->hasMany(Comment::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function scopePrice($query, $request)
    {
        if ($request->has('price') && !is_null($request->price)) {
            $data = explode(',', $request->price);
            $query->whereBetween('price', [$data[0], $data[1]]);
        }

        return $query;
    }

    public function scopeDiscount($query, $request)
    {
        if ($request->has('discount') && !is_null($request->discount)) {
            $data = explode(',', $request->discount);
            $query->whereBetween('discount', [$data[0], $data[1]]);
        }

        return $query;
    }

    public function scopeName($query, $request)
    {
        if ($request->has('name') && !is_null($request->name)) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        return $query;
    }

    public function scopeCategory($query, $request)
    {
        if ($request->has('category') && !is_null($request->category)) {
            $query->where('category_id', $request->category);
        }

        return $query;
    }

    public function scopeSortPrice($query, $request)
    {
        if ($request->has('sort') && isset($request->sort)) {
            $query->orderBy('price', $request->sort);
        }
        return $query;
    }
}
