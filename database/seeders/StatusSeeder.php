<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    public function run()
    {
        DB::table('status')->insert([
            ['label' => 'en prevision'],
            ['label' => 'en cours'],
            ['label' => 'annule'],
            ['label' => 'termine'],
        ]);
    }
}

