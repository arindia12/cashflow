<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');

Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');

Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

Route::get('/transactions/{transaction}', [TransactionController::class, 'show'])->name('transactions.show');

Route::get('/transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');

Route::put('/transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');

Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
