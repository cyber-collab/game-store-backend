<?php

namespace App\Console\Commands;

use App\Models\HeroImage;
use App\Models\HomeBlockHero;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImportHomeHero extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:home-hero';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import home hero block form json';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $jsonFile = Storage::path('public/api-home-hero.json');
        $heroBlock = json_decode(file_get_contents($jsonFile), true);

        foreach ($heroBlock['data'] as $hero) {
            $heroBlock = HomeBlockHero::updateOrCreate([
                    'title' => $hero['title'],
                    'subtitle' => $hero['subtitle'],
                    'description' => $hero['description'],
                ]);

            $this->createImages($heroBlock, $hero['img-set']);
        }
    }

    private function createImages(HomeBlockHero $blockHero, array $images): void
    {
        foreach ($images as $image) {
            HeroImage::updateOrCreate(
                [
                    'home_block_hero_id' => $blockHero['id'],
                    'image' => $image['link']
                ]
            );
        }
    }
}
