<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\Admin\AdminOrderController;

Route::redirect('/', '/laundry');

Route::get('/laundry', [LayananController::class, 'index'])
    ->name('laundry');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/redirect', function () {
    $user = auth()->user();

    if ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('order.index');
})->middleware('auth');

Route::middleware(['auth', 'role:pelanggan'])->group(function () {

    Route::get('/order', [OrderController::class, 'index'])
        ->name('order.index');

    Route::post('/order', [OrderController::class, 'store'])
        ->name('order.store');

    Route::get('/riwayat', [OrderController::class, 'riwayat'])
        ->name('riwayat');

    Route::get('/history', [OrderController::class, 'history'])
        ->name('history');

    Route::get('/resi/{id}', [OrderController::class, 'resi'])
        ->name('order.resi');
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('Admin.home.index');
        })->name('dashboard');

        Route::get('/orders', [AdminOrderController::class, 'index'])
            ->name('orders');

        Route::put('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])
            ->name('orders.status');
    });
