<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JocsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Nombres reales de juegos
        $games = [
            'The Last of Us',
            'Minecraft',
            'Grand Theft Auto V',
            'Fortnite',
            'Red Dead Redemption 2',
            'The Witcher 3: Wild Hunt',
            'Apex Legends',
            'Call of Duty: Warzone',
            'Cyberpunk 2077',
            'Assassin\'s Creed Valhalla',
            'Overwatch',
            'Rocket League',
            'Animal Crossing: New Horizons',
            'Hades',
            'Spider-Man: Miles Morales',
            'Doom Eternal',
            'League of Legends',
            'Valorant',
            'Among Us',
            'God of War',
            'FIFA 22',
            'Battlefield 2042',
            'Dark Souls III',
            'Monster Hunter: World',
            'Resident Evil Village'
        ];

        // Insertar los juegos en la base de datos
        foreach ($games as $game) {
            DB::table('jocs')->insert([
                'nom' => $game,  // Nombre del juego
                'category_id' => rand(1, 10),  // Asignar una categoría aleatoria entre 1 y 10
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
