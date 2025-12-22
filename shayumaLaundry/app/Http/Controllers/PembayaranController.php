<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Order;

class PembayaranController extends Controller
{
    public function store(Request $request)
    {
        Pembayaran::create([
            'order_id' => $request->order_id,
            'metode' => $request->metode,
            'total_bayar' => $request->total_bayar,
            'tanggal_bayar' => now(),
            'status' => 'paid'
        ]);

        Order::where('id',$request->order_id)
            ->update(['status'=>'paid']);

        return back()->with('success','Pembayaran berhasil');
    }
}
