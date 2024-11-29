@include('template.header')
@include('template.navbar')
@include('template.sidebar')
<div class="main-content">
    <section class="table">
        {{-- <table>
            <tr>
                <th>timestamp</th>
                <th>response_code</th>
                <th>type_transaksi</th>
                <th>url</th>
                <th>response_message</th>
            </tr>
            @foreach ($data1 as $i)
                
            <tr>
                <td>{{ $i->timestamp }}</td>
                <td>{{ $i->response_code }}</td>
                <td>{{ $i->type_transaksi }}</td>
                <td>{{ $i->url }}</td>
                <td>{{ $i->response_message }}</td>
            </tr>
            @endforeach
        </table> --}}
        <div class="">

            <div class=" row">
                <div class="card col-md-6">
                    <canvas id="responseChart" class="card-body p-2 shadow" style="height: 25%"></canvas>
                </div>
                <div class="card  col-md-6">
                    <canvas id="transaksi" class="card-body p-2 shadow" style="height: 25%"></canvas>
                </div>
            </div>
        </div>
    </section>

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
                    label: 'jenis Transaksi',
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
@include('template.footer')
