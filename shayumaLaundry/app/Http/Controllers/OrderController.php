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
        $user = Auth::user();
        $layanans = Layanan::all();

        $selectedLayanan = null;
        if ($request->has('layanan_id')) {
            $selectedLayanan = Layanan::find($request->layanan_id);
        }

        return view('order', compact('layanans', 'selectedLayanan'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => 'required',
            'berat' => 'required|numeric|min:1'
        ]);

        Order::create([
            'user_id' => auth()->id(),
            'layanan_id' => $request->layanan_id,
            'berat' => $request->berat,
            'status' => 'MENUNGGU'
        ]);

        return redirect()->back()->with('success', 'Order berhasil dibuat');
    }


    public function resi($id)
{
    $order = Order::with(['user', 'layanan'])->findOrFail($id);
    return view('resi', compact('order'));
}

    public function bayar($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'DIPROSES']);

        return back()->with('success', 'Pembayaran berhasil');
    }

}
