<?php

namespace App\Http\Controllers;

use App\Http\Requests\filtreCovoiturageRequest;
use Illuminate\Http\Request;
use App\Models\Covoiturage;

class RechercheCovoiturageController extends Controller
{
    public function filtre(filtreCovoiturageRequest $request)
    {
        // Initialisation de la requête de filtrage
        $query = Covoiturage::query();

        // Filtrer par énergie
        if ($request->filled('energie')) {
            $query->where('energie', $request->energie);
        }

        // Filtrer par prix
        if ($request->filled('prix_min') && $request->filled('prix_max')) {
            $query->whereBetween('prix', [$request->prix_min, $request->prix_max]);
        }

        // Filtrer par durée
        if ($request->filled('duree')) {
            $query->where('duree', '>=', $request->duree);
        }

        // Filtrer par note
        if ($request->filled('note_min') && $request->filled('note_max')) {
            $query->whereBetween('note', [$request->note_min, $request->note_max]);
        }

        // Appliquer la pagination
        $recherches = $query->paginate(10);

        // Retourner la vue avec les résultats
        return view('recherches.resultat', compact('recherches'));
    }
}

