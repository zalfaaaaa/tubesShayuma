<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        return view('order');
    }

    public function store(Request $request)
    {
        Order::create([
            'user_id' => auth()->id(),
            'layanan' => $request->layanan,
            'berat' => $request->berat,
            'status' => 'PROSES'
        ]);

        return back()->with('success', 'Order berhasil');
    }
}