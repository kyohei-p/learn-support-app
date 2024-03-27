<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use DateTime;

class RecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('records')->insert([
            [
                'title' => 'sample1',
                'content' => 'Hello World!',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'category_id' => 1
            ],
            [
                'title' => 'sample2',
                'content' => 'How are you doing?',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'category_id' => 3
            ],
            [
                'title' => 'sample3',
                'content' => '指数関数 f(x)=2^x',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'category_id' => 2
            ]
        ]);
    }
}
