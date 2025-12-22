<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| GUEST ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('laundry.index');
});

Route::get('/laundry', function () {
    return view('laundry.index');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (LOGIN WAJIB)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/order', [OrderController::class, 'index']);
    Route::post('/order', [OrderController::class, 'store']);
});
