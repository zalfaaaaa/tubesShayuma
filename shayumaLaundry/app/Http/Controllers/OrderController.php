<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Layanan;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function index(Request $request)
    {
        $layanans = Layanan::all();

        // ambil layanan dari query (?layanan_id=)
        $selectedLayanan = $request->query('layanan_id');

        return view('order', [
            'layanans' => $layanans,
            'selectedLayanan' => $selectedLayanan,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
        ]);

        $layanan = Layanan::findOrFail($request->layanan_id);

        Order::create([
            'user_id' => auth()->id(),
            'layanan_id' => $layanan->id,
            'harga_satuan' => $layanan->harga,
            'status' => 'PICKUP', // ✅ SESUAI ENUM
        ]);

        return redirect('/riwayat');
    }

    public function riwayat()
    {
        $orders = Order::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('riwayat', compact('orders'));
    }

    public function history()
    {
        $orders = Order::where('user_id', auth()->id())
            ->where('status', Order::STATUS_SELESAI)
            ->latest()
            ->get();

        return view('history', compact('orders'));
    }
    
    public function resi($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('resi', compact('order'));
    }

    public function bayar($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        try {
            $order->bayar(); // 🔑 METHOD OOP DI MODEL
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return back()->with('success', 'Pembayaran berhasil');
    }
}
