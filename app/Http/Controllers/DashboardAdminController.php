<?php

namespace App\Http\Controllers;

use App\Models\Covoiturage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CovoiturageDonnees;
use Carbon\Carbon;

class DashboardAdminController
{

    public function dashboard()
    {
        $view1 = view('admin.dashboard.get-covoiturage-stats')->render();
        $view2 = view('admin.dashboard.get-credit-stats')->render();

        return response()->json([
            'covoiturage' => $view1,
            'credit' => $view2
        ]);
    }


    //stockage donnée en NoSql
    public function covoiturage(Request $request)
{
    $request->validate([
        'covoiturage_id' => 'required|integer',
    ]);

    $covoiturage = Covoiturage::create([
        'covoiturage' => $request->covoiturage_id,
        'en_cours' => $request->covoiturage_id,
        'date_depart' => Carbon::now(),
    ]);

    // Compteur de covoiturage par jour
    $today = Carbon::today()->toDateString();

    CovoiturageDonnees::updateOrCreate(
        ['date' => $today],
        ['$inc' => ['total' => 1]]
    );
}



    public function getCovoiturageStats()
    {
        $stats = CovoiturageDonnees::orderBy('date', 'asc')->get();

        return response()->json($stats);
    }


public function credit(Request $request)
{
    $user = Auth::user(); // Récupérer l'utilisateur connecté

    if (!$user) {
        return response()->json(['error' => 'Utilisateur non authentifié'], 401);
    }

    $request->validate([
        'covoiturage_id' => 'required|integer',
        'prix' => 'required|numeric',
    ]);

    // Enregistrement du crédit dans le covoiturage
    $covoiturage = Covoiturage::create([
        'Credit' => $user->credit,
        'prix' => $request->prix,
        'termine' => $request->covoiturage_id,
        'annule' => $request->covoiturage_id,
        'date_depart' => Carbon::now(),
    ]);

    // Mise à jour des statistiques NoSQL
    $today = Carbon::today()->toDateString();

    CovoiturageDonnees::updateOrCreate(
        ['date' => $today],
        ['$inc' => ['total' => 1]]
    );
}

}
