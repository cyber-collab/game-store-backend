<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

use function PHPUnit\Framework\callback;

class CollectionRun extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run';

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
        $numberCollection = collect([1,2,3,4,5,6,7,8,9, 10]);
        $bigNumberCollection = collect([10,20,30,40,44,50,60,70,80,90,100, 101]);
        $userCollection = collect([
            [
                'name' => 'Ivan',
                'age' => 23
            ],
            [
                'name' => 'Boris',
                'age' => 23
            ],
            [
                'name' => 'kate',
                'age' => 23
            ],
            [
                'name' => 'Vlados',
                'age' => 23
            ]
        ]);

        $collection = collect([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9],
        ]);

        $nameCollection = collect(['ivan', 'kate', 'ira']);
        $nameCollection2 = collect([20, 10, 30]);

//        User::chunk(100, function ($users) {
//
//        });

        $result = $userCollection->contains('name', 'Boris');

        dd($result);
    }
}
