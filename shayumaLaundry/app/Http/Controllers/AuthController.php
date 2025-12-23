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
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect('/login')->with('success', 'Registrasi Berhasil!');
    }

    public function showRegister()
    {
        return view('register'); 
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // JIKA ADMIN
            if ($user->email === 'admin@shayuma.com') {
                return redirect('/admin/dashboard');
            }

            // USER BIASA
            return redirect('/order');
        }

        return back()->with('error', 'Login gagal, periksa email/password.');
    }
    
    public function showLogin()
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logout berhasil!');
    }
}
