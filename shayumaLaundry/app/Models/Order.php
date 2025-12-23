<?php

namespace App\Models;

use App\Models\Layanan;
use Exception;

class Order extends BaseOrder
{
    // relation
    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    // factory method
    public static function buatOrder(array $data): self
    {
        $layanan = Layanan::findOrFail($data['layanan_id']);

        return self::create([
            'user_id'       => auth()->id(),
            'layanan_id'    => $layanan->id,
            'harga_satuan'  => $layanan->harga,
            'berat'         => null,
            'total_harga'   => null,
            'jam_pickup'    => $data['jam_pickup'],
            'tanggal_masuk' => now(),
            'status'        => self::STATUS_PICKUP,
        ]);
    }

    // polymorphism
    public function inputBerat(float $berat): void
    {
        if ($this->status !== self::STATUS_PICKUP) {
            throw new Exception('Order tidak bisa ditimbang');
        }

        $this->update([
            'berat'       => $berat,
            'total_harga' => $this->hitungTotal($berat),
            'status'      => self::STATUS_MENUNGGU_PEMBAYARAN,
        ]);
    }

    public function bayar(): void
    {
        if ($this->status !== self::STATUS_MENUNGGU_PEMBAYARAN) {
            throw new Exception('Order belum bisa dibayar');
        }

        $this->update([
            'status' => self::STATUS_DIPROSES
        ]);
    }

    // accessor
    public function getBeratLabelAttribute()
    {
        return $this->berat ? "{$this->berat} kg" : 'Menunggu inputan admin';
    }

    public function getTotalHargaLabelAttribute()
    {
        return $this->total_harga
            ? 'Rp ' . number_format($this->total_harga)
            : 'Menunggu inputan admin';
    }
}
