<?php

namespace App\Livewire;


use App\Models\Berita;
use App\Livewire\Forms\BeritaForm;
use Livewire\Component;

class BeritaCreate extends Component
{
    public BeritaForm $form;

    public $modalBeritaCreate = false;

    public function save(){

        $this->validate();

        $simpan = $this->form->store();

        is_null($simpan)
        ? $this->dispatch('notify', title:'success', message:'Data Berhasil Disimpan')
        :$this->dispatch('notify', title:'failed', message:'Data Gagal Disimpan');

        $this->dispatch('dispatch-berita-create-save')->to(BeritaTabel::class);
    }

    public function render()
    {
        return view('livewire.berita-create');
    }
}
