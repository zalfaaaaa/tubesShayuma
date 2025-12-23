<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Contracts\OrderProcessInterface;
use Exception;

abstract class BaseOrder extends Model implements OrderProcessInterface
{
    // encapsulation
    const STATUS_PICKUP = 'PICKUP';
    const STATUS_MENUNGGU_PEMBAYARAN = 'MENUNGGU_PEMBAYARAN';
    const STATUS_DIPROSES = 'DIPROSES';
    const STATUS_SELESAI = 'SELESAI';

    protected $fillable = [
        'user_id',
        'layanan_id',
        'berat',
        'harga_satuan',
        'total_harga',
        'jam_pickup',
        'tanggal_masuk',
        'status'
    ];

    //inheritance
    protected function hitungTotal(float $berat): float
    {
        return $berat * $this->harga_satuan;
    }

    //abstract methods
    abstract public function inputBerat(float $berat): void;
    abstract public function bayar(): void;
}
