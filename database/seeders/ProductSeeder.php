<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Advan vx lite',
            'price' => 2000000,
            'stock' => 3,
            'description' => 'deskripsi'

        ]);

        Product::create([
            'name' => 'Samsing A14 ',
            'price' => 2600000,
            'stock' => 10,
            'description' => 'deskripsi'

        ]);
    }
}
