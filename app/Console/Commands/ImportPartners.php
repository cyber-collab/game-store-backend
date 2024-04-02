<?php

namespace App\Console\Commands;

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

        $client = new Client();

        foreach ($partners['data'] as $item) {
            preg_match('/\/file\/d\/([-\w]+)/', $item['link'], $matches);

            $fileUrl = "https://drive.google.com/uc?id={$matches[1]}";
            $response = $client->get($fileUrl);
            $storagePath = 'public/images/partners/';
            $fileName = 'partner_' . $matches[1] . '.png';

            Storage::put($storagePath . $fileName, $response->getBody());

            Partner::updateOrCreate(['link' => $fileName]);
        }

        $this->info('Images from Google Drive imported successfully.');
    }
}
