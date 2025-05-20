@foreach($covoiturages as $covoiturage)
    @php
        $label = $covoiturage->status->label ?? null;
        $isPrevision = $label === 'en prévision';
        $bgColor = $isPrevision ? 'lightgreen' : 'lightcoral';
        $actionText = $isPrevision ? 'Démarrer' : 'Terminer';
    @endphp

    <div class="button mb-3 p-3 rounded">
        <div class="card-header">
            <h3>{{ $actionText }}</h3>
        </div>
        <div class="card-body">
            @include('components.annonce')

            <button onclick="changerStatut" class="btn btn-primary mt-2">
                {{ $actionText }} le covoiturage
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
        alert(data.message); // Optionnel
        location.reload();   // Recharge la page pour afficher le nouveau statut
    })
    .catch(error => {
        console.error('Erreur:', error);
        alert("Une erreur est survenue.");
    });
}
</script>
