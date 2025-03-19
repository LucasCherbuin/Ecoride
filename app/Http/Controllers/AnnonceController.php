<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Covoiturage;
use App\Models\Avis;

class AnnonceController extends Controller
{
    public function index()
    {
        // Récupérer les annonces avec les relations user et avis
        $covoiturages = Covoiturage::with(['user', 'avis'])->get();
        $avis = Avis::all();

        return view('annonces.index', compact('covoiturages', 'avis'));
    }
}
