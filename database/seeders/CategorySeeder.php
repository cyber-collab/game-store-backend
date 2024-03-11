<?php

namespace Database\Seeders;

use App\Models\Category\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [];
        $cName  = 'Без категории';
        $categories[] =  [
            'title'  => $cName,
            'slug'   => Str::slug($cName),
            'parent_id'=>0,
            'status'   => rand(0, 1),
        ];
        for ($i =1; $i<=10; $i++ ){
            $cName = 'Категория  #' .$i;
            $parent_id =  ($i>4) ? rand(1,4):1;

            $categories[] = [
                'title'    =>$cName,
                'slug'     =>Str::slug($cName),
                'parent_id'=>$parent_id,
                'status'   => rand(0, 1),
            ];
        }
        \DB::table('blog_categories')->insert($categories);
    }
}
