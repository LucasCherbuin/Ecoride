<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avis;
class ValidationController
{
     /**
     * Afficher les avis en attente de validation.
     */
    public function index()
    {
        $avis = Avis::where('status', 'pending')->get();
        return view('reviews.index', compact('reviews'));
    }

    /**
     * Valider un avis.
     */
    public function validateAvis($id)
    {
        $avis = Avis::findOrFail($id);
        $avis->status = 'approved';
        $avis->save();

        return redirect()->back()->with('success', 'Avis validé avec succès.');
    }

    /**
     * Rejeter un avis.
     */
    public function rejectAvis($id)
    {
        $review = Avis::findOrFail($id);
        $review->status = 'rejected';
        $review->save();

        return redirect()->back()->with('error', 'Avis rejeté.');
    }
}
