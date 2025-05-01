<?php

namespace App\Http\Controllers;

use App\Http\Requests\filtreCovoiturageRequest;
use App\Mail\EcorideMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Covoiturage;
use App\Models\Modele;
use App\Http\Requests\itineraireRequest;
use Illuminate\Support\Facades\Auth;


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

    public function handleChoice(Request $request)
{
    $redirect = $request->input('login')
        ? route('login')
        : route('register');

    return response()->json(['redirect' => $redirect]);
}

public function reserver($numberPlace, Request $request)
{

    return response()->json([
        'success' => true,
        'redirect' => route('confirmation.page') // ou null
    ]);
}

public function itineraire(itineraireRequest $request)
    {
        // Crée un nouveau covoiturage avec les données du formulaire
        covoiturage::sreach([
            'départ' => $request->depart,
            'arrivé' => $request->arrive,
        ]);
    }

}