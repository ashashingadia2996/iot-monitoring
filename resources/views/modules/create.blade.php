@extends('layouts.layout')

@section('content')
    <style>
        .form-container {
            padding-bottom: 10px;
        }
    </style>
<div class="form-container">
    <h1>Add New Module</h1>
    <form action="{{ route('modules.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Module Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select class="form-control" id="type" name="type" required>
                <option value="Sensor">Sensor</option>
                <option value="Controller">Controller</option>
                <option value="Actuator">Actuator</option>
            </select>
        </div>


        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="faulty">Faulty</option>
            </select>
        </div>


        <div class="form-group">
            <label for="last_seen">Last Seen</label>
            <input type="datetime-local" class="form-control" id="last_seen" name="last_seen">
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>

        <div class="form-group">
            <label for="data_unit">Data Unit</label>
            <select class="form-control" id="data_unit" name="data_unit" required>
                <option value="">Select Data Unit</option>
                <!-- Temperature Units -->
                <option value="Celsius (°C)">Celsius (°C)</option>
                <option value="Fahrenheit (°F)">Fahrenheit (°F)</option>
                <option value="Kelvin (K)">Kelvin (K)</option>
                <!-- Speed Units -->
                <option value="Kilometers per hour (km/h)">Kilometers per hour (km/h)</option>
                <option value="Miles per hour (mph)">Miles per hour (mph)</option>
                <option value="Meters per second (m/s)">Meters per second (m/s)</option>
                <!-- Pressure Units -->
                <option value="Pascal (Pa)">Pascal (Pa)</option>
                <option value="Bar">Bar</option>
                <option value="PSI (Pounds per square inch)">PSI (Pounds per square inch)</option>
                <!-- Distance Units -->
                <option value="Meters (m)">Meters (m)</option>
                <option value="Kilometers (km)">Kilometers (km)</option>
                <option value="Miles">Miles</option>
                <!-- Volume Units -->
                <option value="Liters (L)">Liters (L)</option>
                <option value="Cubic meters (m³)">Cubic meters (m³)</option>
                <option value="Gallons">Gallons</option>
                <!-- Time Units -->
                <option value="Seconds (s)">Seconds (s)</option>
                <option value="Minutes (min)">Minutes (min)</option>
                <option value="Hours (h)">Hours (h)</option>
                <!-- Energy Units -->
                <option value="Watts (W)">Watts (W)</option>
                <option value="Kilowatt-hours (kWh)">Kilowatt-hours (kWh)</option>
                <option value="Joules (J)">Joules (J)</option>
                <!-- Data Transfer Units -->
                <option value="Bytes (B)">Bytes (B)</option>
                <option value="Kilobytes (KB)">Kilobytes (KB)</option>
                <option value="Megabytes (MB)">Megabytes (MB)</option>
                <option value="Gigabytes (GB)">Gigabytes (GB)</option>
                <!-- Current Measurement -->
                <option value="Amperes (A)">Amperes (A)</option>
                <option value="Milliamperes (mA)">Milliamperes (mA)</option>
            </select>
        </div>


        <div class="form-group">
            <label for="data_value">Data Value</label>
            <input type="number" class="form-control" id="data_value" name="data_value" required>
        </div>

        <div class="form-group">
            <label for="operating_time">Operating Time (hrs)</label>
            <input type="number" class="form-control" id="operating_time" name="operating_time" required>
        </div>

        <div class="form-group">
            <label for="data_sent_count">Data Sent Count</label>
            <input type="number" class="form-control" id="data_sent_count" name="data_sent_count" required>
        </div>

        <div class="form-group">
            <label for="fault_code">Fault Code</label>
            <input type="text" class="form-control" id="fault_code" name="fault_code">
        </div>

        <div class="form-group">
            <label for="maintenance_due">Maintenance Due</label>
            <input type="date" class="form-control" id="maintenance_due" name="maintenance_due">
        </div>

        <div class="form-group">
            <label for="manufacturer">Manufacturer</label>
            <select class="form-control" id="manufacturer" name="manufacturer" required>
                <option value="">Select Manufacturer</option>
                <option value="Samsung">Samsung</option>
                <option value="Bosch">Bosch</option>
                <option value="Honeywell">Honeywell</option>
                <option value="Siemens">Siemens</option>
                <option value="Texas Instruments">Texas Instruments</option>
                <option value="Panasonic">Panasonic</option>
                <option value="Intel">Intel</option>
                <option value="GE (General Electric)">GE (General Electric)</option>
                <option value="Schneider Electric">Schneider Electric</option>
                <option value="ABB">ABB</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="model_number">Model Number</label>
            <input type="text" class="form-control" id="model_number" name="model_number" required>
        </div>

        <div class="form-group">
            <label for="firmware_version">Firmware Version</label>
            <input type="text" class="form-control" id="firmware_version" name="firmware_version" required>
        </div>

        <div class="form-group">
            <label for="battery_level">Battery Level (%)</label>
            <input type="number" class="form-control" id="battery_level" name="battery_level" required>
        </div>

        <div class="form-group">
            <label for="module_configuration">Module Configuration</label>
            <textarea class="form-control" id="module_configuration" name="module_configuration"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection