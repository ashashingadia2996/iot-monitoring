<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module Data Evolution</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
            color: #4facfe;
        }
        .chart-container {
            margin-top: 30px;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            height: 400px; /* Fixed height to prevent layout shifts */
            overflow: hidden;
        }
        canvas {
            max-width: 100%; /* Ensure it stays within the container */
            height: 100%; /* Adjust to fit the container height */
        }
    </style>
</head>
<body>
<div class="container">
    <h1>{{ $module->name }} Data Evolution</h1>
    <div class="chart-container">
        <h5 class="text-center">Measured Data Evolution Over Time</h5>
        <canvas id="dataEvolutionGraph"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Prevent re-initialization by keeping a reference to the chart
        let chart;

        // Labels (dates) and data (measured values) fetched from the backend
        const labels = {!! json_encode($module->histories->pluck('created_at')->map(fn($date) => $date ? $date->format('Y-m-d H:i') : 'Unknown')->toArray()) !!};
        const dataValues = {!! json_encode($module->histories->pluck('data_value')->toArray()) !!};

        const ctx = document.getElementById('dataEvolutionGraph').getContext('2d');

        // Create Chart
        chart = new Chart(ctx, {
            type: 'line', // Line graph for evolution
            data: {
                labels: labels, // Time labels
                datasets: [{
                    label: 'Measured Data',
                    data: dataValues,
                    borderColor: '#4facfe',
                    backgroundColor: 'rgba(79, 172, 254, 0.2)',
                    fill: true,
                    tension: 0.4, // Smooth curve
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Time',
                            color: '#666'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Measured Value',
                            color: '#666'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
</body>
</html>
