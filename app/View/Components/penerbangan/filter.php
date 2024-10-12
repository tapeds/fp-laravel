<?php

namespace App\View\Components\Penerbangan;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Filter extends Component
{
    public string $maskapai;

    public function __construct(string $maskapai)
    {
        $this->maskapai = $maskapai;
    }

    public function render(): View|Closure|string
    {
        return view('components.penerbangan.filter');
    }
}
