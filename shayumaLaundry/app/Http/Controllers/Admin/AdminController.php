<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Layanan;

class AdminController extends Controller
{
    public function dashboard()
    {
        $layanans = Layanan::all();

        return view('Admin.home.index', compact('layanans'));
    }
}
