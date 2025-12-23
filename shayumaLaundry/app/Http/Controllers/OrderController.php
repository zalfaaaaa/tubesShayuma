<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => 'required',
            'jam_pickup' => 'required'
        ]);

        $order = Order::buatOrder($request->all());

        return redirect()->route('order.resi', $order->id);
    }

    public function bayar($id)
    {
        $order = Order::findOrFail($id);
        $order->bayar(); // POLYMORPHISM

        return back()->with('success', 'Pembayaran berhasil');
    }
}