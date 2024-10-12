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
        $tanggal_perjalanan = $request->query('tanggal_perjalanan', Carbon::now()->format('m/d/Y'));
        $date = Carbon::createFromFormat('m/d/Y', $tanggal_perjalanan)->format('Y-m-d');

        $flights = Penerbangan::whereHas('bandaras', function ($query) use ($asal, $tujuan) {
            $query->where(function ($q) use ($asal) {
                $q->where('bandaras.kode', $asal)
                    ->where('bandara_penerbangans.tx-arah', 'berangkat');
            })->orWhere(function ($q) use ($tujuan) {
                $q->where('bandaras.kode', $tujuan)
                    ->where('bandara_penerbangans.tx-arah', 'kedatangan');
            });
        })->whereDate('jadwal_berangkat', $date)
            ->get();

        return view('penerbangan', ['daftar_penerbangan' => $flights]);
    }
}
