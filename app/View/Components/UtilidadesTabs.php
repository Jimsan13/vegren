<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UtilidadesTabs extends Component
{
    public $socios;
    public $ingresos;
    public $diferencias;

    public function __construct($socios, $ingresos, $diferencias)
    {
        $this->socios = $socios;
        $this->ingresos = $ingresos;
        $this->diferencias = $diferencias;
    }

    public function render()
    {
        return view('components.utilidades-tabs');
    }
}
