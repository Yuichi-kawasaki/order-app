<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UsersController;

Route::get('/sessions/new', [SessionsController::class, 'create'])->name('login');
// Route::get('sessions/new', [SessionsController::class, 'create'])->name('sessions.new');
Route::get('sessions/destroy', [SessionsController::class, 'destroy'])->name('sessions.destroy');
Route::post('/logout', [SessionsController::class, 'destroy'])->name('logout');
Route::post('/sessions', [SessionsController::class, 'store'])->name('sessions.store');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/items', [ItemsController::class, 'index'])->name('items.index');
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('orders/new', [OrdersController::class, 'new'])->name('orders.new');
    Route::post('orders/create', [OrdersController::class, 'create'])->name('orders.create');
});


Route::get('sessions', [SessionsController::class, 'destroy']);
Route::get('users/new', [UsersController::class, 'new'])->name('users.new');
Route::post('users/new', [UsersController::class, 'create'])->name('users.create');
Route::post('users/create', [UsersController::class, 'create'])->name('users.create');
Route::get('register', [RegisterController::class, 'index'])->name('register.index');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');
