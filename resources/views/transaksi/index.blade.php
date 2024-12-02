@include('template.header')
@include('template.navbar')
@include('template.sidebar')
<div class="main-content">
    <section class="container">
        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <canvas id="responseChart" style="width: 100%; height: 300px;"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <canvas id="transaksi" style="width: 100%; height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div id="chart"></div>

    </section>
    <h1 class="mb-4">Daftar Transaksi</h1>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Timestamp</th>
                <th>Response Code</th>
                <th>Type Transaksi</th>
                <th>URL</th>
                <th>Response Message</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data1 as $key => $transaksi)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $transaksi->timestamp }}</td>
                    <td>{{ $transaksi->response_code }}</td>
                    <td>{{ $transaksi->type_transaksi }}</td>
                    <td>{{ $transaksi->url }}</td>
                    <td>{{ $transaksi->response_message }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data transaksi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
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
<script>
   


    const lah = @json($data12);

    const seriesData = lah.map(item => ({
        x: new Date(item.timestamp),
        y: item.response_code,
    }));

    var options = {
        chart: {
            type: 'line',
            height: 350,
            zoom: {
                enabled: false
            }
        },
        series: [{
            name: 'Response Code/Error',
            data: seriesData
        }],
        xaxis: {
            type: 'datetime', // x-axis will be based on timestamps
            title: {
                text: 'Timestamp'
            }
        },
        yaxis: {
            title: {
                text: 'Response Code'
            }
        },
        tooltip: {
            x: {
                format: 'dd MMM yyyy HH:mm:ss'
            },
            y: {
                formatter: function(val) {
                    return 'Response Code: ' + val;
                }
            }
        }
    };

    // Render the chart
    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>



@include('template.footer')
