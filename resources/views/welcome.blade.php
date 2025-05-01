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
        <form method="GET" action="{{ route('covoiturage.search') }}">
            @csrf
            <div class="form-group">
                <label for="depart">Départ</label>
                <input type="text" name="depart" id="depart" class="form-input" value="{{ old('depart') }}" placeholder="Entrez votre départ">
                @error('depart')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="arrive">Arrivée</label>
                <input type="text" name="arrive" id="arrive" class="form-input" value="{{ old('arrive') }}" placeholder="Entrez votre arrivée">
                @error('arrive')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Rechercher</button>
        </form>

    </div>




@endsection


