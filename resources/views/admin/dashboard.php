<script>
    //dashboard Covoiturage
    document.addEventListener("DOMContentLoaded", function() {
        fetch('/get-covoiturage-stats')
        .then(Response => response.json())
        .then(data => {
            const labels = data.map(item => item.date);
            const value = data.map(item => item.total);

            const ctx = document.getElementById('CovoiturageChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'nombre de covoiturages',
                        data: values,
                        backgroundColor: rgb(255, 255, 255),
                        borderColor: rgb(163, 230, 53),
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
    });

    //dashboard Credit
    document.addEventListener("DOMContentLoaded", function() {
        fetch('/get-credit-stats')
        .then(Response => response.json())
        .then(data => {
            const labels = data.map(item => item.date);
            const value = data.map(item => item.total);

            const ctx = document.getElementById('CovoiturageChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'nombre de covoiturages',
                        data: values,
                        backgroundColor: rgb(255, 255, 255),
                        borderColor: rgb(163, 230, 53),
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
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
