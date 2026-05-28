<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        // Creamos a TU usuario administrador específico
        $admin = User::factory()->create([
            'name' => 'Juan Admin',
            'email' => 'juan@admin.es',
            'password' => bcrypt('12345678'),
        ]);

        // Creamos las casas asociadas a ti
        Property::factory(10)->create([
            'user_id' => $admin->id
        ]);
    }
}
