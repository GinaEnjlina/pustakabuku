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
        'amount'
    ];

    // Relasi antara cart dan user (satu cart dimiliki oleh satu user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi antara cart dan product (satu cart terkait dengan satu product)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
