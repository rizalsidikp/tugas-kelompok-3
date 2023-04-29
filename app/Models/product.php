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

    public function orders()
    {
        return $this->belongsToMany(orders::class);
    }

    public function carts()
    {
        return $this->hasMany(cart::class);
    }
}
