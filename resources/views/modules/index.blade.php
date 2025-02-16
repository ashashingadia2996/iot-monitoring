@extends('layouts.layout')

@section('content')
    <style>
        .module-table th, .module-table td {
            text-align: center;
            vertical-align: middle;
        }
        .status-badge {
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 20px;
        }
        .status-active {
            background-color: #28a745;
            color: white;
        }
        .status-inactive {
            background-color: #dc3545;
            color: white;
        }
        .status-faulty {
            background-color: #ffc107;
            color: black;
        }
        .module-card-footer {
            text-align: center;
        }
        .module-card-footer a {
            text-decoration: none;
            font-weight: bold;
            color: #007bff;
        }
        .module-card-footer a:hover {
            text-decoration: underline;
        }
        .module-info {
            font-size: 1rem;
            margin-top: 15px;
        }
        .padding-top-20 {
            padding-top: 20px;
        }
    </style>
</head>
<body>

<div class="">
    <div class="d-flex justify-content-between align-items-center mb-3 padding-top-20">
        <h2 class="m-0">Modules Overview</h2>
        <a href="{{ route('modules.create') }}" class="btn btn-primary mx-3">Add New Module</a>
    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered table-striped module-table">
                            <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Current Measured Value</th>
                                <th>Operating Time (hrs)</th>
                                <th>Data Items Sent</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($modules as $module)
                                <tr>
                                    <td>{{ $module->name }}</td>
                                    <td>{{ $module->location }}</td>
                                    <td>
                            <span class="status-badge
                                @if ($module->status == 'active') status-active
                                @elseif ($module->status == 'inactive') status-inactive
                                @elseif ($module->status == 'faulty') status-faulty
                                @endif">
                                {{ ucfirst($module->status) }}
                            </span>
                                    </td>
                                    <td>{{ $module->data_value }} °C</td>
                                    <td>{{ $module->operating_time }} hrs</td>
                                    <td>{{ $module->data_sent_count }}</td>
                                    <td>
                                        <a href="{{ route('modules.show', $module->id) }}" class="btn btn-info btn-sm">View Details</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

</div>
@endsection

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>