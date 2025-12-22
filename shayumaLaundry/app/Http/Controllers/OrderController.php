<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // ambil data user login
        return view('order', compact('user'));
    }

    public function store(Request $request)
    {
        // Order::create([
        //     'user_id' => auth()->id(),
        //     'layanan' => $request->layanan,
        //     'berat' => $request->berat,
        //     'status' => 'PROSES'
        // ]);

        // return back()->with('success', 'Order berhasil');

        Order::create([
        'user_id' => auth()->id(),
        'nama_layanan' => $request->nama_layanan,
        'jenis_layanan' => $request->jenis_layanan,
        'tipe' => $request->tipe,
        'tanggal_masuk' => $request->tanggal_masuk,
        'tanggal_keluar' => $request->tanggal_keluar,
        'jam_pickup' => $request->jam_pickup,
        'status' => 'MENUNGGU_PEMBAYARAN'
    ]);

    return redirect('/resi');
    }
}