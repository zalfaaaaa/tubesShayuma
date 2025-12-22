<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'layanan_id',
        'jumlah',
        'harga_satuan',
        'total_harga',
        'tanggal_masuk',
        'tanggal_keluar',
        'jam_pickup',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
        
