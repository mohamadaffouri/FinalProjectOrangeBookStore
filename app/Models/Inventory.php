<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use SoftDeletes;
    protected $table = 'inventory';
    protected $fillable = [
        'book_id',
        'quantity',
        'condition',
        'status',
        'price',
        'discount_price',
        'verified_condition', // New field
    'cost'



    ];
    protected $dates = ['deleted_at'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
