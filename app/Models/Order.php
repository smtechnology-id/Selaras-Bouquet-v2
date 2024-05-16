<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'kode_pesanan',
        'total_price',
        'address',
        'telp',
        'payment_proof',
        'status_order',
        'catatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
