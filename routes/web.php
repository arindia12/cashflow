<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    })->name('welcome');

Auth::routes(['register' => false]);

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth'],
], function () {

    // Dashboard
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

    // Transaksi 
    Route::resource('transactions', TransactionController::class);

    // Kategori 
    Route::resource('categories', CategoryController::class);

    // Profil
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

});