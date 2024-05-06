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

        foreach ($partners['data'] as $item) {
            Banner::updateOrCreate(['image' => $item['image']]);
        }

        $this->info('Images from Google Drive imported successfully.');
    }
}
