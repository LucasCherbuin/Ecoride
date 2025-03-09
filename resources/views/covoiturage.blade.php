

@livewireStyles
@extends('base')
@extends('layouts.app')
@section('content')
<link href="{{ asset('assets/css/form.css') }}" rel="stylesheet">

<link href="/build/assets/app.css" rel="stylesheet">

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
            <button class="filtre-button" wire:click="filterSelection('ecologique')">Filtre écologique <i class="ph ph-leaf"></i> </button>
            <button class="filtre-button" wire:click="filterSelection('prix_max')">Prix max</button>
            <button class="filtre-button" wire:click="filterSelection('duree_max')">Durée max</button>
            <button class="filtre-button" wire:click="filterSelection('note')">Note</button>
        </div>
    </div>

    <!-- Affichage des résultats -->
    <div>
        <h1>résultat<h1>
            <livewire.recherche-covoiturage />
    </div>
</div>
@livewireScripts
@endsection


