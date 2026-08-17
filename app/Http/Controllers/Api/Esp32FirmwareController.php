<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FirmwareRelease;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class Esp32FirmwareController extends Controller
{
    public function latest(): JsonResponse
    {
        $firmware = FirmwareRelease::query()
            ->where('device_type', 'esp32')
            ->where('is_active', true)
            ->latest('id')
            ->first();

        if (! $firmware) {
            return response()->json([
                'success' => false,
                'message' => 'No firmware available.',
            ], 404);
        }

        return response()->json([
            'success' => true,

            'device_type' => $firmware->device_type,

            'version' => $firmware->version,

            'filename' => $firmware->filename,

            'download_url' => Storage::disk($firmware->disk)
                ->url($firmware->path),

            'release_notes' => $firmware->release_notes,

            'updated_at' => $firmware->updated_at?->toISOString(),
        ]);
    }
}
