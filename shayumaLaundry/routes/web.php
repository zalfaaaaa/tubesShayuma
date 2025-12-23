<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => redirect('/laundry'));
Route::get('/laundry', [LayananController::class, 'index'])->name('laundry');

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| User (Login Required)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');

    Route::get('/resi/{id}', [OrderController::class, 'resi'])->name('order.resi');
    Route::post('/resi/{id}/bayar', [OrderController::class, 'bayar'])->name('order.bayar');

    Route::get('/riwayat', [OrderController::class, 'riwayat'])->name('riwayat');
    Route::get('/history', [OrderController::class, 'history'])->name('history');
});

/*
|--------------------------------------------------------------------------
| Admin (Auth + AdminMiddleware)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminOrderController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('/orders', [AdminOrderController::class, 'index'])
        ->name('admin.orders');

    Route::put('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])
        ->name('admin.orders.status');
});
