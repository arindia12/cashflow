<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::latest()->get();

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('transactions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:income,expense',
            'date' => 'required|date',
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0',
        ]);

        Transaction::create([
            'category_id' => $request->category_id,
            'type' => $request->type,
            'date' => $request->date,
            'description' => $request->description,
            'amount' => $request->amount,
        ]);

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Data transaksi berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $transaction = Transaction::findOrFail(decrypt($id));

        return view('transactions.show', compact('transaction'));
    }

    public function edit(string $id)
    {
        $transaction = Transaction::findOrFail(decrypt($id));
        $categories = Category::all();

        return view('transactions.edit', compact('transaction', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $transaction = Transaction::findOrFail(decrypt($id));

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:income,expense',
            'date' => 'required|date',
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0',
        ]);

        $transaction->update([
            'category_id' => $request->category_id,
            'type' => $request->type,
            'date' => $request->date,
            'description' => $request->description,
            'amount' => $request->amount,
        ]);

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Data transaksi berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $transaction = Transaction::findOrFail(decrypt($id));

        $transaction->delete();

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Data transaksi berhasil dihapus.');
    }
}