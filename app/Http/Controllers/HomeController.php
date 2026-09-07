<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
 {
    $income = Transaction::where('type', 'income')->sum('amount');

    $expense = Transaction::where('type', 'expense')->sum('amount');

    $balance = $income - $expense;

    $latestTransactions = Transaction::latest('date')->take(5)->get();

    $months = [];
    $incomeData = [];
    $expenseData = [];

    for ($i = 5; $i >= 0; $i--) {

        $date = now()->subMonths($i);

        $months[] = $date->format('M');

        $incomeData[] = Transaction::where('type', 'income')
            ->whereYear('date', $date->year)
            ->whereMonth('date', $date->month)
            ->sum('amount');

        $expenseData[] = Transaction::where('type', 'expense')
            ->whereYear('date', $date->year)
            ->whereMonth('date', $date->month)
            ->sum('amount');
    }

    return view('home', compact(
        'income',
        'expense',
        'balance',
        'months',
        'incomeData',
        'expenseData',
        'latestTransactions'
    ));

 }
}