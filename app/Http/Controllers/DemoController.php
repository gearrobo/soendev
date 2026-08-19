<?php

namespace App\Http\Controllers;

use App\Models\DeviceSensor;

class DemoController extends Controller
{
    public function index()
    {
        $devices = DeviceSensor::query()
            ->get();

        $now = now();

        $devices = $devices->map(function ($device) use ($now) {

            $data = $device->getAttributes();

            /*
             * Support beberapa kemungkinan nama field.
             */
            $name =
                $data['name']
                ?? $data['device_name']
                ?? $data['sensor_name']
                ?? $data['code']
                ?? 'Device #' . $device->id;

            $latitude =
                $data['latitude']
                ?? $data['lat']
                ?? null;

            $longitude =
                $data['longitude']
                ?? $data['lng']
                ?? $data['lon']
                ?? null;

            /*
             * Status berdasarkan updated_at.
             * <= 5 menit = ONLINE
             */
            $updatedAt = $device->updated_at;

            $online = $updatedAt
                ? $updatedAt->greaterThanOrEqualTo($now->copy()->subMinutes(5))
                : false;

            return [
                'id' => $device->id,
                'name' => $name,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'online' => $online,
                'updated_at' => $updatedAt?->format('d M Y H:i:s'),
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