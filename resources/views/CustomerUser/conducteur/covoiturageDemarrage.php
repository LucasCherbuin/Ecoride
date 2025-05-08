@foreach($covoiturages as $covoiturage)
    <div class="button" style="background-color: {{ $covoiturage->status->nom == 'en prévision' ? 'lightgreen' : 'red' }}">
        <div class="card-header">
            <h3>{{ $covoiturage->status->nom == 'en prévision' ? 'Démarrer' : 'Terminer' }}</h3>
        </div>
        <div class="card-body">
            @include('components.annonce')

            <button onclick="changerStatut{{ $covoiturage->id }})" class="btn btn-primary mt-2">
                {{ $covoiturage->status->nom == 'en prévision' ? 'Démarrer le covoiturage' : 'Terminer le covoiturage' }}
            </button>
        </div>
    </div>
@endforeach

<script>
function changerStatut(id) {
    fetch(`/covoiturage/${id}/changer-statut`, {
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Erreur lors du changement de statut');
        }
        return response.json();
    })
    .then(data => {
        alert(data.message); // optionnel
        location.reload();   // recharge la page pour mettre à jour l'affichage
    })
    .catch(error => {
        console.error('Erreur:', error);
        alert("Une erreur est survenue.");
    });
}
</script>
