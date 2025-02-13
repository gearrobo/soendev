{{-- @extends('template.home')

<style>
    .text-center {
        text-align: center;
    }
    #map {
        height: 400px;
        width: 100%;
    }
</style>

@section('content')
    <h1 class="text-center">Laravel Google Maps</h1>
    <div id="map"></div>
@endsection

@section('scripts')
    <script>
        let map, activeInfoWindow, markers = [];

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 28.626137,
                    lng: 79.821603
                },
                zoom: 15
            });

            // Add markers from initialMarkers array
            initialMarkers.forEach((markerData) => {
                let marker = new google.maps.Marker({
                    position: markerData.position,
                    map: map,
                    label: markerData.label,
                    draggable: markerData.draggable
                });

                markers.push(marker);
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
@endsection --}}


<!DOCTYPE html>
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
</html>