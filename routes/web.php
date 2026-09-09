<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ==================== TRANSACTIONS ====================

Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');

Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');

Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

Route::get('/transactions/{transaction}', [TransactionController::class, 'show'])->name('transactions.show');

Route::get('/transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');

Route::put('/transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');

Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');


// ==================== CATEGORIES ====================

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


// ==================== PROFILE ====================

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');