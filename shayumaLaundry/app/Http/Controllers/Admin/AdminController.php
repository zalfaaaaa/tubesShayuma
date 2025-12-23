<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class AdminController extends Controller
{
    public function dashboard()
    {
        $orders = Order::with(['user','layanan'])->latest()->get();
        return view('admin.dashboard', compact('orders'));
    }
}
