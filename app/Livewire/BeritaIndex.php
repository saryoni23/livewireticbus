<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class BeritaIndex extends Component
{
    #[Title('Berita')]
    public function render():View
    {
        return view('livewire.berita-index');
    }
}
