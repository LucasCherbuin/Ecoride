<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Covoiturage;
use Illuminate\Http\Request;

class CovoiturageController extends Controller
{
    public function index()
    {
        // Récupérer les annonces depuis la base de données
        $covoiturages = Covoiturage::with('avis')->get(); // Assurez-vous que le modèle Covoiturage a une relation 'avis'

        // Passer la variable $covoiturages à la vue
        return view('covoiturage.index', compact('covoiturages'));
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'immatriculation' => 'required|string|max:7',
            'energie' => 'required|string|max:10',
            'DateImmatriculation' => 'required|date',
            'nb_place' => 'required|integer|min:1|max:10'
        ]);

        $covoiturage = Covoiturage::create($validatedData);

        return response()->json($covoiturage, 201);
    }

    public function show($id)
    {
        $covoiturage = Covoiturage::find($id);

        if (!$covoiturage) {
            return response()->json(['message' => 'Covoiturage non trouvé'], 404);
        }

        return response()->json($covoiturage);
    }

    public function update(Request $request, $id)
    {
        $covoiturage = Covoiturage::find($id);

        if (!$covoiturage) {
            return response()->json(['message' => 'Covoiturage non trouvé'], 404);
        }

        $validatedData = $request->validate([
            'immatriculation' => 'sometimes|string|max:7',
            'energie' => 'sometimes|string|max:10',
            'DateImmatriculation' => 'sometimes|date',
            'nb_place' => 'sometimes|integer|min:1|max:10'
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
