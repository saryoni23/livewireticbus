<?php

namespace App\Livewire\Kategori;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class KategoriIndex extends Component
{
    #[Title('Kategori')]
    public function render():View
    {
        return view('livewire.kategori.kategori-index');
    }
}
