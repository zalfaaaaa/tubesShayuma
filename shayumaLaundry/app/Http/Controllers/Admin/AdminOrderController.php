<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'layanan'])
            ->latest()
            ->get();

        return view('Admin.orders.index', compact('orders'));
    }

    public function dashboard()
    {
        $totalOrder = Order::count();

        return view('Admin.dashboard', compact('totalOrder'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:PICKUP,DIPROSES,SELESAI',
            'berat'  => 'required|numeric|min:1',
        ]);

        $order->update([
            'status'       => $request->status,
            'berat'        => $request->berat,
            'total_harga'  => $request->berat * $order->layanan->harga,
        ]);

        return back()->with('success', 'Order diperbarui');
    }
}
