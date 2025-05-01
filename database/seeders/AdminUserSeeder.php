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
        $adminRole = Role::where('label', 'ROLE_CONDUCTEUR')->first();

        User::updateOrCreate([
            'email' => 'conducteur@ecoride.com',
        ], [
            'pseudo' => 'rené',
            'password' => Hash::make('conducteur'),
            'role_id' => $adminRole->id,
        ]);
    }
}
