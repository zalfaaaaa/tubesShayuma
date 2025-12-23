<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        return view('order', [
            'layanans'        => Layanan::all(),
            'selectedLayanan' => $request->layanan_id
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'jam_pickup' => 'required'
        ]);

        $order = Order::buatOrder([
            'layanan_id' => $request->layanan_id,
            'jam_pickup' => $request->jam_pickup
        ]);

        return redirect()->route('riwayat')
            ->with('success', 'Order berhasil dibuat');
    }

    public function bayar(Order $order)
    {
        $order->bayar(); // POLYMORPHISM
        return back()->with('success', 'Pembayaran berhasil');
    }

    public function riwayat()
    {
        $orders = Order::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('riwayat', compact('orders'));
    }

    public function history(Request $request)
    {
        // default: minggu ini
        $week = $request->get('week', 'this');

        if ($week === 'last') {
            $start = Carbon::now()->subWeek()->startOfWeek();
            $end   = Carbon::now()->subWeek()->endOfWeek();
        } else {
            $start = Carbon::now()->startOfWeek();
            $end   = Carbon::now()->endOfWeek();
        }

        $orders = Order::where('user_id', auth()->id())
            ->whereBetween('created_at', [$start, $end])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('history', compact('orders', 'week'));
    }

    public function resi($id)
    {
        $order = Order::with(['user', 'layanan'])->findOrFail($id);

        return view('resi', compact('order'));
    }


}
