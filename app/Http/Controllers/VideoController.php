<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Handle video stream upload (streaming seperti app.post('/api/ingest/video')).
     *
     * Usage (JavaScript/Node.js):
     * const fs = require('fs');
     * const formData = new FormData();
     * const fileStream = fs.createReadStream('/path/to/video.mp4');
     * formData.append('video', fileStream, 'video.mp4');
     *
     * fetch('/api/ingest/video?filename=bus_TJ001.mp4', {
     *   method: 'POST',
     *   body: formData
     * });
     *
     * Saves to: storage/app/public/uploads/video/{filename}
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ingestVideo(Request $request)
    {
        $fileName = $request->query('filename');

        if (!$fileName) {
            return response()->json(['success' => false, 'msg' => 'Filename parameter is required'], 400);
        }

        $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if ($extension !== 'mp4') {
            return response()->json(['success' => false, 'msg' => 'Only .mp4 files are allowed'], 400);
        }

        $disk = Storage::disk('public');
        $folderPath = 'uploads/video';

        if (!$disk->exists($folderPath)) {
            $disk->makeDirectory($folderPath);
        }

        $filePath = $folderPath . '/' . $fileName;
        $fullPath = storage_path('app/public/' . $filePath);

        $directory = dirname($fullPath);
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        try {
            $handle = fopen($fullPath, 'wb');
            if ($handle === false) {
                return response()->json(['success' => false, 'msg' => 'Failed to create file'], 500);
            }

            $inputStream = $request->getContent();
            $bytesWritten = fwrite($handle, $inputStream);
            fclose($handle);

            if ($bytesWritten === false) {
                return response()->json(['success' => false, 'msg' => 'Failed to write file'], 500);
            }

            if (!file_exists($fullPath)) {
                return response()->json(['success' => false, 'msg' => 'File was not created'], 500);
            }

            $publicUrl = asset('storage/' . $filePath);
            $fileSize = filesize($fullPath);

            return response()->json([
                'success' => true,
                'filename' => $fileName,
                'url' => $publicUrl,
                'size' => $fileSize,
                'message' => 'Video uploaded successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => 'Error uploading video: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Handle multipart form upload for video.
     *
     * Usage (JavaScript):
     * const formData = new FormData();
     * formData.append('video', videoFile, 'bus_TJ001.mp4');
     *
     * fetch('/api/upload/video', {
     *   method: 'POST',
     *   body: formData
     * });
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadVideo(Request $request)
    {
        $request->validate([
            'video' => 'required|file|mimes:mp4|max:102400',
        ]);

        try {
            $video = $request->file('video');
            $fileName = $video->getClientOriginalName();

            $disk = Storage::disk('public');
            $folderPath = 'uploads/video';

            if (!$disk->exists($folderPath)) {
                $disk->makeDirectory($folderPath);
            }

            $path = $video->storeAs($folderPath, $fileName, 'public');
            $publicUrl = asset('storage/' . $path);
            $fileSize = $video->getSize();

            return response()->json([
                'success' => true,
                'filename' => $fileName,
                'url' => $publicUrl,
                'size' => $fileSize,
                'message' => 'Video uploaded successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => 'Error uploading video: ' . $e->getMessage()], 500);
        }
    }

    /**
     * List all uploaded videos.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listVideos()
    {
        try {
            $disk = Storage::disk('public');
            $folderPath = 'uploads/video';

            if (!$disk->exists($folderPath)) {
                return response()->json(['success' => true, 'videos' => [], 'message' => 'No videos uploaded yet']);
            }

            $files = $disk->files($folderPath);
            $videos = [];

            foreach ($files as $file) {
                $fileName = basename($file);
                $fullPath = storage_path('app/public/' . $file);

                $videos[] = [
                    'filename' => $fileName,
                    'url' => asset('storage/' . $file),
                    'size' => filesize($fullPath),
                    'created_at' => date('Y-m-d H:i:s', filemtime($fullPath))
                ];
            }

            return response()->json(['success' => true, 'videos' => $videos, 'total' => count($videos)]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => 'Error listing videos: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Get video information.
     *
     * @param string $filename
     * @return \Illuminate\Http\JsonResponse
     */
    public function getVideo($filename)
    {
        try {
            $disk = Storage::disk('public');
            $filePath = 'uploads/video/' . $filename;

            if (!$disk->exists($filePath)) {
                return response()->json(['success' => false, 'msg' => 'Video not found'], 404);
            }

            $fullPath = storage_path('app/public/' . $filePath);

            return response()->json([
                'success' => true,
                'video' => [
                    'filename' => $filename,
                    'url' => asset('storage/' . $filePath),
                    'size' => filesize($fullPath),
                    'created_at' => date('Y-m-d H:i:s', filemtime($fullPath))
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => 'Error getting video: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Delete a video.
     *
     * @param string $filename
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteVideo($filename)
    {
        try {
            $disk = Storage::disk('public');
            $filePath = 'uploads/video/' . $filename;

            if (!$disk->exists($filePath)) {
                return response()->json(['success' => false, 'msg' => 'Video not found'], 404);
            }

            $disk->delete($filePath);

            return response()->json(['success' => true, 'message' => 'Video deleted successfully']);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => 'Error deleting video: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Stream video file.
     *
     * @param string $filename
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function streamVideo($filename)
    {
        $filePath = storage_path('app/public/uploads/video/' . $filename);

        if (!file_exists($filePath)) {
            abort(404, 'Video not found');
        }

        $fileSize = filesize($filePath);
        $contentType = 'video/mp4';

        $response = response()->stream(function () use ($filePath) {
            $stream = fopen($filePath, 'rb');
            fpassthru($stream);
            fclose($stream);
        }, 200, [
            'Content-Type' => $contentType,
            'Content-Length' => $fileSize,
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
            'Accept-Ranges' => 'bytes',
        ]);

        return $response;
    }
}
