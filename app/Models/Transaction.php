<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'amount'
    ];

    // Relasi antara model Transaction dengan model Order
    public function order()
    {
        // Transaction dimiliki oleh satu Order
        return $this->belongsTo(Order::class);
    }

    // Relasi antara model Transaction dengan model Product
    public function product()
    {
        // Transaction dimiliki oleh satu Product
        return $this->belongsTo(Product::class);
    }
} 
