<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

    public function history(Request $request)
    {
        // Minggu & tahun (default minggu ini)
        $week = $request->week ?? now()->weekOfYear;
        $year = $request->year ?? now()->year;

        // Range minggu
        $start = now()->setISODate($year, $week)->startOfWeek();
        $end   = now()->setISODate($year, $week)->endOfWeek();

        // Semua order selesai
        $orders = Order::with(['user', 'layanan'])
            ->where('status', 'selesai')
            ->whereBetween('created_at', [$start, $end])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Admin.history.index', compact('orders', 'week', 'year'));
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return back()->with('success', 'Order berhasil dihapus');
    }
}
