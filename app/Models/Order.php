<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_price',
        'full_name',
        'address',
        'phone_number',
        'status',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_orders')
            ->withPivot('product_id', 'order_id', 'quantity', 'price');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
