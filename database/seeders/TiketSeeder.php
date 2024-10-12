<?php

namespace Database\Seeders;

use App\Models\Passenger;
use App\Models\Tiket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ticketsData = [
            [
                'user_id' => 1,
                'penerbangan_id' => 1,
                'passengers' => [
                    ['name' => 'John Doe', 'nik' => '12345678901'],
                    ['name' => 'Jane Smith', 'nik' => '12345678902'],
                    ['name' => 'Alice Johnson', 'nik' => '12345678903'],
                ],
            ],
            [
                'user_id' => 1,
                'penerbangan_id' => 2,
                'passengers' => [
                    ['name' => 'Bob Brown', 'nik' => '12345678904'],
                    ['name' => 'Carol White', 'nik' => '12345678905'],
                    ['name' => 'Dave Green', 'nik' => '12345678906'],
                ],
            ],
        ];

        foreach ($ticketsData as $ticketData) {
            $ticket = Tiket::create([
                'user_id' => $ticketData['user_id'],
                'penerbangan_id' => $ticketData['penerbangan_id'],
            ]);

            foreach ($ticketData['passengers'] as $passengerData) {
                Passenger::create([
                    'tiket_id' => $ticket->id,
                    'name' => $passengerData['name'],
                    'nik' => $passengerData['nik'],
                ]);
            }
        }
    }
}
