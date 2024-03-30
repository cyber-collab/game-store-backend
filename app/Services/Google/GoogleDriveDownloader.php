<?php

namespace App\Services\Google;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class GoogleDriveDownloader
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @throws GuzzleException
     * @throws \Exception
     */
    public function downloadImage(string $startNameFile, string $imageUrl, string $storagePath): string
    {
        preg_match('/\/file\/d\/([-\w]+)/', $imageUrl, $matches);

        if (isset($matches[1])) {
            $fileUrl = "https://drive.google.com/uc?id={$matches[1]}";

            try {
                $response = $this->client->get($fileUrl);
            } catch (RequestException $e) {
                Log::error('Failed to download image from Google Drive: ' . $e->getMessage());
                throw new \Exception('Failed to download image from Google Drive.');
            }

            $fileName = $startNameFile . $matches[1] . '.png';
            $storedPath = Storage::put($storagePath . $fileName, $response->getBody());

            if (!$storedPath) {
                Log::error('Failed to save image to storage.');
                throw new \Exception('Failed to save image to storage.');
            }

            return $fileName;
        }

        throw new \InvalidArgumentException('Invalid image URL.');
    }

}
