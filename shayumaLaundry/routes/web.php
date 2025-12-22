<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Models\Layanan;

Route::get('/', function () {
    return redirect('/laundry');
});

Route::get('/laundry', function () {
    $layanans = Layanan::all();
    return view('laundry.index', compact('layanans'));
});


Route::get('/laundry', function () {
    $layanans = Layanan::all();
    return view('laundry.index', compact('layanans'));
})->name('laundry');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');

    Route::get('/resi/{id}', [OrderController::class, 'resi'])->name('order.resi');
    Route::post('/resi/{id}/bayar', [OrderController::class, 'bayar'])->name('order.bayar');

});