<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'orders_id',
        'product_id',
        'amount',
    ];

    public function order()
    {
        return $this->belongsTo(orders::class);
    }

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
