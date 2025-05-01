<?php

namespace App\Http\Controllers;

use App\Models\Covoiturage;
use Illuminate\Http\Request;

class StatusController
{
    public function updateStatus(Request $request, $id)
    {
        $covoiturage = Covoiturage::find($id);

        if (!$covoiturage) {
            return response()->json(['message' => 'Covoiturage non trouvé'], 404);
        }

        $validated = $request->validate([
            'status' => 'required'
        ]);

        $covoiturage->update(['status' => $validated['status']]);

        return response()->json([
            'message' => 'Status mis à jour avec succès',
            'covoiturage' => $covoiturage,
        ]);
    }
}
