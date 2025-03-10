<?php

namespace App\Http\Controllers;

use App\Http\Requests\filtreCovoiturageRequest;
use Illuminate\Http\Request;
use App\Models\Covoiturage;

class RechercheCovoiturageController extends Controller
{
    public function filtre(Request $request)
    {
        // Initialisation de la requête de filtrage
        $query = Covoiturage::query();

        // Appliquer les filtres
        if ($request->filled('energie')) {
            $query->where('energie', $request->energie);
        }

        if ($request->filled('prix_min') && $request->filled('prix_max')) {
            $query->whereBetween('prix', [$request->prix_min, $request->prix_max]);
        }

        if ($request->filled('duree')) {
            $query->where('duree', '>=', $request->duree);
        }

        if ($request->filled('note_min') && $request->filled('note_max')) {
            $query->whereBetween('note', [$request->note_min, $request->note_max]);
        }

        // Appliquer la recherche de base (si l'utilisateur a cherché un lieu de départ ou d'arrivée)
        if ($request->filled('title')) {
            $query->where('depart', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('content')) {
            $query->where('arrive', 'like', '%' . $request->content . '%');
        }

        // Trier les résultats
        if ($request->filled('sort_by')) {
            $sortColumn = $request->sort_by;
            $query->orderBy($sortColumn, $request->get('sort_direction', 'asc'));
        }

        // Récupérer les résultats filtrés
        $covoiturages = $query->paginate(10);

        // Retourner la vue avec les résultats
        return view('covoiturage', compact('covoiturages'));
    }
}
