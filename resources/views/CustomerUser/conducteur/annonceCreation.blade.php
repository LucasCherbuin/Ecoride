@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Créer un Covoiturage</h2>

        {{-- Affichage des messages de succès --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Affichage des erreurs de validation --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulaire --}}
        <form action="{{ route('covoiturage.store') }}" method="POST">
            @csrf {{-- Protection CSRF obligatoire --}}

            {{-- Voyage --}}
            <div class="mb-3">
                <label for="depart" class="form-label">Départ :</label>
                <input type="text" name="depart" id="depart" class="form-control" value="{{ old('depart') }}" required>
            </div>

            <div class="mb-3">
                <label for="arrive" class="form-label">Arrivée :</label>
                <input type="text" name="arrive" id="arrive" class="form-control" value="{{ old('arrive') }}" required>
            </div>

            <div class="mb-3">
                <label for="heure" class="form-label">Heure :</label>
                <input type="time" name="heure" id="heure" class="form-control" value="{{ old('heure') }}" required>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" name="EnergieVerte" id="EnergieVerte" class="form-check-input" {{ old('EnergieVerte') ? 'checked' : '' }}>
                <label class="form-check-label" for="EnergieVerte">Utilisation d’énergie verte</label>
            </div>

            {{-- Choix du véhicule --}}
            <div class="mb-3">
                <label for="modeles" class="form-label">Modèle de véhicule :</label>
                <select name="modeles[]" id="modeles" class="form-control" multiple required>
                    <option value="">Sélectionnez un modèle</option>
                    @foreach ($modeles as $modele)
                        <option value="{{ $modele->id }}" {{ in_array($modele->id, old('modeles', [])) ? 'selected' : '' }}>
                            {{ $modele->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Ajout d'un véhicule (optionnel) --}}
            <h4>Ajouter un véhicule</h4>

            <div class="mb-3">
                <label for="modele" class="form-label">Modèle :</label>
                <input type="text" name="modele" id="modele" class="form-control" value="{{ old('modele') }}">
            </div>

            <div class="mb-3">
                <label for="marque" class="form-label">Marque :</label>
                <input type="text" name="marque" id="marque" class="form-control" value="{{ old('marque') }}">
            </div>

            <div class="mb-3">
                <label for="couleur" class="form-label">Couleur :</label>
                <input type="text" name="couleur" id="couleur" class="form-control" value="{{ old('couleur') }}">
            </div>

            <div class="mb-3">
                <label for="nombre_places" class="form-label">Nombre de places :</label>
                <input type="number" name="nombre_places" id="nombre_places" class="form-control" value="{{ old('nombre_places') }}">
            </div>

            <div class="mb-3">
                <label for="energie" class="form-label">Énergie :</label>
                <input type="text" name="energie" id="energie" class="form-control" value="{{ old('energie') }}">
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection
