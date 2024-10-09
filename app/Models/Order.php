<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_price',
        'shipping_cost',
        'status',
         'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function shippingLabel()
    {
        return $this->hasOne(ShippingLabel::class);
    }
}
