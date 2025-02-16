@extends('layouts.layout')

@section('title', $module->name)

@section('hero-title', $module->name)
@section('hero-description', 'Details and insights for this IoT module.')

@section('content')

    <style>
        .chart-container {
            height: 400px;
        }
        .module-details p {
            margin-bottom: 10px;
            font-size: 16px;
        }
        .collapse-btn {
            background-color: #6a11cb;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <!-- Left Column: Module Details -->
        <div class="col-md-4 module-details">
            <h5>Module Details</h5>
            <p><strong>Status:</strong> {{ $module->status }}</p>
            <p><strong>Location:</strong> {{ $module->location }}</p>
            <p><strong>Data Value:</strong> {{ $module->data_value }}</p>
            <p><strong>description:</strong> {{ $module->description }}</p>
            <p><strong>Type:</strong> {{ $module->type }}</p>
            <p><strong>Data Unit:</strong> {{ $module->data_unit }}</p>
            <p><strong>Data value:</strong> {{ $module->data_value }}</p>
            <p><strong>Operating Time:</strong> {{ $module->operating_time }}</p>
            <p><strong>Maintenance Due:</strong> {{ $module->maintenance_due }}</p>
            <p><strong>Manufacturer:</strong> {{ $module->manufacturer }}</p>
            <p><strong>Model number:</strong> {{ $module->model_number }}</p>
            <p><strong>Firmware version:</strong> {{ $module->firmware_version }}</p>
            <p><strong>Battery Level:</strong> {{ $module->battery_level }}%</p>
        </div>

        <!-- Right Column: History Graph -->
        <div class="col-md-8 chart-container">
            <h5>Data Evolution Graph</h5>
            <canvas id="dataEvolutionGraph"></canvas>
        </div>
    </div>

    <!-- Second Row: Collapsible History Section -->
    <div class="row mt-4">
        <div class="col-12">
            <div id="historyTable" class="mt-3">
                <h5>History</h5>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Recorded At</th>
                        <th>Data Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($module->histories as $history)
                        <tr>
                            <td>{{ $history->created_at ? $history->created_at->format('Y-m-d H:i:s') : 'Unknown' }}</td>
                            <td>{{ $history->data_value }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const labels = {!! json_encode($module->histories->pluck('created_at')->map(fn($date) => $date ? $date->format('Y-m-d H:i') : 'Unknown')->toArray()) !!};
        const dataValues = {!! json_encode($module->histories->pluck('data_value')->toArray()) !!};

        const ctx = document.getElementById('dataEvolutionGraph').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Measured Data',
                    data: dataValues,
                    borderColor: '#6a11cb',
                    backgroundColor: 'rgba(106, 17, 203, 0.2)',
                    fill: true,
                    tension: 0.4,
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
