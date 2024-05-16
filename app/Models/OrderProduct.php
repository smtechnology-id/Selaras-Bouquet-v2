<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
        'kode_pesanan',
    ];

    protected $table = 'order_product';

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Relasi dengan model Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
