<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Contracts\OrderProcessInterface;
use Exception;

abstract class BaseOrder extends Model implements OrderProcessInterface
{
    const STATUS_PICKUP = 'PICKUP';
    const STATUS_MENUNGGU_PEMBAYARAN = 'MENUNGGU_PEMBAYARAN';
    const STATUS_DIPROSES = 'DIPROSES';
    const STATUS_SELESAI = 'SELESAI';
    const STATUS_DIAMBIL = 'DIAMBIL';
    const MIN_BERAT = 3.0;

    protected $fillable = [
        'user_id',
        'layanan_id',
        'berat',
        'harga_satuan',
        'total_harga',
        'jam_pickup',
        'jam_keluar',        
        'tanggal_masuk',
        'tanggal_keluar',   
        'status'
    ];

    protected function hitungTotal(float $berat): float
    {
        return $berat * $this->harga_satuan;
    }

    abstract public function inputBerat(float $berat): void;
    abstract public function bayar(): void;
}
