<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = [
        'layanan',
        'deskripsi_layanan',
        'waktu_layanan',
        'jenis_layanan',
        'harga'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}