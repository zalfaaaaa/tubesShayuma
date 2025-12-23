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
        Order::findOrFail($id)->update([
            'berat' => $request->berat,
            'status' => $request->status
        ]);

        return back()->with('success', 'Order berhasil diupdate');
    }
}
