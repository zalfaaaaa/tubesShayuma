<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user','layanan'])->get();
        return view('admin.order.index', compact('orders'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'berat' => 'required|numeric|min:1'
        ]);

        $order = Order::findOrFail($id);

        // 🔥 OOP: controller tidak tahu detail
        $order->inputBerat($request->berat);

        return back()->with('success', 'Berat berhasil diinput & status diperbarui');
    }
}
