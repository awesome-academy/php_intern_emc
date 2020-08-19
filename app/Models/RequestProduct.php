<?php

namespace App\Models;

use App\Traits\Statusable;
use Illuminate\Database\Eloquent\Model;

class RequestProduct extends Model
{
    use Statusable;

    protected $fillable = [
        'user_id',
        'product_name',
        'description',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
