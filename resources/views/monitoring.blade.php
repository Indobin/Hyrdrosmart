<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IoT Monitoring - Suhu & Kelembaban</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Monitoring Suhu & Kelembaban</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Suhu</h2>
                <div class="text-5xl font-bold text-center" id="temperature">--</div>
                <div class="text-gray-500 text-center">°C</div>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Kelembaban</h2>
                <div class="text-5xl font-bold text-center" id="humidity">--</div>
                <div class="text-gray-500 text-center">%</div>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-4">Grafik</h2>
            <canvas id="sensorChart" height="100"></canvas>
        </div>
    </div>
{{-- 
    <script>
        // Inisialisasi chart
        const ctx = document.getElementById('sensorChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [
                    {
                        label: 'Suhu (°C)',
                        data: [],
                        borderColor: 'rgb(255, 99, 132)',
                        tension: 0.1,
                        yAxisID: 'y'
                    },
                    {
                        label: 'Kelembaban (%)',
                        data: [],
                        borderColor: 'rgb(54, 162, 235)',
                        tension: 0.1,
                        yAxisID: 'y1'
                    }
                ]
            },
            options: {
                responsive: true,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        title: {
                            display: true,
                            text: 'Suhu (°C)'
                        }
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        title: {
                            display: true,
                            text: 'Kelembaban (%)'
                        },
                        grid: {
                            drawOnChartArea: false,
                        }
                    }
                }
            }
        });

        // Fungsi untuk update data
        function updateSensorData() {
            fetch('/monitoring/data')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('temperature').textContent = data.temperature.toFixed(1);
                    document.getElementById('humidity').textContent = data.humidity.toFixed(1);
                    
                    // Update chart
                    const now = new Date().toLocaleTimeString();
                    chart.data.labels.push(now);
                    
                    // Batasi jumlah data yang ditampilkan
                    if (chart.data.labels.length > 15) {
                        chart.data.labels.shift();
                        chart.data.datasets[0].data.shift();
                        chart.data.datasets[1].data.shift();
                    }
                    
                    chart.data.datasets[0].data.push(data.temperature);
                    chart.data.datasets[1].data.push(data.humidity);
                    chart.update();
                });
        }

        // Update data setiap 2 detik
        updateSensorData();
        setInterval(updateSensorData, 2000);

        // Jika menggunakan MQTT real-time (bukan dummy data)
        // const eventSource = new EventSource('/mqtt-stream');
        // eventSource.onmessage = function(e) {
        //     const data = JSON.parse(e.data);
        //     document.getElementById('temperature').textContent = data.temperature.toFixed(1);
        //     document.getElementById('humidity').textContent = data.humidity.toFixed(1);
        //     // Update chart seperti di atas
        // };
    </script> --}}
    <script>
        // Ganti fungsi updateSensorData() dengan koneksi SSE
const eventSource = new EventSource('/monitoring/stream');

eventSource.onmessage = function(e) {
    const data = JSON.parse(e.data);
    
    // Update tampilan
    document.getElementById('temperature').textContent = data.temperature.toFixed(1);
    document.getElementById('humidity').textContent = data.humidity.toFixed(1);
    
    // Update chart
    const now = new Date().toLocaleTimeString();
    chart.data.labels.push(now);
    
    // Batasi jumlah data yang ditampilkan
    if (chart.data.labels.length > 15) {
        chart.data.labels.shift();
        chart.data.datasets[0].data.shift();
        chart.data.datasets[1].data.shift();
    }
    
    chart.data.datasets[0].data.push(data.temperature);
    chart.data.datasets[1].data.push(data.humidity);
    chart.update();
};

// Hapus setInterval jika ada
    </script>
</body>
</html>