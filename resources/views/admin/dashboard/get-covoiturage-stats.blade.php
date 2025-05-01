<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Envoie une requête GET pour récupérer les données JSON
        fetch("/api/covoiturages-par-jour") // ⚠️ Remplace par ton vrai endpoint
            .then(response => response.json()) // Convertit la réponse en JSON
            .then(data => {
                // Extrait les labels (ex: dates) et les valeurs (ex: nombre de trajets)
                const labels = data.map(item => item.date);
                const values = data.map(item => item.nb_covoiturages);

                // Sélectionne le canvas du graphique
                const ctx = document.getElementById('CovoiturageChart').getContext('2d');

                // Crée le graphique avec Chart.js
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Nombre de covoiturages',
                            data: values,
                            backgroundColor: 'rgba(255, 255, 255, 0.6)',
                            borderColor: 'rgba(163, 230, 53, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        }
                    }
                });
            })
            .catch(error => {
                console.error("Erreur lors de la récupération des données :", error);
            });
    });
</script>

<!-- Script Bootstrap (facultatif pour le graphique) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
