@include('template.header')
@include('template.navbar')
@include('template.sidebar')
<div class="main-content">
    <section class="container">
        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <canvas id="responseChart" style="width: 100%; height: auto;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <canvas id="transaksi" style="width: 100%; height: 40%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow">
            <div id="chart" class="card-body"></div>

        </div>
    </section>

    <script>
        var chartData = @json($chartData);
        var datesAndHours = @json($datesAndHours);

        var formattedDatesAndHours = datesAndHours.map(function(dateHour) {
            var date = new Date(dateHour);
            return date.toLocaleString();
        });

        var options = {
            chart: {
                type: 'line',
                height: 350
            },
            series: chartData,
            xaxis: {
                categories: formattedDatesAndHours,
                title: {
                    text: 'Date and Hour'
                }
            },
            yaxis: {
                title: {
                    text: 'Total Responses'
                }
            },
            title: {
                text: 'Total Response Codes per Date and Hour',
                align: 'center'
            },
            tooltip: {
                shared: true,
                intersect: false
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

    <script>
        const labels = @json($labels);
        const counts = @json($counts);

        const ctx11 = document.getElementById('responseChart').getContext('2d');
        new Chart(ctx11, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Transaksi',
                    data: counts,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(255, 205, 86, 0.7)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 205, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Jumlah Transaksi per Response Code'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        const labels1 = @json($labels1);
        const counts1 = @json($counts1);

        const ctx = document.getElementById('transaksi').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels1,
                datasets: [{
                    label: 'Jenis Transaksi',
                    data: counts1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(255, 205, 86, 0.7)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 205, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Jumlah Transaksi per Jenis'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>

@include('template.footer')
