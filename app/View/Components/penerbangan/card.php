<?php

namespace App\View\Components\Penerbangan;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{   
    // table penerbangan
    public string $jadwalBerangkat;
    public string $jadwalKedatangan;
    public int $harga;
    public int $kapasitas;

    // table maskapai
    public string $maskapaiName;
    public string $maskapaiImg;

    // table bandara_penerbangan
    public string $arah;

    // table bandara
    public string $bandaraName;
    public string $bandaraKode;
    public string $bandaraKota;


    public function __construct(
        string $jadwalBerangkat,
        string $jadwalKedatangan,
        int $harga,
        int $kapasitas,

        string $maskapaiName,
        string $maskapaiImg,

        string $arah,
        
        string $bandaraName,
        string $bandaraKode,
        string $bandaraKota
    ) {
        $this->jadwalBerangkat = $jadwalBerangkat;
        $this->jadwalKedatangan = $jadwalKedatangan;
        $this->harga = $harga;
        $this->kapasitas = $kapasitas;

        $this->maskapaiName = $maskapaiName;
        $this->maskapaiImg = $maskapaiImg;

        $this->arah = $arah;

        $this->bandaraName = $bandaraName;
        $this->bandaraKode = $bandaraKode;
        $this->bandaraKota = $bandaraKota;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.penerbangan.card');
    }
}
