<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->create([
            
                'name' => 'Rose',
                'description' => 'Plante décorative',
                'price' => 25.50,
                'category_id' => 1,
            ]);
            Product::factory()->create([
            
                'name' => 'Tomate',
                'description' => 'Graines de tomate',
                'price' => 10.00,
                'category_id' => 2, 
            ]);
            Product::factory()->create([
                'name' => 'Pelle',
                'description' => 'Outil de jardinage',
                'price' => 80.00,
                'category_id' => 3,
            ]);
               Product::factory()->count(10)->create();
    }
}
