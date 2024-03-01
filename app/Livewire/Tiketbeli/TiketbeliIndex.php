<?php

namespace App\Livewire\Tiketbeli;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class TiketbeliIndex extends Component
{
    #[Title('Tiket Beli')]
    public function render():View
    {
        return view('livewire.tiketbeli.tiketbeli-index');
    }
}
