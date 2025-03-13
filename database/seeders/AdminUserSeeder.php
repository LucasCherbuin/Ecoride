<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{

    public function run()
    {
        $adminRole = Role::where('label', 'ROLE_ADMIN')->first();

        User::updateOrCreate([
            'email' => 'admin@ecoride.com',
        ], [
            'pseudo' => 'Admin',
            'password' => Hash::make('motdepasse'), // Change le mot de passe
            'role_id' => $adminRole->id,
        ]);
    }
}
