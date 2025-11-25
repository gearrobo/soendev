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

        // Define storage path
        $folderPath = "public/uploads/snapshot/" . $eventType;

        // Ensure folder exists (Laravel's Storage will handle directory creation)
        $filePath = $folderPath . '/' . $fileName;

        // Store the file
        Storage::put($filePath, $decodedData);

        // Generate public URL - assumes storage link is present
        $publicUrl = asset('storage/uploads/snapshot/' . urlencode($eventType) . '/' . urlencode($fileName));

        return response()->json([
            'success' => true,
            'url' => $publicUrl,
        ]);
    }
}
