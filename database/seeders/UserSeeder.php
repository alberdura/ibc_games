<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Asegúrate de que el modelo User esté correctamente importado

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Usuario de Prueba',
            'email' => 'prueba@example.com', // Correo de prueba
            'password' => Hash::make('password123'), // Contraseña segura
        ]);
    }
}
