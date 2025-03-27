<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    public function run()
    {
        // Insère des rôles dans la table 'roles'
        DB::table('roles')->insert([
            ['label' => 'ROLE_ADMIN'],
            ['label' => 'ROLE_EMPLOYE'],
            ['label' => 'ROLE_USER'],
            ['label' => 'ROLE_CONDUCTEUR'],
            ['label' => 'ROLE_PASSAGER'],
            ['label' => 'ROLE_CHAUFFEURPASSAGER'],
        ]);
    }
}

