<?php

namespace App\Console\Commands;

use App\Models\Banner;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImportBanners extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:banners';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $jsonFile = Storage::path('public/api-banners.json');
        $partners = json_decode(file_get_contents($jsonFile), true);

        $client = new Client();

        foreach ($partners['data'] as $item) {
            preg_match('/\/file\/d\/([-\w]+)/', $item['image'], $matches);

            $fileUrl = "https://drive.google.com/uc?id={$matches[1]}";
            $response = $client->get($fileUrl);
            $storagePath = 'public/images/banners/';
            $fileName = 'banner_' . $matches[1] . '.png';

            Storage::put($storagePath . $fileName, $response->getBody());

            Banner::updateOrCreate(['image' => $fileName]);
        }

        $this->info('Images from Google Drive imported successfully.');
    }
}
