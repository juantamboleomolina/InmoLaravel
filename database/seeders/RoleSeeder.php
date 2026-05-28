<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Creamos los roles si no existen
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // 2. Buscamos específicamente a juan@admin.es y le damos el rol
        $admin = User::where('email', 'juan@admin.es')->first();
        if ($admin) {
            $admin->assignRole('admin');
        }
    }
}
