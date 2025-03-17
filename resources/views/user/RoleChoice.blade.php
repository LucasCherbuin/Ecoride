@extends('base')

@section('content')
<form action="{{ route('choisir.role') }}" method="POST">
    @csrf
    <label>
        <input type="checkbox" name="role[]" value="passager"> Passager
    </label>
    <label>
        <input type="checkbox" name="role[]" value="conducteur" id="conducteur-checkbox"> Conducteur
    </label>

    <div id="conducteur-fields" style="display: none;">
        <label>Véhicule :</label>
        <input type="text" name="vehicule">

        <label>Immatriculation :</label>
        <input type="text" name="immatriculation">

        <label>Places disponibles :</label>
        <input type="number" name="places_disponibles" min="1" max="8">

        <label>Préférences :</label>
        <textarea name="preferences"></textarea>
    </div>

    <button type="submit">Enregistrer</button>
</form>

<script>
document.getElementById('conducteur-checkbox').addEventListener('change', function() {
    document.getElementById('conducteur-fields').style.display = this.checked ? 'block' : 'none';
});
</script>
