<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{protected $table = 'inventory';
    protected $fillable = [
        'book_id',
        'quantity',
        'condition',
        'status',
        'price',
        'verified_condition', // New field
    'cost'



    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
