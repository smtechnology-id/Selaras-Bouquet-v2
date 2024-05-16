<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'level' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('xEYnws6y'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
