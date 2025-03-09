<div>
    <!-- Affichage des résultats -->
    <div>
        @foreach ($covoiturages as $covoiturage)
            <x-annonce
                :image="$covoiturage->image"
                :note="$covoiturage->note"
                :pseudo="$covoiturage->pseudo"
                :date="$covoiturage->date"
                :heure="$covoiturage->heure"
                :depart="$covoiturage->depart"
                :arrive="$covoiturage->arrive"
                :prix="$covoiturage->prix"
                :nombrePlaces="$covoiturage->nombrePlaces"
                :energieVerte="$covoiturage->energieVerte"
                :fumeur="$covoiturage->fumeur"
                :animal="$covoiturage->animal"
                :immatriculation="$covoiturage->immatriculation"
                :detail="$covoiturage->detail"
                :marque="$covoiturage->marque"
                :modele="$covoiturage->modele"
                :energie="$covoiturage->energie"
                :avis="$covoiturage->avis"
            />
        @endforeach

        @if($covoiturages->isEmpty()) <!-- Assurez-vous que vous vérifiez $covoiturages -->
            <p>Aucune annonce trouvée.</p>
        @endif
    </div>
</div>
