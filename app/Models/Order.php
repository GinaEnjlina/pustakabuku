<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'telepon',
        'email',
        'provinsi',
        'kota',
        'alamat_lengkap',
        'kurir',
        'layanan',
        'is_paid',
        'payment_receipt',
    ];

    // Relasi antara model Order dengan model User
    public function user()
    {
        // Order dimiliki oleh satu User
        return $this->belongsTo(User::class);
    }

    // Relasi antara model Order dengan model Transaction
    public function transactions()
    {
        // Order memiliki banyak Transaction
        return $this->hasMany(Transaction::class);
    }
}