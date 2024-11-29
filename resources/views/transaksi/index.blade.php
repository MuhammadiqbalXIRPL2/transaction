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
        <div class="card">
            <canvas id="responseChart"></canvas>
        </div>
    </section>

    <script>
        const labels = @json($labels);
        const counts = @json($counts);

        const ctx = document.getElementById('responseChart').getContext('2d');
        new Chart(ctx, {
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
@include('template.footer')
