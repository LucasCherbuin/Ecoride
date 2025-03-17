<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Covoiturage;
use Illuminate\Http\Request;

class startRideController
{
    public function begin($id)
    {
        $covoiturage = Covoiturage::find($id);

       if (!$covoiturage->status->label == 'en prévision') {
            $nouveauStatus = Status::where('label', 'en cours')->first();
       } elseif ($covoiturage->status->label == 'en cours') {
            $nouveauStatus = Status::where('label', 'terminé')->first();
       } else {
            return response()->json(['message' => 'Action non autorisée'], 400);
       }

       if ($nouveauStatus) {
            $covoiturage->status_id = $nouveauStatus->id;
            $covoiturage->save();
       }

    }
}
