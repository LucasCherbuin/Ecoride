<?php

namespace Database\Seeders;

use App\Models\Avis;
use App\Models\Conducteur;
use App\Models\Covoiturage;
use App\Models\Modele;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Avis::factory()->count(10)->create();
        Conducteur::factory()->count(10)->create();
        Covoiturage::factory()->count(10)->create();
        Modele::factory()->count(10)->create();
        User::factory()->count(10)->create();
    }
}
