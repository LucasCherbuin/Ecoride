<script>
    document.addEventListener("DOMContentLoaded", function() {
        .then(response => response.json())
        .then(data => {
            const labels = data.map(item => item.date);
            const values = data.map(item => item.total);

            const ctx = document.getElementById('CovoiturageChart').getContext('2d');
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
        });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
