<?php

namespace App\Console\Commands;

use App\Services\Google\GoogleDriveDownloader;
use GuzzleHttp\Client;
use App\Models\Partner;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImportPartners extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:partners';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     * @throws GuzzleException
     */
    public function handle(): void
    {
        $jsonFile = Storage::path('public/api-partners.json');
        $partners = json_decode(file_get_contents($jsonFile), true);

        $downloader = new GoogleDriveDownloader();

        foreach ($partners['data'] as $item) {
            $fileUrl = $downloader->downloadImage($item['link']);
            Partner::updateOrCreate(['link' => $fileUrl]);
        }

        $this->info('Images from Google Drive imported successfully.');
    }
}
