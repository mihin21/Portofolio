<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
        ->insert([
            'email' => 'hugues@gmail.com',
            'password' => Hash::make('test'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
