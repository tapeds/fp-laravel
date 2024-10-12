<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name' => 'testing account',
            'email' => 'testing@gmail.com',
            'password' => 'testing123',
            'nik' => '1234567890123456'
        ]);
        User::create([
            'id' => 2,
            'name' => 'testing account',
            'email' => 'testing2@gmail.com',
            'password' => 'testing123',
            'nik' => '1234567890123456'
        ]);
        User::create([
            'id' => 3,
            'name' => 'admin account',
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
            'nik' => '1234567890123456',
            'role' => 'admin'
        ]);
    }
}
