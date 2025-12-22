<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkapsulasi password (hashing)
        ]);

        return redirect('/login')->with('success', 'Registrasi Berhasil!');
    }

    // Method untuk Login
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/order'); // Jika sukses, arahkan ke menu pesanan
        }

        return back()->with('error', 'Login gagal, periksa email/password.');
    }
}
