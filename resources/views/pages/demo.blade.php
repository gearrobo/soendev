@extends('layouts.app')

@section('title', 'Demo | SOENDEV')

@section('description', 'SOENDEV Demo - Device monitoring and real-time status.')

@push('styles')

<link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
/>

<style>

    .demo-hero {
        background: #0b1322;
        color: white;
        padding: 100px 0;
    }

    .demo-eyebrow {
        display: block;
        margin-bottom: 18px;
        color: #94a3b8;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
    }

    .demo-hero h1 {
        max-width: 850px;
        font-size: clamp(48px, 7vw, 82px);
        line-height: 1;
        letter-spacing: -4px;
        margin-bottom: 25px;
    }

    .demo-hero p {
        max-width: 700px;
        color: #cbd5e1;
        font-size: 19px;
    }


    .demo-content {
        padding: 70px 0 100px;
        background: #f8fafc;
    }


    /*
    |--------------------------------------------------------------------------
    | STATISTICS
    |--------------------------------------------------------------------------
    */

    .demo-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }

    .demo-stat {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        padding: 28px;
    }

    .demo-stat-label {
        color: #64748b;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .demo-stat-value {
        color: #0f172a;
        font-size: 42px;
        font-weight: 800;
        line-height: 1;
    }

    .demo-stat-online .demo-stat-value {
        color: #16a34a;
    }

    .demo-stat-offline .demo-stat-value {
        color: #dc2626;
    }


    /*
    |--------------------------------------------------------------------------
    | MAP
    |--------------------------------------------------------------------------
    */

    .demo-map-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        overflow: hidden;
        margin-bottom: 30px;
    }

    .demo-map-header {
        padding: 24px 28px;
        border-bottom: 1px solid #e5e7eb;
    }

    .demo-map-header h2 {
        margin: 0;
        font-size: 24px;
        color: #0f172a;
    }

    .demo-map-header p {
        margin-top: 5px;
        color: #64748b;
        font-size: 14px;
    }

    #demo-map {
        width: 100%;
        height: 550px;
    }


    /*
    |--------------------------------------------------------------------------
    | DEVICE LIST
    |--------------------------------------------------------------------------
    */

    .demo-devices {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        overflow: hidden;
    }

    .demo-devices-header {
        padding: 24px 28px;
        border-bottom: 1px solid #e5e7eb;
    }

    .demo-devices-header h2 {
        margin: 0;
        color: #0f172a;
        font-size: 24px;
    }

    .device-list {
        display: flex;
        flex-direction: column;
    }

    .device-row {
        display: grid;
        grid-template-columns: 2fr 1.5fr 1fr 1.5fr;
        gap: 20px;
        align-items: center;
        padding: 20px 28px;
        border-bottom: 1px solid #eef2f7;
    }

    .device-row:last-child {
        border-bottom: none;
    }

    .device-name {
        font-weight: 700;
        color: #0f172a;
    }

    .device-location {
        color: #64748b;
        font-size: 14px;
    }

    .device-time {
        color: #64748b;
        font-size: 13px;
    }

    .status {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        font-weight: 700;
    }

    .status-dot {
        width: 9px;
        height: 9px;
        border-radius: 50%;
    }

    .status-online {
        color: #16a34a;
    }

    .status-online .status-dot {
        background: #22c55e;
    }

    .status-offline {
        color: #dc2626;
    }

    .status-offline .status-dot {
        background: #ef4444;
    }

    .demo-empty {
        padding: 50px;
        text-align: center;
        color: #64748b;
    }


    /*
    |--------------------------------------------------------------------------
    | MAP MARKER
    |--------------------------------------------------------------------------
    */

    .device-marker {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        border: 3px solid white;
        box-shadow: 0 2px 8px rgba(0,0,0,.3);
    }

    .device-marker.online {
        background: #22c55e;
    }

    .device-marker.offline {
        background: #ef4444;
    }


    @media (max-width: 800px) {

        .demo-stats {
            grid-template-columns: 1fr;
        }

        .device-row {
            grid-template-columns: 1fr;
            gap: 8px;
        }

        #demo-map {
            height: 400px;
        }

    }

</style>

@endpush


@section('content')


<section class="demo-hero">

    <div class="container">

        <span class="demo-eyebrow">
            SOENDEV DEMO
        </span>

        <h1>
            Connected Technology
            in Real Time.
        </h1>

        <p>
            Monitor connected devices, locations and operational
            status through a single monitoring interface.
        </p>

    </div>

</section>



<section class="demo-content">

    <div class="container">


        {{-- STATISTICS --}}

        <div class="demo-stats">

            <div class="demo-stat">

                <div class="demo-stat-label">
                    Total Device
                </div>

                <div class="demo-stat-value">
                    {{ $total }}
                </div>

            </div>


            <div class="demo-stat demo-stat-online">

                <div class="demo-stat-label">
                    Online
                </div>

                <div class="demo-stat-value">
                    {{ $online }}
                </div>

            </div>


            <div class="demo-stat demo-stat-offline">

                <div class="demo-stat-label">
                    Offline
                </div>

                <div class="demo-stat-value">
                    {{ $offline }}
                </div>

            </div>

        </div>



        {{-- MAP --}}

        <div class="demo-map-card">

            <div class="demo-map-header">

                <h2>
                    Device Monitoring Map
                </h2>

                <p>
                    Current location and connectivity status
                </p>

            </div>

            <div id="demo-map"></div>

        </div>



        {{-- DEVICE LIST --}}

        <div class="demo-devices">

            <div class="demo-devices-header">

                <h2>
                    Device Status
                </h2>

            </div>


            <div class="device-list">

                @forelse($devices as $device)

                    <div class="device-row">

                        <div>

                            <div class="device-name">
                                {{ $device['name'] }}
                            </div>

                        </div>


                        <div class="device-location">

                            @if($device['latitude'] && $device['longitude'])

                                {{ $device['latitude'] }},
                                {{ $device['longitude'] }}

                            @else

                                Location unavailable

                            @endif

                        </div>


                        <div>

                            @if($device['online'])

                                <span class="status status-online">

                                    <span class="status-dot"></span>

                                    Online

                                </span>

                            @else

                                <span class="status status-offline">

                                    <span class="status-dot"></span>

                                    Offline

                                </span>

                            @endif

                        </div>


                        <div class="device-time">

                            {{ $device['updated_at'] ?? '-' }}

                        </div>

                    </div>

                @empty

                    <div class="demo-empty">

                        Belum ada device terdaftar.

                    </div>

                @endforelse

            </div>

        </div>


    </div>

</section>

@endsection



@push('scripts')

<script
    src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js">
</script>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const map = L.map('demo-map');

    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap'
        }
    ).addTo(map);


    const devices = @json($devices);


    const validDevices = devices.filter(device =>
        device.latitude !== null &&
        device.longitude !== null &&
        !isNaN(parseFloat(device.latitude)) &&
        !isNaN(parseFloat(device.longitude))
    );


    if (validDevices.length === 0) {

        map.setView(
            [-6.2, 106.816666],
            10
        );

        return;

    }


    const bounds = [];


    validDevices.forEach(device => {

        const lat = parseFloat(device.latitude);
        const lng = parseFloat(device.longitude);


        const icon = L.divIcon({

            className: '',

            html:
                '<div class="device-marker ' +
                (device.online ? 'online' : 'offline') +
                '"></div>',

            iconSize: [16, 16],

            iconAnchor: [8, 8]

        });


        const marker = L.marker(
            [lat, lng],
            { icon: icon }
        ).addTo(map);


        marker.bindPopup(`

            <strong>
                ${device.name}
            </strong>

            <br>

            Status:
            <strong>
                ${device.online ? 'Online' : 'Offline'}
            </strong>

            <br>

            Last update:
            ${device.updated_at ?? '-'}

        `);


        bounds.push([lat, lng]);

    });


    map.fitBounds(bounds, {
        padding: [40, 40]
    });

});

</script>

@endpush