
@foreach($covoiturages as $covoiturage)
    <div class="card" style="background-color: {{ $covoiturage->status->nom == 'en prévision' ? 'lightgreen' : 'red' }}">
        <div class="card-header">
            <h3>{{ $covoiturage->status->nom == 'en prévision' ? 'Démarrer' : 'Terminer' }}</h3>
        </div>
        <div class="card-body">
        @include('components.annonce')
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
    }).then(response => response.json())
      .then(data => location.reload())
      .catch(error => console.error('Erreur:', error));
}
</script>
