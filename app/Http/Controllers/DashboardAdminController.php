<?php

namespace App\Http\Controllers;

use App\Models\Covoiturage;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CovoiturageDonnees;
use Carbon\Carbon;

class DashboardAdminController
{

    public function dashboard()
{
    $view1 = view('get-covoiturage-stats')->render();
    $view2 = view('get-credit-stats')->render();

    return response()->json([
        'covoiturage' => $view1,
        'credit' => $view2
    ]);
}

    //stockage donnée en NoSql
    public function covoiturage(Request $request)
    {
        $covoiturage = Covoiturage::create([
            'covoiturage' => $request->covoiturage,
            'en_cours' => $request->covoiturage->id,
            'date_depart' => Carbon::now() //stock date départ
        ]);


        //Compteur de covoiturage par jour
        $today = Carbon::today()->toDateString();

        CovoiturageDonnees::evolution(
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
        $covoiturage = Covoiturage::create([
            'Credit' => $request->user->credit,
            'prix' => $request->covoiturage->prix,
            'termine' => $request->covoiturage->id,
            'annule' => $request->covoiturage->id,
            'date_depart' => Carbon::now()
        ]);

        $user = User::create([
            'Credit' => $request->user->credit,
        ]);



        $today = Carbon::today()->toDateString();

        CovoiturageDonnees::evolution(
            ['date' => $today],
            ['$inc' => ['total' => 1]]
        );
    }

    public function getCreditStats()
    {
        $stats = CovoiturageDonnees::orderBy('date', 'asc')->get();

        return response()->json($stats);
    }

}
