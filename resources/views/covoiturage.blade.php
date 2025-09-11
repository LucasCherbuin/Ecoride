@extends('base')

@section('content')
<link href="{{ asset('assets/css/form.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/annonce.css') }}" rel="stylesheet">

<div>
    <div>
        <!-- Formulaire de recherche -->
        <form class="custom-form" wire:submit.prevent="search">
            <h2>Choix de l'itinéraire</h2>
            <input type="text" class="form-input" wire:model="title" placeholder="Départ">
            <input type="text" class="form-input" wire:model="content" placeholder="Arrivée">
            <button type="submit" class="form-button">Rechercher</button>
        </form>

        <!-- Filtre -->
        <div id="filtreCovoiturage">
            <button class="filtre-button" wire:click="filterSelection('energie')">
                énergie<br> propre <br><i class="ph ph-leaf"></i>
            </button>
            <form>
                <label class="filtre-button">
                    Prix max
                    <input type="text" wire:model="prix" placeholder="5$">
                </label>
                <label class="filtre-button">
                    Durée max
                    <input type="time" wire:model="duree" placeholder="3h">
                </label>
                <label class="filtre-button">
                    Note
                    <input type="text" wire:model="note" placeholder="3 ⭐">
                </label>
            </form>
        </div>

<div>
    <!-- Affichage des résultats -->
    <div>
        @if(!empty($covoiturages) && count($covoiturages) > 0)
            @foreach ($covoiturages as $covoiturage)
                <x-annonce
                    :image="$covoiturage->image"
                    :note="$covoiturage->note"
                    :pseudo="$covoiturage->pseudo"
                    :date="$covoiturage->date"
                    :heure="$covoiturage->heure"
                    :depart="$covoiturage->depart"
                    :arrive="$covoiturage->arrive"
                    :prix="$covoiturage->prix"
                    :nombrePlaces="$covoiturage->nombrePlaces"
                    :energieVerte="$covoiturage->energieVerte"
                    :fumeur="$covoiturage->fumeur"
                    :animal="$covoiturage->animal"
                    :immatriculation="$covoiturage->immatriculation"
                    :detail="$covoiturage->detail"
                    :marque="$covoiturage->marque"
                    :modele="$covoiturage->modele"
                    :energie="$covoiturage->energie"
                    :avis="$covoiturage->avis"
                />
            @endforeach
        @else
            <p>Aucune annonce trouvée.</p>
        @endif
    </div>
</div>


    </div>

@endsection


