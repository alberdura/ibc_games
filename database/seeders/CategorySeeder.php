<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['nom' => 'Acción'],
            ['nom' => 'Aventura'],
            ['nom' => 'Deportes'],
            ['nom' => 'Estrategia'],
            ['nom' => 'Simulación'],
            ['nom' => 'Terror'],
            ['nom' => 'Puzzle'],
            ['nom' => 'Novela visual'],
            ['nom' => 'Indie'],
            ['nom' => 'Arcade'],
        ];

        DB::table('categories')->insert($categories);
    }
}
