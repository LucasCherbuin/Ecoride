<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Covoiturage;
use App\Models\Avis;
use App\Models\Modele;

class AnnonceController extends Controller
{
    public function show()
    {
        // Récupérer les avis, covoiturages et modèles depuis la base de données
        $avis = Avis::all();  // Récupère tous les avis
        $covoiturages = Covoiturage::all();  // Récupère tous les covoiturages
        $modeles = Modele::all();  // Récupère tous les modèles

        // Passer les données à la vue
        return view('components.annonce', compact('avis', 'covoiturages', 'modeles'));
    }
}
