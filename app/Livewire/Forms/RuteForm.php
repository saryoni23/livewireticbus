<?php

namespace App\Livewire\Forms;

use App\Models\Rute;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RuteForm extends Form
{
    public ?Rute $rute;

    public $id;

    #[Rule('required|min:3', as: 'Kota_asal harus diisi /')]
    public $kota_asal;
    
    #[Rule('required|min:3', as: 'Kota_tujuan harus diisi /')]
    public $kota_tujuan;
    
    #[Rule('required|min:3', as: 'Gambar harus diisi/')]
    public $jam_berangkat;    

    // Properti untuk menyimpan status aktif
    public $is_active = 1;  

    public function setRute(Rute $rute){
        $active         = 1;
        $this->rute     = $rute;
    
        $this->kota_asal        = $rute->kota_asal;
        $this->kota_tujuan      = $rute->kota_tujuan;
        $this->jam_berangkat    = $rute->jam_berangkat;
        $this->is_active        = 1;
    }
    
    public function store()
    {
        // $this->validate();
        Rute::create($this->except('rute'));
        $this->reset();
    }
    
    public function update(){
        $this->validate();
        $this->rute->update($this->except('rute'));
    }
    

}
