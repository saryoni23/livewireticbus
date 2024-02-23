<?php

namespace App\Livewire\Transaksi;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class TransaksiIndex extends Component
{
    #[Title('Transaksi')]
    public function render():View
    {
        return view('livewire.transaksi.transaksi-index');
    }
}
