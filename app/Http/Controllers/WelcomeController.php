<?php

namespace App\Http\Controllers;

use App\Http\Requests\itineraireRequest;
use App\Models\covoiturage;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function itineraire(itineraireRequest $request)
    {
        covoiturage::create([
            'départ' => $request->depart,
            'arrivé' => $request->arrive,
        ]);
    }
}
