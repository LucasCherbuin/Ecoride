<div class="annonce">
    <button type="button">Réserver <i class="ph ph-calendar-plus"></i></button>

    <!-- Affichage des informations de covoiturage -->
    <div class="principal">
        <p>{{ $date ?? 'Date non disponible' }} à {{ $heure ?? 'Heure non disponible' }}</p>
        <p>Trajet : {{ $depart ?? 'Départ inconnu' }} → {{ $arrive ?? 'Arrivée inconnue' }}</p>
    </div>

    <!-- Affichage des détails du modèle -->
    <div class="detail">
        <p>{{ $prix ?? 'Prix inconnu' }} € - {{ $nombrePlaces ?? '0' }} places - Énergie : {{ $energie ?? 'Non spécifiée' }}</p>
    </div>
    <div class="accordion-detail">
        <!-- Plus de détails ici -->
    </div>

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
        @if (!empty($avis))
            @foreach ($avis as $avisItem)
                @if ($avisItem['valid'])
                    <div class="card">
                        <div class="card-body">
                            <p>{{ $pseudo ?? 'Utilisateur inconnu' }}</p>
                            <p>{{ $avisItem['commentaire'] }}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <p>Aucun avis disponible.</p>
        @endif
    </div>
</div>
