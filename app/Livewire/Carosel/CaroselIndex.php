<?php

namespace App\Livewire\Carosel;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class CaroselIndex extends Component
{
    #[Title('Berita')]
    public function render():View
    {
        return view('livewire.carosel.carosel-index');
    }
}
