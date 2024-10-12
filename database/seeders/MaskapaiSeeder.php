<?php

namespace Database\Seeders;

use App\Models\Maskapai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaskapaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Maskapai::create([
            'name' => 'Garuda Indonesia',
            'img' => 'https://github.com/user-attachments/assets/e890d1c4-f852-4392-9a70-9758c76b7569',
        ]);
        Maskapai::create([
            'name' => 'Air Asia',
            'img' => 'https://github.com/user-attachments/assets/5edefc64-59ad-4454-bc88-6ebc49c2f777',
        ]);
        Maskapai::create([
            'name' => 'Lion Air',
            'img' => 'https://github.com/user-attachments/assets/1a182d9f-309b-4237-ba3a-3b2937d4e5fb',
        ]);
        Maskapai::create([
            'name' => 'Japan Airlines',
            'img' => 'https://github.com/user-attachments/assets/ec3c5ac2-3a86-4137-922f-8e9099a88e16',
        ]);
        Maskapai::create([
            'name' => 'Batik Air',
            'img' => 'https://github.com/user-attachments/assets/34d423fc-ca07-46ce-aba0-da57d01a46d8',
        ]);
    }
}
