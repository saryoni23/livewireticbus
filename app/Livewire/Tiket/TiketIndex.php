<?php

namespace App\Livewire\Tiket;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class TiketIndex extends Component
{
    #[Title('Tiket')]
    public function render():View
    {
        return view('livewire.tiket.tiket-index');
    }
}
