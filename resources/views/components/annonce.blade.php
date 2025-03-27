@extends('base')

@section('content')
<div class="annonce">
    <div class="profile">
        <!-- Affichage des avis -->
        @foreach ($avis as $avisItem)
            <img src="{{ $avisitem->image ?? asset('assets/pictures/default.png') }}" alt="Profil">
            <p>{{ $avisItem->note }} ⭐ - {{ $avisItem->pseudo }}</p>
        @endforeach
    </div>

    <button type="button">Réserver <i class="ph ph-calendar-plus"></i></button>

    <!-- Affichage des informations de covoiturage -->
    @foreach ($covoiturages as $covoiturage)
    <div class="principal">
        <p>{{ $covoiturage->date }} à {{ $covoiturage->heure }}</p>
        <p>Trajet : {{ $covoiturage->depart }} → {{ $covoiturage->arrive }}</p>
    </div>

    <!-- Affichage des détails du modèle -->
        @foreach ($modeles as $modele)
        <div class="detail">
            <p>{{ $modele->prix }} € - {{ $modele->nombrePlaces }} places - Énergie : {{ $modele->energie }}</p>
        </div>
        <div class="accordion-detail">
            <!-- Plus de détails ici -->
        </div>
        @endforeach
    @endforeach

    <!-- Section des avis -->
    <div class="avis">
        <div class="Carousel-controls">
            <a class="carousel-control-prev" href="#avisCarousel" role="button" data-bs-slide="prev">
                <i class="ph ph-caret-left"></i>
            </a>
            <p>Avis</p>
            <a class="carousel-control-next" href="#avisCarousel" role="button" data-bs-slide="next">
                <i class="ph ph-caret-right"></i>
            </a>
        </div>

        <!-- Affichage des avis validés -->
        @foreach ($avis as $avisItem)
            @if ($avisItem->valid)
            <div class="card">
                <div class="card-body">
                    <p>{{ $avisItem->user->pseudo ?? 'Utilisateur inconnu' }}</p>
                    <p>{{ $avisItem->commentaire }}</p>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>
@endsection
