<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penerbangan;
use App\Models\Bandara;

class PenerbanganBandaraSeeder extends Seeder
{
    public function run()
    {
        $penerbangans = Penerbangan::all();
        $bandaras = Bandara::all();

        if ($penerbangans->isEmpty() || $bandaras->count() < 2) {
            return;
        }

        foreach ($penerbangans as $penerbangan) {
            $selectedBandaras = $bandaras->random(2);

            $penerbangan->bandaras()->attach($selectedBandaras->pluck('id')->toArray());
        }
    }
}
