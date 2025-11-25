<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadSnapshotController extends Controller
{
    public function uploadSnapshot(Request $request)
    {
        $request->validate([
            'fileName' => 'required|string',
            'eventType' => 'nullable|string',
            'data' => 'required|string',
        ]);

        $fileName = $request->input('fileName');
        $eventType = $request->input('eventType', 'Unknown');
        $data = $request->input('data');

        // Decode base64 data
        try {
            $decodedData = base64_decode($data, true);
            if ($decodedData === false) {
                return response()->json(['success' => false, 'msg' => 'Invalid base64 data'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => 'Error decoding data: ' . $e->getMessage()], 400);
        }

        // Use Laravel Storage facade with public disk
        $disk = Storage::disk('public');
        $folderPath = "uploads/snapshot/" . $eventType;

        // Ensure directory exists
        if (!$disk->exists($folderPath)) {
            $disk->makeDirectory($folderPath);
        }

        // Prepare file path
        $filePath = $folderPath . '/' . $fileName;

        // Store the file using put
        // Since putFileAs expects an UploadedFile instance, we'll use put with path and binary
        $disk->put($filePath, $decodedData);

        // Generate public URL - storage link assumed
        $publicUrl = asset('storage/' . $filePath);

        return response()->json([
            'success' => true,
            'url' => $publicUrl,
        ]);
    }

    // New method to list snapshots grouped by eventType
    public function listSnapshots()
    {
        $disk = Storage::disk('public');
        $basePath = 'uploads/snapshot';

        // Get subdirectories (event types)
        $directories = $disk->directories($basePath);

        $snapshots = [];

        foreach ($directories as $dir) {
            $files = $disk->files($dir);
            // Map files to URLs
            $filesUrls = array_map(function ($filePath) {
                return asset('storage/' . str_replace('\\', '/', $filePath));
            }, $files);

            $snapshots[basename($dir)] = $filesUrls;
        }

        return view('snapshots.index', ['snapshots' => $snapshots]);
    }
}
