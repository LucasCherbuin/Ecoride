<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Ramsey\Uuid\Type\Time;

class preferenceSeeder extends Seeder
{
    public function run()
    {
        $user = User::where('id', '1')->first();

        DB::table('covoiturage')->insert([
            'id' => 1,
            'depart' => 'bordeau',
            'arrivee' => 'marseille',
            'date' =>  Carbon::now(),
            'heure' => '08:30:00',
            'prix' => 3,
            'Ecologique' => 0,
            'user_id' => $user->id,


        ]);

    }
}

