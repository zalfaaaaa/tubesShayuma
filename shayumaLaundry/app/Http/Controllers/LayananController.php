<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        return view('Admin.layanan.index', compact('layanans'));
    }

    public function create()
    {
        return view('Admin.layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan' => 'required',
            'harga' => 'required|numeric',
        ]);

        Layanan::create($request->all());

        return redirect()->route('admin.layanan.index');
    }

    public function edit(Layanan $layanan)
    {
        return view('Admin.layanan.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        $layanan->update($request->all());
        return redirect()->route('admin.layanan.index');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return back();
    }
}
