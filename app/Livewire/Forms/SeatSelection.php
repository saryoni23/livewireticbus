<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;  
use Livewire\Component;

class SeatSelection extends Form
{

        public $jumlahKursi;
        public $nomorKursi = [];
    
        public function updatedJumlahKursi($value)
        {
            $this->nomorKursi = range(1, $value);
        }
    
        public function render()
        {
            return view('livewire.seat-selection');
        }

}
