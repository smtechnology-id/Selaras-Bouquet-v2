<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
    ];
    protected $table = 'cart_items';

    // Relasi dengan model Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relasi dengan model User (jika menggunakan autentikasi pengguna)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
