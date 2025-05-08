<?php

// Déclare l’espace de nom (namespace) du contrôleur
namespace App\Http\Controllers;

// Importation des modèles nécessaires
use App\Models\Status;         // Modèle pour les statuts de covoiturage (prévision, en cours, terminé...)
use App\Models\Covoiturage;    // Modèle principal du trajet
use Illuminate\Support\Facades\Mail; // Facade Laravel pour envoyer des e-mails
use App\Mail\EcorideMail;      // Classe de mail personnalisée que tu as créée

// Définition du contrôleur qui hérite de la classe de base Controller
class StartRideController extends Controller
{
    // Méthode pour faire évoluer le statut du covoiturage
    public function begin($id)
    {
        // On récupère le covoiturage par son ID avec sa relation "status"
        $covoiturage = Covoiturage::with('status')->findOrFail($id);

        try {
            if ($covoiturage->status->label === 'en prévision') {
                $nouveauStatus = Status::where('label', 'en cours')->first();
            } elseif ($covoiturage->status->label === 'en cours') {
                $nouveauStatus = Status::where('label', 'termine')->first();
                $this->sendAvisMail($covoiturage);
            } else {
                return response()->json(['message' => 'Statut non modifiable.'], 400);
            }

            if ($nouveauStatus) {
                $covoiturage->status_id = $nouveauStatus->id;
                $covoiturage->save();
            }

            return response()->json(['message' => 'Statut mis à jour.']);
        }
        catch (\Exception $e) {
            return response()->json([
                'message' => 'Une erreur est survenue.',
                'error' => $e->getMessage()
            ], 500);
        }

    }

    // Fonction qui envoie un e-mail à chaque passager lorsque le trajet est terminé
    protected function sendAvisMail(Covoiturage $covoiturage)
    {
        // On suppose que le modèle Covoiturage a une relation "passagers"
        $passagers = $covoiturage->passagers;

        // Pour chaque passager, on envoie un mail personnalisé
        foreach ($passagers as $passager) {
            Mail::to($passager->email)->send(new EcorideMail($covoiturage));
        }
    }
}
