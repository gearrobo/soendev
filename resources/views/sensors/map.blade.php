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
                <div class="card-header bg-info" style="color: white !important;">
                    <h5 class="card-title mb-0">Active Sensors</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive" style="max-height: 75vh; overflow-y: auto;">
                        <table id="sensor-table" class="table table-striped table-hover mb-0">
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
                                <!-- Data akan diisi oleh JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-info" style="color: white !important;">
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

    // Layer group untuk markers
    var markersLayer = L.layerGroup().addTo(map);

    // Fungsi untuk memperbarui data sensor
    function updateSensorData() {
        // Ambil data sensor dari Laravel API
        fetch('/api/sensor-data')
            .then(response => response.json())
            .then(data => {
                // Filter hanya active sensors dan sort descending by created_at
                var activeSensors = data.filter(sensor => sensor.status === 'active' || sensor.status === 'Online')
                    .sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

                // Update tabel
                updateTable(activeSensors);

                // Clear existing markers
                markersLayer.clearLayers();

                // Tambahkan markers baru
                activeSensors.forEach(sensorData => {
                    var marker = L.marker([sensorData.latitude, sensorData.longitude]).addTo(markersLayer);

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
    }

    // Fungsi untuk memperbarui tabel
    function updateTable(sensors) {
        var tbody = document.querySelector('#sensor-table tbody');
        tbody.innerHTML = '';

        sensors.forEach(sensor => {
            var row = `
                <tr>
                    <td>${sensor.name}</td>
                    <td><span class="badge bg-success">${sensor.status}</span></td>
                    <td>${sensor.temperature}</td>
                    <td>${sensor.humidity}</td>
                    <td>${parseFloat(sensor.latitude).toFixed(6)}</td>
                    <td>${parseFloat(sensor.longitude).toFixed(6)}</td>
                    <td>${new Date(sensor.created_at).toLocaleDateString('id-ID')} ${new Date(sensor.created_at).toLocaleTimeString('id-ID')}</td>
                </tr>
            `;
            tbody.innerHTML += row;
        });
    }

    // Panggil fungsi update saat halaman dimuat
    updateSensorData();

    // Auto refresh setiap 10 detik
    setInterval(updateSensorData, 10000);
</script>
@endsection
