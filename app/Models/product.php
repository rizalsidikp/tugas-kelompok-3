<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'jenis_barang',
        'stock',
        'harga_beli',
        'harga_jual',
        'gambar'
    ];

    public function transactions()
    {
        return $this->belongsTo(orders::class);
    }

    public function carts()
    {
        return $this->hasMany(cart::class);
    }
}
