<?php

namespace App\Http\Controllers;

use App\Models\Penerbangan;
use App\Models\Tiket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function Pesanan()
    {
        $user_id = Auth::id();

        $flights = Penerbangan::with([
            'tikets.user',
            'maskapai',
        ])
            ->whereHas('tikets', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })
            ->get();

        return view('pesanan', ['daftar_penerbangan' => $flights]);
    }

    public function Detail(Request $request, $id)
    {
        $user_id = Auth::id();

        $pesanan = Tiket::with([
            'passengers',
            'penerbangan.maskapai',
            'penerbangan.bandaraPenerbangans',
            'penerbangan.bandaras'
        ])
            ->where('penerbangan_id', $id)
            ->where('user_id', $user_id)
            ->first();

        return view('detail-pesanan', ['detail' => $pesanan]);
    }
}
