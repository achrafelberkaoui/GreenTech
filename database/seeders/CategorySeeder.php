<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert(
            [
                ['name' => 'Plantes', 'parent_id'=>null],
                ['name' => 'Graines', 'parent_id'=>null],
                ['name' => 'Outils', 'parent_id'=>null],

                // sous-category
                ['name' => 'Plantes interieur', 'parent_id'=> 1],
                ['name' => 'Grains bio', 'parent_id'=> 2],
                ['name' => 'outils out', 'parent_id'=> 3],
            ]
        );
    }
}
