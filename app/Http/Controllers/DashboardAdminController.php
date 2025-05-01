<?php

namespace App\Http\Controllers;

use App\Models\Covoiturage;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CovoiturageDonnees;
use App\Models\CreditGagneDonnees;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{

     // Incrémenter le nombre de covoiturages par jour (NoSQL)

    public function covoiturage(Request $request)
    {
        $date = now()->toDateString();

        $stat = CovoiturageDonnees::firstOrCreate(
            ['date' => $date],
            ['nb_covoiturages' => 0]
        );

        $stat->increment('nb_covoiturages');
    }


     // taxe Création d’une annonce → -2 crédits

    public function covoiturageCreation(Request $request)
    {
        $user = $request->user();

        if ($user->credit >= 2) {
            $user->decrement('credit', 2);

            Covoiturage::create([
                'status_id' => 'en prévision', // statut par défaut
            ]);
        }
    }


     //Annulation → remboursement

    public function covoiturageAnnulation(Covoiturage $covoiturage, Request $request)
    {
        $user = $request->user();

        if ($covoiturage->status->label !== 'annule') {
            $user->increment('credit', 2);

            $covoiturage->update([
                'status_id' => 'annule', // statut "annulé"
            ]);

        }
    }

    /**
     * ➕ Mise à jour des crédits gagnés quotidiennement (NoSQL)
     */
    public function credit(Request $request)
    {
        $date = now()->toDateString();

        $gain = CreditGagneDonnees::firstOrCreate(
            ['date' => $date],
            ['creditGagne_donnees' => 0]
        );

        $gain->increment('creditGagne_donnees');
    }


     // Dashboard Vue

    public function dashboard()
    {
        $view1 = view('admin.dashboard.get-covoiturage-stats')->render();
        $view2 = view('admin.dashboard.get-credit-stats')->render();

        return response()->json([
            'covoiturage' => $view1,
            'credit' => $view2,
        ]);
    }
}
