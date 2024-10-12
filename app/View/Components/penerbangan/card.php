<?php

namespace App\View\Components\Penerbangan;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{   
    public string $href;
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
    public string $kodeBandaraKedatangan;
    public string $kotaBandaraKedatangan;
    public string $kodeBandaraKeberangkatan;
    public string $kotaBandaraKeberangkatan;
    


    public function __construct(
        string $href,
        int $harga,
        int $kapasitas,

        string $jadwalBerangkat,
        string $jadwalKedatangan,

        string $maskapaiName,
        string $maskapaiImg,

        string $arah,

        string $kodeBandaraKedatangan,
        string $kotaBandaraKedatangan,
        string $kodeBandaraKeberangkatan,
        string $kotaBandaraKeberangkatan
    ) {
        $this->href = $href;
        $this->jadwalBerangkat = $jadwalBerangkat;
        $this->jadwalKedatangan = $jadwalKedatangan;
        $this->harga = $harga;
        $this->kapasitas = $kapasitas;

        $this->maskapaiName = $maskapaiName;
        $this->maskapaiImg = $maskapaiImg;

        $this->arah = $arah;

        $this->kodeBandaraKedatangan = $kodeBandaraKedatangan;
        $this->kotaBandaraKedatangan = $kotaBandaraKedatangan;
        $this->kodeBandaraKeberangkatan = $kodeBandaraKeberangkatan;
        $this->kotaBandaraKeberangkatan = $kotaBandaraKeberangkatan;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.penerbangan.card');
    }
}
