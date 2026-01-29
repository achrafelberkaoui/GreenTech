<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produits')->insert([
            [
                'name' => 'Rose',
                'description' => 'Plante décorative',
                'price' => 25.50,
                'category_id' => 1,
            ],
            [
                'name' => 'Tomate',
                'description' => 'Graines de tomate',
                'price' => 10.00,
                'category_id' => 2, 
            ],
            [
                'name' => 'Pelle',
                'description' => 'Outil de jardinage',
                'price' => 80.00,
                'category_id' => 3,
            ]
        ]);
    }
}
