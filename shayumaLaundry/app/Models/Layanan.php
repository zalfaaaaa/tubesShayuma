<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = [
        'layanan',
        'descLayanan',
        'imgLayanan',
        'waktuLayanan',
        'jenisLayanan',
        'harga'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}