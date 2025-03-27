<link href="{{ asset('assets/css/welcome.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/form.css') }}" rel="stylesheet">

@extends('base')
@section('content')

    <p>Voyagez sans culpabilité grâce à nos services de <br> covoiturage vous permettant de choisir vos <br>préférences.</p>

    <div class="accueil">
        <img src="{{ asset('pictures/image1.png') }}" alt="Paysage" class="image-box">
        <img src="{{ asset('pictures/image2.png') }}" alt="Électrique" class="image-box">
        <img src="{{ asset('pictures/image3.png') }}" alt="Voyageurs" class="image-box">
    </div>

    <div class="recherche">
        <form class="custom-form" wire:submit.prevent="save">
            <h2>Choix de l'itinéraire</h2>
            <input type="text" class="form-input" wire:model="title" placeholder="Départ">

            <input type="text" class="form-input" wire:model="content" placeholder="Arrivée">

            <button type="submit" class="form-button">Rechercher</button>
        </form>
    </div>


@endsection


