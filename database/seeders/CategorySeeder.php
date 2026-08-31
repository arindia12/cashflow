<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Penjualan',
            'type' => 'income',
        ]);

        Category::create([
            'name' => 'Pendapatan Lainnya',
            'type' => 'income',
        ]);

        Category::create([
            'name' => 'Makanan',
            'type' => 'expense',
        ]);

        Category::create([
            'name' => 'Transportasi',
            'type' => 'expense',
        ]);

        Category::create([
            'name' => 'Perlengkapan',
            'type' => 'expense',
        ]);

        Category::create([
            'name' => 'Listrik',
            'type' => 'expense',
        ]);

        Category::create([
            'name' => 'Lainnya',
            'type' => 'expense',
        ]);
    }
}
