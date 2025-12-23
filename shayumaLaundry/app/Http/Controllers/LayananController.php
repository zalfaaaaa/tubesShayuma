<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Order;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        return view('laundry.index', compact('layanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
        ]);

        // 🔑 AMBIL DATA LAYANAN
        $layanan = Layanan::findOrFail($request->layanan_id);

        Order::create([
            'user_id' => auth()->id(),
            'layanan_id' => $request->layanan_id,
            'harga_satuan' => $layanan->harga, // 🔥 WAJIB ADA
            'status' => 'pending',
        ]);

        return redirect('/riwayat');
    }
}
