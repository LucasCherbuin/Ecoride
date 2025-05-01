<?php

namespace App\Http\Controllers;

use App\Http\Requests\itineraireRequest;
use App\Models\covoiturage;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function itineraire(itineraireRequest $request)
    {
        covoiturage::sreach([
            'départ' => $request->depart,
            'arrivé' => $request->arrive,
        ]);

        // Redirige vers la page covoiturage avec les paramètres de recherche
        return redirect()->route('covoiturage', [
            'depart' => $request->depart,
            'arrive' => $request->arrive
        ]);
    }
}

