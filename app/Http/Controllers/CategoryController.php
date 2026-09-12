<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
        ]);

        Category::create([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Data kategori berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $category = Category::findOrFail(decrypt($id));

        return view('categories.show', compact('category'));
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail(decrypt($id));

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail(decrypt($id));

        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
        ]);

        $category->update([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Data kategori berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail(decrypt($id));

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Data kategori berhasil dihapus.');
    }
}