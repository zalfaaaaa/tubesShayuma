<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $layanans = Layanan::all();

        $selectedLayanan = null;
        if ($request->has('layanan_id')) {
            $selectedLayanan = Layanan::find($request->layanan_id);
        }

        return view('order', compact('layanans', 'selectedLayanan'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => 'required',
            'berat' => 'required|numeric|min:1',
        ]);

        $layanan = Layanan::findOrFail($request->layanan_id);

        $totalHarga = $request->berat * $layanan->harga;

        $order = Order::create([
            'user_id'       => auth()->id(),
            'layanan_id'    => $layanan->id,
            'berat'         => $request->berat,          // 🔴 WAJIB
            'harga_satuan'  => $layanan->harga,
            'total_harga'   => $totalHarga,
            'tanggal_masuk' => now(),
            'jam_pickup'    => $request->jam_pickup,
            'status'        => 'MENUNGGU_PEMBAYARAN',
        ]);

        return redirect()->route('order.resi', $order->id);
    }


    public function resi($id)
    {
        $order = Order::with(['user', 'layanan'])
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('resi', compact('order'));
    }

    public function bayar($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $order->update([
            'status' => 'DIPROSES'
        ]);

        return redirect()->route('order.pesanan')
            ->with('success', 'Pembayaran berhasil');
    }

    public function history()
    {
        $orders = Order::with('layanan')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('history', compact('orders'));
    }

    public function riwayat()
    {
        $orders = Order::with('layanan')
            ->where('user_id', Auth::id())
            ->where('status', 'SELESAI')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('riwayat', compact('orders'));
    }
}