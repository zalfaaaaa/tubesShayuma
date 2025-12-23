<?php

namespace App\Models;

use App\Models\Layanan;
use App\Models\User;
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
            'berat'         => self::MIN_BERAT,
            'total_harga'   => self::MIN_BERAT * $layanan->harga,
            'jam_pickup'    => $data['jam_pickup'],
            'tanggal_masuk' => now(),
            'status'        => self::STATUS_PICKUP,
        ]);
    }

    // polymorphism
    public function inputBerat(float $berat): void
    {
        if ($berat < self::MIN_BERAT) {
            throw new Exception('Berat minimal 3 kg');
        }

        $this->update([
            'berat'       => $berat,
            'total_harga' => $this->hitungTotal($berat),
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
    public function getBeratLabelAttribute(): string
    {
        return $this->berat !== null
            ? "{$this->berat} kg"
            : 'Menunggu inputan admin';
    }

    public function getTotalHargaLabelAttribute(): string
    {
        return $this->total_harga !== null
            ? 'Rp ' . number_format($this->total_harga)
            : 'Menunggu inputan admin';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ubahStatus(string $status): void
    {
        $this->update(['status' => $status]);
    }

}
