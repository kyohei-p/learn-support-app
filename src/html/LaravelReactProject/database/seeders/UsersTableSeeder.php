<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'sample1',
            'email' => 'sample1@example.com',
            'password' => Hash::make('password1'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}
