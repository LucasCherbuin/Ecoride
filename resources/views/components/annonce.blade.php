<div class="annonce">
    <div class="profile">
        <img src="{{ $image ?? asset('assets/pictures/') }}" alt="Profil">
        {{ $note }} {{ $pseudo }}
    </div>
    <button type="button"> réserver <i class="ph ph-calendar-plus"></i></button>

    <div class="principal">
        {{ $date }} {{ $heure }}
        <p>trajet</p>
        {{ $depart }} {{ $arrive }}
    </div>

    <div class="detail">
        {{ $prix }} {{ $nombrePlaces }} {{ $energie }}
    </div>
    <div class="accordion-detail">
        <!-- More details -->
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
                        <p>{{ $unAvis->user->pseudo }}</p>
                        <p>{{ $unAvis->commentaire }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
