<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'stock'
    ];
    
    // Relasi antara model Product dengan model Transaction
    public function transactions()
    {
        // Product memiliki banyak Transaction
        return $this->hasMany(Transaction::class);
    }
    
    // Relasi antara model Product dengan model Cart
    public function carts()
    {
        // Product dimiliki oleh banyak Cart
        return $this->hasMany(Cart::class);
    }
}
