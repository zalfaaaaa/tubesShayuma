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
        // Mengambil input atau default ke waktu sekarang
        $month = (int) ($request->month ?? now()->month);
        $year  = (int) ($request->year ?? now()->year);
        $week  = (int) ($request->week ?? 1); 

        // Membuat tanggal awal bulan (Contoh: 2025-12-01)
        $startOfMonth = Carbon::create($year, $month, 1)->startOfMonth();

        // Logika Range Mingguan:
        // Kita ambil awal bulan, lalu tambah minggu sesuai pilihan
        $start = $startOfMonth->copy()->addWeeks($week - 1)->startOfWeek();
        $end   = $start->copy()->endOfWeek();

        $orders = Order::with(['user', 'layanan'])
            ->where('status', 'selesai')
            ->whereBetween('created_at', [$start, $end])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Admin.history.index', compact('orders', 'week', 'month', 'year'));
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return back()->with('success', 'Order berhasil dihapus');
    }
}
