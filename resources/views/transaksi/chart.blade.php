

<div class="container">
    <h1>Heatmap Transaksi</h1>
    <canvas id="heatmapChart"></canvas>
</div>

<script>
    const heatmapData = @json($heatmapData);
    const dates = @json($dates);
    const types = @json($types);

    const ctx = document.getElementById('heatmapChart').getContext('2d');
    new Chart(ctx, {
        type: 'matrix',
        data: {
            datasets: [{
                label: 'Jumlah Transaksi',
                data: heatmapData,
                backgroundColor: function(ctx) {
                    const value = ctx.raw.v;
                    const alpha = value / 10; // Skala transparansi berdasarkan nilai
                    return `rgba(75, 192, 192, ${alpha})`;
                },
                borderWidth: 1,
                width: ({chart}) => (chart.chartArea.width / dates.length) - 2,
                height: ({chart}) => (chart.chartArea.height / types.length) - 2,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    callbacks: {
                        title: function(ctx) {
                            const xIndex = ctx[0].raw.x;
                            const yIndex = ctx[0].raw.y;
                            return `Tanggal: ${dates[xIndex]}, Tipe: ${types[yIndex]}`;
                        },
                        label: function(ctx) {
                            return `Jumlah: ${ctx.raw.v}`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    type: 'category',
                    labels: dates,
                    title: {
                        display: true,
                        text: 'Tanggal'
                    }
                },
                y: {
                    type: 'category',
                    labels: types,
                    title: {
                        display: true,
                        text: 'Jenis Transaksi'
                    }
                }
            }
        }
    });
</script>