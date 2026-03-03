<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buscamos al usuario admin, si no existe lo creamos
        $admin = User::firstOrCreate(
            ['email' => 'admin@admin.com'], // Buscamos por email
            [
                'name' => 'Admin Inmo',
                'password' => bcrypt('password'), // Contraseña por defecto
            ]
        );

        // 2. Creamos 20 casas asociadas a este admin
        // (He subido a 20 para que el catálogo se vea más lleno)
        Property::factory(20)->create([
            'user_id' => $admin->id
        ]);
    }
}
