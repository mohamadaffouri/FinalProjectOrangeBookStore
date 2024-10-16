<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'isbn_10',
        'isbn_13',
        'title',
        'author',
        'edition',
        'image',
        'languages', 'description', 'categoryTree'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }
    public function reviews()
{
    return $this->hasMany(Review::class);
}
}
