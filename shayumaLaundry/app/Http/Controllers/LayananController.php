<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'layanan' => 'required',
            'imgLayanan' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        // upload file
        $namaFile = null;
        if ($request->hasFile('imgLayanan')) {
            $namaFile = $request->file('imgLayanan')->store('layanan', 'public');
        }

        Layanan::create([
            'layanan' => $request->layanan,
            'imgLayanan' => $namaFile,
            // kolom lain kalau ada
        ]);

        return back()->with('success', 'Layanan berhasil ditambahkan');
    }
}
