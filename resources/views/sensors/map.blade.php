<!-- <!DOCTYPE html>
<html>
<head>
    <title>Monitoring Sistem</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map { height: 550px; }
        marker.bindPopup('
            <div style="font-family: Arial, sans-serif;">
                <h3 style="margin: 0;">${sensor.name}</h3>
                <p style="margin: 5px 0;">Lat: ${sensor.latitude}</p>
                <p style="margin: 5px 0;">Lng: ${sensor.longitude}</p>
                <small>Added on: ${new Date(sensor.created_at).toLocaleString()}</small>
            </div>
        ');
    </style>
</head>
<body>
    <h1>Sensor Locations</h1>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-6.3000, 106.8166], 11); // Set view ke lokasi default

        // Tambahkan layer peta dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Ambil data sensor dari Laravel API
        fetch('/api/sensor-data')
            .then(response => response.json())
            .then(data => {
                data.forEach(sensorData => {
                    // Buat marker untuk setiap sensorData
                    var marker = L.marker([sensorData.latitude, sensorData.longitude]).addTo(map);

                    // Tambahkan popup dengan informasi sensorData
                    marker.bindPopup(`
                        <b>${sensorData.name}</b><br>
                        Status: ${sensorData.status}<br>
                        Suhu: ${sensorData.temperature}°C<br>
                        Kelembaban: ${sensorData.humidity}%<br>
                        Latitude: ${sensorData.latitude}<br>
                        Longitude: ${sensorData.longitude}<br>
                        Created at: ${new Date(sensorData.created_at).toLocaleString()}
                    `);
                });
            })
            .catch(error => console.error('Error fetching sensorData data:', error));
    </script>
</body>
</html> -->

@extends('template.home')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

@section('content')
<br>
<br>
<br>
<br>
<div class="container-fluid mt-3">
    <div class="row g-3">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Active Sensors</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive" style="max-height: 75vh; overflow-y: auto;">
                        @if($sensorData->isEmpty())
                            <p class="text-center text-muted py-4">No active sensors found.</p>
                        @else
                            <table class="table table-striped table-hover mb-0">
                                <thead class="table-dark sticky-top">
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Temp (°C)</th>
                                        <th>Humidity (%)</th>
                                        <th>Lat</th>
                                        <th>Lng</th>
                                        <th>Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sensorData as $sensor)
                                    <tr>
                                        <td>{{ $sensor->name }}</td>
                                        <td><span class="badge bg-success">{{ $sensor->status }}</span></td>
                                        <td>{{ $sensor->temperature }}</td>
                                        <td>{{ $sensor->humidity }}</td>
                                        <td>{{ number_format($sensor->latitude, 6) }}</td>
                                        <td>{{ number_format($sensor->longitude, 6) }}</td>
                                        <td>{{ $sensor->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="card-title mb-0">Sensor Map</h5>
                </div>
                <div class="card-body p-0">
                    <div id="map" style="height: 75vh; border: 2px solid #007bff; border-radius: 0 0 5px 5px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    // Inisialisasi peta
    var map = L.map('map').setView([-6.3000, 106.8166], 11); // Set view ke lokasi default

    // Tambahkan layer peta dari OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Ambil data sensor dari Laravel API
    fetch('/api/sensor-data')
        .then(response => response.json())
        .then(data => {
            data.forEach(sensorData => {
                // Buat marker untuk setiap sensorData
                var marker = L.marker([sensorData.latitude, sensorData.longitude]).addTo(map);

                // Tambahkan popup dengan informasi sensorData
                marker.bindPopup(`
                    <b>${sensorData.name}</b><br>
                    Status: ${sensorData.status}<br>
                    Suhu: ${sensorData.temperature}°C<br>
                    Kelembaban: ${sensorData.humidity}%<br>
                    Latitude: ${sensorData.latitude}<br>
                    Longitude: ${sensorData.longitude}<br>
                    Created at: ${new Date(sensorData.created_at).toLocaleString()}
                `);
            });
        })
        .catch(error => console.error('Error fetching sensorData data:', error));
</script>
@endsection
