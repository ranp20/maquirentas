<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            // Cada categoría tendrá entre 1 y 3 items aleatorios
            for ($i = 0; $i < rand(1, 3); $i++) {
                Item::create([
                    'sku' => strtoupper(Str::random(8)),
                    'brand' => fake()->company(),
                    'year' => fake()->year(),
                    'capacity' => rand(100, 5000),
                    'price_FOB' => fake()->randomFloat(2, 1000, 30000),
                    'price_CIF' => fake()->randomFloat(2, 1200, 35000),
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
