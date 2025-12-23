<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'layanan'])->latest()->get();
        return view('Admin.orders.index', compact('orders'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'berat' => 'nullable|numeric|min:3',
            'status' => 'required'
        ]);

        if ($request->filled('berat')) {
            $order->berat = $request->berat;
            $order->total_harga = $order->berat * $order->harga_satuan;
        }

        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Order diperbarui');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required',
            'berat'  => 'nullable|numeric|min:3',
        ]);

        if ($request->has('berat')) {
            $order->inputBerat($request->berat);
        }

        if ($request->status !== $order->status) {
            $order->ubahStatus($request->status);
        }

        return back()->with('success', 'Order berhasil diperbarui');
    }

    public function history()
    {
        $orders = Order::latest()->get();

        return view('Admin.history.index', compact('orders'));
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return back()->with('success', 'Order berhasil dihapus');
    }
}
