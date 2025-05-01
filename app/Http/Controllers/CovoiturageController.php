<?php

namespace App\Http\Controllers;

use App\Http\Requests\CovoiturageRequest;
use App\Models\Covoiturage;
use App\Models\Modele;
use App\Models\Avis;
use Illuminate\Http\Request;

class CovoiturageController extends Controller
{
    public function index()
    {
        // Récupération de tous les covoiturages avec leurs modèles associés
        $covoiturages = Covoiturage::with('modeles')->get();
        return view('covoiturage.index', compact('covoiturages'));
    }

    public function store(CovoiturageRequest $request)
    {
        // Création du covoiturage
        $preparedcovoiturage = Covoiturage::create([
            'depart' => $request->depart,
            'arrive' => $request->arrive,
            'heure' => $request->heure,
            'EnergieVerte' => $request->EnergieVerte ?? false,
        ]);

        // Vérifier si un véhicule doit être ajouté
        if ($request->filled(['modele', 'marque', 'couleur', 'nombre_places', 'energie'])) {
            $preparedmodele = Modele::create([
                'modele' => $request->modele,
                'marque' => $request->marque,
                'couleur' => $request->couleur,
                'nombre_places' => $request->nombre_places,
                'energie' => $request->energie,
            ]);

            // Associer le véhicule au covoiturage si une relation existe
            if (method_exists($preparedcovoiturage, 'modeles')) {
                $preparedcovoiturage->modeles()->attach($preparedmodele->id);
            }
        }

        return redirect()->route('covoiturage.index')->with('success', 'Covoiturage enregistré avec succès.');
    }

    public function show($id)
    {
        $covoiturage = Covoiturage::with('modeles')->find($id);

        if (!$covoiturage) {
            return response()->json(['message' => 'Covoiturage non trouvé'], 404);
        }

        $avis = Avis::where('covoiturages', $id)->get();
        $modeles = $covoiturage->modeles ?? collect();

        return view('components.annonce', compact('covoiturage', 'avis', 'modeles'));
    }



    public function update(Request $request, $id)
    {
        $covoiturage = Covoiturage::find($id);

        if (!$covoiturage) {
            return response()->json(['message' => 'Covoiturage non trouvé'], 404);
        }

        $validatedData = $request->validate([
            'depart' => 'sometimes|string',
            'arrive' => 'sometimes|string',
            'heure' => 'sometimes',
            'Ecologique' => 'sometimes|boolean',
        ]);

        $covoiturage->update($validatedData);

        return response()->json($covoiturage);
    }

    public function destroy($id)
    {
        $covoiturage = Covoiturage::find($id);

        if (!$covoiturage) {
            return response()->json(['message' => 'Covoiturage non trouvé'], 404);
        }

        $covoiturage->delete();

        return response()->json(['message' => 'Covoiturage supprimé avec succès']);
    }
}
