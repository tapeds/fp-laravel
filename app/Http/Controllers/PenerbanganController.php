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
        $tanggal_perjalanan_input = $request->query('tanggal_perjalanan', Carbon::now()->format('Y-m-d'));
        $tanggal_perjalanan = Carbon::parse($tanggal_perjalanan_input)->format('Y-m-d');

        $maskapai = $request->query('maskapai', 'garuda_indonesia,air_asia,lion_air,japan_airlines,batik_air');
        $maskapai_array = explode(',', $maskapai);
        $maskapai_without_underscore = array_map(function ($name) {
            return str_replace('_', ' ', $name);
        }, $maskapai_array);

        $flights = Penerbangan::with(['maskapai', 'bandaraPenerbangans', 'bandaras'])
            ->whereHas('bandaras', function ($query) use ($asal) {
                $query->where('bandaras.kode', $asal)
                    ->where('bandara_penerbangans.tx_arah', 'berangkat');
            })
            ->whereHas('bandaras', function ($query) use ($tujuan) {
                $query->where('bandaras.kode', $tujuan)
                    ->where('bandara_penerbangans.tx_arah', 'kedatangan');
            })
            ->whereDate('jadwal_berangkat', $tanggal_perjalanan)
            ->whereHas('maskapai', function ($query) use ($maskapai_without_underscore) {
                $query->whereIn('name', $maskapai_without_underscore);
            })
            ->get();

        return view('penerbangan', ['daftar_penerbangan' => $flights, 'asal' => $asal, 'tujuan' => $tujuan, 'tanggal_perjalanan' => $tanggal_perjalanan, 'maskapai' => $maskapai]);
    }
}
