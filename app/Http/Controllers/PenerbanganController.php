<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Penerbangan;
use Illuminate\Http\Request;

class PenerbanganController extends Controller
{
    public function search(Request $request)
    {
        $asal = $request->query('asal', 'CGK');
        $tujuan = $request->query('tujuan', 'SUB');
        $tanggal_perjalanan = $request->query('tanggal_perjalanan', Carbon::now()->format('Y-m-d'));
        $maskapai = $request->query('maskapai', 'garuda_indonesia,air_asia,lion_air,japan_airlines,batik_air');

        $flights = Penerbangan::with(['maskapai', 'bandaraPenerbangans', 'bandaras']) // Eager load relationships
            ->whereHas('bandaras', function ($query) use ($asal, $tujuan) {
                $query->where(function ($q) use ($asal) {
                    $q->where('bandaras.kode', $asal)
                        ->where('bandara_penerbangans.tx_arah', 'berangkat');
                })->orWhere(function ($q) use ($tujuan) {
                    $q->where('bandaras.kode', $tujuan)
                        ->where('bandara_penerbangans.tx_arah', 'kedatangan');
                });
            })
            ->whereDate('jadwal_berangkat', $tanggal_perjalanan)
            ->get();

        return view('penerbangan', ['daftar_penerbangan' => $flights, 'asal' => $asal, 'tujuan' => $tujuan, 'tanggal_perjalanan' => $tanggal_perjalanan, 'maskapai' => $maskapai]);
    }
}
