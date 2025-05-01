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
                énergie<br>propre <br><i class="ph ph-leaf"></i>
            </button>
            <form>
                <label class="filtre-button">
                    Prix<br>max
                    <input type="text" wire:model="prix" placeholder="5$">
                </label>
                <label class="filtre-button">
                    Durée<br>max
                    <input type="time" wire:model="duree" placeholder="3h">
                </label>
                <label class="filtre-button">
                    Note
                    <input type="text" wire:model="note" placeholder="3 ⭐">
                </label>
            </form>
        </div>

<div>
    @include('components.annonce')

    <div>
        @if(!empty($covoiturages) && count($covoiturages) > 0)
        @foreach ($covoiturages as $covoiturage)
        <x-annonce
            :depart="$covoiturage->depart"
            :arrive="$covoiturage->arrive"
            :date="$covoiturage->date"
            :heure_depart="$covoiturage->heure_depart"
            :heure_depart="$covoiturage->heure_arrive"
            :ecologique="$covoiturage->ecologique"
            :creation="$covoiturage->created_at"
            :image="$covoiturage->user->image ?? asset('assets/pictures/default.png')"
            :note="$covoiturage->user->note ?? 'Non noté'"
            :pseudo="$covoiturage->user->pseudo ?? 'Anonyme'"
            :prix="$covoiturage->prix"
            :nombrePlaces="$covoiturage->nombre_places"
            :fumeur="$covoiturage->preference->fumeur"
            :animal="$covoiturage->preference->animal"
            :immatriculation="$covoiturage->immatriculation"
            :detail="$covoiturage->detail"
            :marque="$covoiturage->modele->marque"
            :modele="$covoiturage->modele->modele"
            :couleur="$covoiturage->modele->couleur"
            :energie="$covoiturage->modele->energie"
        />
    @endforeach

        @else
            <p>Aucune annonce trouvée.</p>
        @endif
    </div>
</div>

@if($role === 'ROLE_PASSAGER' || $role === 'ROLE_CHAUFFEURPASSAGER')
    <!-- Le bouton qui déclenche la réservation -->
    <button type="button" onclick="confirmReservation({{ $covoiturage->modele->nombres_place - 1 }})" class="btn btn-danger">
        <i class="ph ph-check-circle"></i>
    </button>


    <form id="reservation-form" method="POST" style="display: none;">
        @csrf
    </form>

    <script>
        async function confirmReservation(nombres_places) {
            const confirmation = await new Promise(resolve => {
                const result = confirm('Confirmer la réservation ?');
                resolve(result);
            });

            if (confirmation) {
                try {
                    const response = await fetch(`/annonce/reservation/${nombres_places}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({})
                    });

                    const data = await response.json();

                    if (data.success) {
                        alert('Réservation confirmée !');

                        window.location.href = data.redirect;
                    } else {
                        alert('Une erreur est survenue.');
                    }

                } catch (error) {
                    console.error('Erreur AJAX :', error);
                    alert('Erreur lors de la réservation.');
                }
            }
        }
    </script>

@else
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const choice = confirm("Vous devez être connecté pour réserver ?");

            window.location.href = choice
                ? "{{ route('login') }}"
                : "{{ route('register') }}";
            fetch("{{ route('reservation.choice') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ login: choice })
            })
            .then(response => response.json())
            .then(data => {
                if (data.redirect) {
                    window.location.href = data.redirect;
                }
            })
            .catch(error => {
                console.error("Erreur AJAX :", error);
            });
        });
    </script>

@endif


@endsection


