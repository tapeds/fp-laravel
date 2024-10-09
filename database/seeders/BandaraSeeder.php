<?php

namespace Database\Seeders;

use App\Models\Bandara;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BandaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bandara::Create([
            "name" => "Juanda Airport",
            "kode" => "SUB",
            "kota" => "surabaya"
        ]); 
        Bandara::Create([
            "name" => "Soekarno Hatta Airport",
            "kode" => "CGK",
            "kota" => "Jakarta"
        ]);
        Bandara::Create([
            "name" => "I Gusti Ngurah Rai Airport",
            "kode" => "DPS",
            "kota" => "Bali"
        ]);
        Bandara::Create([
            "name" => "Hang Nadim Airport",
            "kode" => "BTH",
            "kota" => "Batam"
        ]);
    }
}
