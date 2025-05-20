<canvas id="CovoiturageChart" width="400" height="200"></canvas>

<script>
    document.addEventListener("DOMContentLoaded", async () {
        // Envoie une requête GET pour récupérer les données JSON depuis ton backend
        fetch('/statistiques/covoiturages')
            .then(response => response.json())
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
                            label: 'Nb de covoiturages',
                            data: values,
                            backgroundColor: 'rgba(255, 255, 255, 1)',
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
