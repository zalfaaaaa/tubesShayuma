<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'nama_layanan',
        'jenis_layanan',
        'tipe',
        'tanggal_masuk',
        'tanggal_keluar',
        'jam_pickup',
        'status'
    ];

    // RELASI (INHERITANCE KONSEP)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
