<?php

namespace App\Http\Controllers;

use App\Models\SensorData;

class DemoController extends Controller
{
    public function index()
    {
        $now = now();

        /*
         * Ambil data terbaru dari tabel sensor_data.
         * Karena setiap sensor mengirim data berulang,
         * ambil hanya record terbaru untuk masing-masing nama.
         */
        $records = SensorData::query()
            ->orderByDesc('updated_at')
            ->get()
            ->unique('name')
            ->values();

        $devices = $records->map(function ($device) use ($now) {

            $updatedAt = $device->updated_at;

            /*
             * Online jika status Online dan data
             * diperbarui dalam 5 menit terakhir.
             */
            $online = (
                strtolower((string) $device->status) === 'online'
                && $updatedAt
                && $updatedAt->greaterThanOrEqualTo(
                    $now->copy()->subMinutes(10)
                )
            );

            return [
                'id' => $device->id,
                'name' => $device->name ?? 'Device #' . $device->id,
                'latitude' => $device->latitude,
                'longitude' => $device->longitude,
                'online' => (bool) $online,
                'updated_at' => $updatedAt
                    ? $updatedAt->format('d M Y H:i:s')
                    : null,
            ];
        });

        $total = $devices->count();

        $online = $devices
            ->where('online', true)
            ->count();

        $offline = $total - $online;

        return view('pages.demo', compact(
            'devices',
            'total',
            'online',
            'offline'
        ));
    }
}
