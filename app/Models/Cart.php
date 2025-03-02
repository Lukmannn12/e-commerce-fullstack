<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'stock_id',
    ];

    // Relasi ke User


    // Relasi ke Produk
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }
}
