<canvas id="CovoiturageChart" width="400" height="200"></canvas>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Appel AJAX pour récupérer les données du backend
        fetch('/statistiques/credit-donnees')
            .then(response => response.json()) // Convertit la réponse en JSON
            .then(data => {
                // Extraire les dates comme étiquettes du graphique
                const labels = data.map(item => item.date);

                // Extraire les valeurs numériques (crédits gagnés)
                const values = data.map(item => item.creditGagne_donnees);

                // Récupérer le contexte du canvas pour dessiner le graphique
                const ctx = document.getElementById('CreditChart').getContext('2d');

                // Création d'un graphique à barres
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels, // Les dates sur l’axe X
                        datasets: [{
                            label: 'Nombre de crédits', // Légende
                            data: values, // Valeurs sur l’axe Y
                            backgroundColor: 'rgba(255, 255, 255, 0.6)', // Fond des barres
                            borderColor: 'rgba(163, 230, 53, 1)', // Bord des barres
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true, // S’adapte à la taille de l’écran
                        scales: {
                            y: {
                                beginAtZero: true, // Commencer l’axe Y à 0
                                ticks: {
                                    stepSize: 1 // Incrémenter l’axe Y de 1 en 1
                                }
                            }
                        }
                    }
                });
            });
    });
    </script>
