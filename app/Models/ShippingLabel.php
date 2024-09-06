<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingLabel extends Model
{
    protected $fillable = [
        'order_id',
        'label_url',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
