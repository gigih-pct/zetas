<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    protected string $apiKey;
    protected string $baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent';

    public function __construct()
    {
        $this->apiKey = config('services.gemini.key');
    }

    /**
     * Send a prompt to Gemini and expect a JSON response.
     */
    public function generateRab(string $prompt): array
    {
        try {
            $response = Http::timeout(30)->post($this->baseUrl . '?key=' . $this->apiKey, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'response_mime_type' => 'application/json',
                ]
            ]);

            if ($response->failed()) {
                Log::error('Gemini API Error: ' . $response->body());
                throw new \Exception('Gagal menghubungi AI Gemini: ' . ($response->json('error.message') ?? 'Unknown error'));
            }

            $result = $response->json();
            $textResponse = $result['candidates'][0]['content']['parts'][0]['text'] ?? '{}';
            
            // Clean up the response to get only the JSON part
            if (preg_match('/\{(?:[^{}]|(?R))*\}/s', $textResponse, $matches)) {
                $textResponse = $matches[0];
            }
            
            return json_decode($textResponse, true) ?? [];
        } catch (\Exception $e) {
            Log::error('Gemini Service Exception: ' . $e->getMessage());
            throw $e;
        }
    }
}
