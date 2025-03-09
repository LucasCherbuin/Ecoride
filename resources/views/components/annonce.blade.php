<script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
<div class="annonce">
    <div class="profile">
        {{ $image }} {{ $note }} {{ $pseudo }}
    </div>
    <button type="button"> réserver <i class="ph ph-calendar-plus"></i></button>

    <div class="principal">
        {{ $date }} {{ $heure }}
        <p>trajet</p>
        {{ $depart }} {{ $arrive }}
    </div>

    <div class="detail">
        {{ $prix }} {{ $nombrePlaces }} {{ $energieVerte }}
    </div>
    <div class="accordion-detail">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            <i class="ph ph-calendar-plus"></i>
        </button>

        <div class="preferences">
            <div class="permission">
                @if ($fumeur)
                    <i class="ph ph-cigarette"></i>
                @else
                    <i class="ph ph-cigarette-slash"></i>
                @endif

                @if ($animal)
                    <i class="ph ph-dog"></i>
                @else
                    <i class="ph ph-dog"></i>
                    <i class="ph ph-x"></i>
                @endif
            </div>

            <div class="plaque">
                <p>numéro de plaque</p>
                {{ $immatriculation }}
            </div>

            <div class="detail">
                <p>détail</p>
                {{ $detail }}
            </div>
        </div>

        <div class="Modele">
            <p>véhicule utilisé</p>
            <div class="informations">
                <p>Marque</p>
                {{ $marque }}

                <p>Modèle</p>
                {{ $modele }}

                <p>Couleur</p>
                {{ $couleur }}

                <p>Energie</p>
                {{ $energie }}
            </div>
        </div>

        <div class="avis">
            <div class="Carousel-controls">
                <a class="carousel-control-prev" href="#avisCarousel" role="button" data-bs-slide="prev">
                    <i class="ph ph-caret-left"></i>
                </a>
                <p>avis</p>
                <a class="carousel-control-next" href="#avisCarousel" role="button" data-bs-slide="next">
                    <i class="ph ph-caret-right"></i>
                </a>
            </div>

            @foreach ($avis as $unAvis)
                <div class="card">
                    <div class="card-body">
                        @if ($unAvis->valid)
                            {{ $unAvis->user->image }}
                            {{ $unAvis->user->pseudo }}
                            {{ $unAvis->commentaire }}
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
