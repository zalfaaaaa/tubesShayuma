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

        return redirect()->route('history')
            ->with('success', 'Order berhasil dibuat');
    }

    public function bayar(Order $order)
    {
        $order->bayar(); // POLYMORPHISM
        return back()->with('success', 'Pembayaran berhasil');
    }
}
