<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Sim800Controller extends Controller
{
    public function send(Request $request)
    {
        // API key khusus device, BUKAN token Telegram
        $key = $request->query('key');

        if ($key !== env('SIM800_API_KEY')) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        $message = $request->query('message', 'berhasil');

        $token = env('TELEGRAM_TOKEN');

        $chatIds = explode(',', env('TELEGRAM_CHAT_IDS'));

        if (!$token || empty($chatIds)) {
            return response()->json([
                'success' => false,
                'message' => 'Telegram configuration missing',
            ], 500);
        }

        $results = [];

        foreach ($chatIds as $chatId) {
            $chatId = trim($chatId);

            if (empty($chatId)) {
                continue;
            }

            try {
                $response = Http::timeout(15)
                    ->post("https://api.telegram.org/bot{$token}/sendMessage", [
                        'chat_id' => $chatId,
                        'text' => $message,
                    ]);

                $results[] = [
                    'chat_id' => $chatId,
                    'success' => $response->successful(),
                ];

            } catch (\Exception $e) {
                $results[] = [
                    'chat_id' => $chatId,
                    'success' => false,
                ];
            }
        }

        $success = collect($results)
            ->contains('success', true);

        return response()->json([
            'success' => $success,
            'message' => $message,
            'results' => $results,
        ], $success ? 200 : 500);
    }
}