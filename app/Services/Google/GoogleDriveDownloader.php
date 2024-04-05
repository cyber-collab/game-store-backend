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
     * @throws \Exception
     */
    public function downloadImage(string $imageUrl): string
    {
        preg_match('/\/file\/d\/([-\w]+)/', $imageUrl, $matches);

        if (isset($matches[1])) {
            return  "https://drive.google.com/uc?id={$matches[1]}";
        }

        throw new \InvalidArgumentException('Invalid image URL.');
    }

}
