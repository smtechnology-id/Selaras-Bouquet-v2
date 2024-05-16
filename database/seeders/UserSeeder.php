<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'User',
            'level' => 'user',
            'email' => 'user@mail.com',
            'password' => Hash::make('xEYnws6y'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
