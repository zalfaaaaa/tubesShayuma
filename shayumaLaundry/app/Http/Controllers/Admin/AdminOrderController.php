<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
     public function index()
    {
        $orders = Order::with(['user','layanan'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    // form edit (isi berat & status)
    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    // simpan perubahan
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'berat' => 'required|numeric|min:1',
            'status' => 'required'
        ]);

        $order->update([
            'berat' => $request->berat,
            'status' => $request->status,
            'total_harga' => $request->berat * $order->layanan->harga
        ]);

        return redirect('/admin/orders')->with('success','Order berhasil diupdate');
    }
}
