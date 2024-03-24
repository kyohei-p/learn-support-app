<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories_name = ["プログラミング", "数学", "英語"];

        foreach($categories_name as $name){
            DB::table('categories')->insert([
                'name' => $name,
            ]);
        }
    }
}
