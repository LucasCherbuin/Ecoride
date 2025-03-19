<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Annonce extends Component
{
    public $depart;
    public $arrive;
    public $date;
    public $heure;
    public $ecologique;
    public $creation;
    public $image;
    public $note;
    public $pseudo;
    public $prix;
    public $nombrePlaces;
    public $fumeur;
    public $animal;
    public $immatriculation;
    public $detail;
    public $marque;
    public $modele;
    public $couleur;
    public $energie;
    public $avis;


    public function __construct(
        $depart, $arrive, $date, $heure, $ecologique, $creation,
        $image, $note, $pseudo, $prix, $nombrePlaces, $fumeur,
        $animal, $immatriculation, $detail, $marque, $modele,
        $couleur, $energie, $avis
    ) {
        $this->depart = $depart;
        $this->arrive = $arrive;
        $this->date = $date;
        $this->heure = $heure;
        $this->ecologique = $ecologique;
        $this->creation = $creation;
        $this->image = $image;
        $this->note = $note;
        $this->pseudo = $pseudo;
        $this->prix = $prix;
        $this->nombrePlaces = $nombrePlaces;
        $this->fumeur = $fumeur;
        $this->animal = $animal;
        $this->immatriculation = $immatriculation;
        $this->detail = $detail;
        $this->marque = $marque;
        $this->modele = $modele;
        $this->couleur = $couleur;
        $this->energie = $energie;
        $this->avis = $avis;
    }

    public function render()
    {
        return view('components.annonce');
    }
}
