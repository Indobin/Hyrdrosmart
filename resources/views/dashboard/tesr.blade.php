<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green IoT Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .gauge {
            position: relative;
            width: 120px;
            height: 60px;
            margin: 0 auto;
        }
        .gauge-body {
            width: 100%;
            height: 0;
            padding-bottom: 50%;
            background: #e0e0e0;
            border-top-left-radius: 100% 200%;
            border-top-right-radius: 100% 200%;
            overflow: hidden;
            position: relative;
        }
        .gauge-fill {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, #4ade80, #22c55e);
            transform-origin: center top;
            transform: rotate(0.5turn);
            transition: transform 0.5s ease-out;
        }
        .gauge-cover {
            width: 75%;
            height: 150%;
            background: white;
            border-radius: 50%;
            position: absolute;
            top: 25%;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2em;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="sidebar bg-primary-800 text-white w-64 flex-shrink-0 md:translate-x-0 -translate-x-full md:static fixed h-full z-50 transition-transform duration-300 ease-in-out" id="sidebar">
            <div class="p-4 flex items-center justify-between border-b border-primary-700">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-leaf text-2xl text-primary-300"></i>
                    <span class="text-xl font-bold">Green IoT</span>
                </div>
                <button id="sidebarClose" class="md:hidden block">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-4">
                <div class="mb-8">
                    <h3 class="text-xs uppercase text-primary-300 font-semibold mb-4">Dashboard</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="flex items-center space-x-2 p-2 rounded-lg bg-primary-700">
                                <i class="fas fa-chart-pie"></i>
                                <span>Overview</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-primary-700">
                                <i class="fas fa-thermometer-half"></i>
                                <span>Sensors</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-primary-700">
                                <i class="fas fa-lightbulb"></i>
                                <span>Devices</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-primary-700">
                                <i class="fas fa-chart-line"></i>
                                <span>Analytics</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mb-8">
                    <h3 class="text-xs uppercase text-primary-300 font-semibold mb-4">Management</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-primary-700">
                                <i class="fas fa-cog"></i>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-primary-700">
                                <i class="fas fa-users"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-primary-700">
                                <i class="fas fa-bell"></i>
                                <span>Alerts</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="p-4 bg-primary-700 rounded-lg">
                    <div class="text-sm mb-2">System Status</div>
                    <div class="flex items-center justify-between">
                        <div class="text-xs text-primary-200">All systems operational</div>
                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm z-10">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center space-x-4">
                        <button id="sidebarToggle" class="md:hidden block">
                            <i class="fas fa-bars text-gray-600"></i>
                        </button>
                        <h1 class="text-xl font-semibold text-gray-800">IoT Dashboard</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        </div>
                        <div class="relative">
                            <button class="p-2 rounded-full hover:bg-gray-100">
                                <i class="fas fa-bell text-gray-600"></i>
                                <span class="absolute top-0 right-0 w-2 h-2 rounded-full bg-red-500"></span>
                            </button>
                        </div>
                        <div class="flex items-center space-x-2">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User" class="w-8 h-8 rounded-full">
                            <span class="hidden md:block">Jane Doe</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-4 bg-gray-50">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <div class="bg-white rounded-xl shadow-sm p-6 card-hover transition-all duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500">Temperature</p>
                                <h3 class="text-2xl font-bold">24.5°C</h3>
                                <p class="text-sm text-green-500 flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> 2.3% from yesterday
                                </p>
                            </div>
                            <div class="p-3 rounded-lg bg-primary-100 text-primary-600">
                                <i class="fas fa-thermometer-half text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-6 card-hover transition-all duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500">Humidity</p>
                                <h3 class="text-2xl font-bold">65%</h3>
                                <p class="text-sm text-red-500 flex items-center">
                                    <i class="fas fa-arrow-down mr-1"></i> 1.8% from yesterday
                                </p>
                            </div>
                            <div class="p-3 rounded-lg bg-blue-100 text-blue-600">
                                <i class="fas fa-tint text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-6 card-hover transition-all duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500">Energy Usage</p>
                                <h3 class="text-2xl font-bold">1.2 kW</h3>
                                <p class="text-sm text-green-500 flex items-center">
                                    <i class="fas fa-arrow-down mr-1"></i> 15% savings
                                </p>
                            </div>
                            <div class="p-3 rounded-lg bg-yellow-100 text-yellow-600">
                                <i class="fas fa-bolt text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-6 card-hover transition-all duration-300">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500">Air Quality</p>
                                <h3 class="text-2xl font-bold">Good</h3>
                                <p class="text-sm text-green-500 flex items-center">
                                    <i class="fas fa-check-circle mr-1"></i> Optimal
                                </p>
                            </div>
                            <div class="p-3 rounded-lg bg-green-100 text-green-600">
                                <i class="fas fa-wind text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <!-- Temperature Chart -->
                    <div class="bg-white rounded-xl shadow-sm p-6 col-span-2">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-semibold">Temperature Trends</h2>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-sm rounded-lg bg-primary-100 text-primary-600">Day</button>
                                <button class="px-3 py-1 text-sm rounded-lg hover:bg-gray-100">Week</button>
                                <button class="px-3 py-1 text-sm rounded-lg hover:bg-gray-100">Month</button>
                            </div>
                        </div>
                        <canvas id="temperatureChart" height="250"></canvas>
                    </div>

                    <!-- Devices Status -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-lg font-semibold mb-4">Devices Status</h2>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 rounded-lg bg-green-100 text-green-600">
                                        <i class="fas fa-lightbulb"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">Smart Lights</p>
                                        <p class="text-sm text-gray-500">Living Room</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-2 h-2 rounded-full bg-green-500 mr-2"></div>
                                    <span class="text-sm">On</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 rounded-lg bg-blue-100 text-blue-600">
                                        <i class="fas fa-thermostat"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">Thermostat</p>
                                        <p class="text-sm text-gray-500">Bedroom</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-2 h-2 rounded-full bg-yellow-500 mr-2"></div>
                                    <span class="text-sm">Idle</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 rounded-lg bg-purple-100 text-purple-600">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">Smart Lock</p>
                                        <p class="text-sm text-gray-500">Front Door</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-2 h-2 rounded-full bg-green-500 mr-2"></div>
                                    <span class="text-sm">Locked</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 rounded-lg bg-red-100 text-red-600">
                                        <i class="fas fa-video"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">Security Cam</p>
                                        <p class="text-sm text-gray-500">Backyard</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-2 h-2 rounded-full bg-red-500 mr-2"></div>
                                    <span class="text-sm">Offline</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second Row -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Humidity Chart -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-lg font-semibold mb-4">Humidity Level</h2>
                        <div class="gauge">
                            <div class="gauge-body">
                                <div class="gauge-fill" id="humidityGauge"></div>
                                <div class="gauge-cover">65%</div>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-sm text-gray-500">Optimal range: 40% - 60%</p>
                        </div>
                    </div>

                    <!-- Energy Consumption -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-lg font-semibold mb-4">Energy Consumption</h2>
                        <canvas id="energyChart" height="200"></canvas>
                    </div>

                    <!-- Recent Alerts -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-semibold">Recent Alerts</h2>
                            <button class="text-sm text-primary-600 hover:text-primary-800">View All</button>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="p-2 rounded-lg bg-yellow-100 text-yellow-600 mt-1">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div>
                                    <p class="font-medium">High temperature detected</p>
                                    <p class="text-sm text-gray-500">Bedroom sensor reached 28°C at 10:30 AM</p>
                                    <p class="text-xs text-gray-400 mt-1">2 hours ago</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="p-2 rounded-lg bg-red-100 text-red-600 mt-1">
                                    <i class="fas fa-times-circle"></i>
                                </div>
                                <div>
                                    <p class="font-medium">Device offline</p>
                                    <p class="text-sm text-gray-500">Backyard camera lost connection</p>
                                    <p class="text-xs text-gray-400 mt-1">5 hours ago</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="p-2 rounded-lg bg-blue-100 text-blue-600 mt-1">
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                <div>
                                    <p class="font-medium">Maintenance reminder</p>
                                    <p class="text-sm text-gray-500">Air filter needs replacement</p>
                                    <p class="text-xs text-gray-400 mt-1">Yesterday</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Sidebar toggle for mobile
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarClose = document.getElementById('sidebarClose');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

        sidebarClose.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
        });

        // Set humidity gauge
        const humidityGauge = document.getElementById('humidityGauge');
        const humidityValue = 65; // 65%
        const rotation = (humidityValue / 100) * 0.5;
        humidityGauge.style.transform = `rotate(${rotation}turn)`;

        // Temperature Chart
        const tempCtx = document.getElementById('temperatureChart').getContext('2d');
        const tempChart = new Chart(tempCtx, {
            type: 'line',
            data: {
                labels: ['00:00', '03:00', '06:00', '09:00', '12:00', '15:00', '18:00', '21:00'],
                datasets: [
                    {
                        label: 'Living Room',
                        data: [22, 21.5, 21, 22.5, 24, 25, 24.5, 23],
                        borderColor: '#22c55e',
                        backgroundColor: 'rgba(34, 197, 94, 0.1)',
                        tension: 0.3,
                        fill: true
                    },
                    {
                        label: 'Bedroom',
                        data: [20, 19.5, 19, 20.5, 22, 23.5, 23, 21.5],
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        tension: 0.3,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        title: {
                            display: true,
                            text: 'Temperature (°C)'
                        }
                    }
                }
            }
        });

        // Energy Chart
        const energyCtx = document.getElementById('energyChart').getContext('2d');
        const energyChart = new Chart(energyCtx, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Energy (kWh)',
                    data: [12.5, 11.8, 10.2, 9.5, 8.7, 7.2, 6.5],
                    backgroundColor: [
                        'rgba(34, 197, 94, 0.7)',
                        'rgba(34, 197, 94, 0.7)',
                        'rgba(34, 197, 94, 0.7)',
                        'rgba(34, 197, 94, 0.7)',
                        'rgba(34, 197, 94, 0.7)',
                        'rgba(34, 197, 94, 0.7)',
                        'rgba(34, 197, 94, 0.7)'
                    ],
                    borderColor: [
                        '#22c55e',
                        '#22c55e',
                        '#22c55e',
                        '#22c55e',
                        '#22c55e',
                        '#22c55e',
                        '#22c55e'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'kWh'
                        }
                    }
                }
            }
        });

        // Simulate real-time data updates
        setInterval(() => {
            // Update temperature chart with random data
            const tempData = tempChart.data.datasets[0].data;
            tempData.shift();
            tempData.push(22 + Math.random() * 4);
            tempChart.update();

            // Update energy chart with random data
            const energyData = energyChart.data.datasets[0].data;
            for (let i = 0; i < energyData.length; i++) {
                energyData[i] = Math.max(5, energyData[i] + (Math.random() - 0.5));
            }
            energyChart.update();

            // Update humidity gauge with random data
            const newHumidity = Math.max(30, Math.min(80, humidityValue + (Math.random() * 6 - 3)));
            const newRotation = (newHumidity / 100) * 0.5;
            humidityGauge.style.transform = `rotate(${newRotation}turn)`;
            document.querySelector('.gauge-cover').textContent = Math.round(newHumidity) + '%';

        }, 3000);
    </script>
</body>
</html>
