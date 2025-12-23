<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'layanan'        => 'required|string',
            'descLayanan'    => 'required|string',
            'waktuLayanan'   => 'required',
            'jenisLayanan'   => 'required',
            'harga'          => 'required|numeric|min:0',
            'imgLayanan'     => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $namaFile = null;
        if ($request->hasFile('imgLayanan')) {
            $namaFile = $request->file('imgLayanan')->store('layanan', 'public');
        }

        Layanan::create([
            'layanan'       => $request->layanan,
            'descLayanan'   => $request->descLayanan,
            'imgLayanan'    => $namaFile,
            'waktuLayanan'  => $request->waktuLayanan,
            'jenisLayanan'  => $request->jenisLayanan,
            'harga'         => $request->harga,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Layanan berhasil ditambahkan');

    }

    public function create()
    {
        return view('Admin.home.create');
    }

    public function destroy(Layanan $layanan)
    {
        if ($layanan->imgLayanan && Storage::disk('public')->exists($layanan->imgLayanan)) {
            Storage::disk('public')->delete($layanan->imgLayanan);
        }

        $layanan->delete();

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Layanan berhasil dihapus');
    }

    public function edit(Layanan $layanan)
    {
        return view('Admin.home.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan)
{
    $request->validate([
        'layanan' => 'required',
        'descLayanan' => 'required',
        'waktuLayanan' => 'required',
        'jenisLayanan' => 'required',
        'harga' => 'required|numeric',
        'imgLayanan' => 'image|mimes:jpg,png,jpeg|max:2048'
    ]);

    // Jika upload gambar baru
    if ($request->hasFile('imgLayanan')) {

        // hapus gambar lama
        if ($layanan->imgLayanan && Storage::disk('public')->exists($layanan->imgLayanan)) {
            Storage::disk('public')->delete($layanan->imgLayanan);
        }

        $layanan->imgLayanan = $request->file('imgLayanan')
            ->store('layanan', 'public');
    }

    // Update data lain
    $layanan->update([
        'layanan' => $request->layanan,
        'descLayanan' => $request->descLayanan,
        'waktuLayanan' => $request->waktuLayanan,
        'jenisLayanan' => $request->jenisLayanan,
        'harga' => $request->harga,
        'imgLayanan' => $layanan->imgLayanan
    ]);

    return redirect()
        ->route('admin.dashboard')
        ->with('success', 'Layanan berhasil diperbarui');
}
}
