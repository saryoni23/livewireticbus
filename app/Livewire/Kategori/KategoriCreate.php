<?php

namespace App\Livewire\Kategori;


use App\Livewire\Forms\KategoriForm;
use Livewire\Component;

class KategoriCreate extends Component
{
    public KategoriForm $form;

    public $modalKategoriCreate = false;

    public function save(){

        $this->validate();

        $simpan = $this->form->store();

        is_null($simpan)
        ? $this->dispatch('notify', title:'success', message:'Data Berhasil Disimpan')
        :$this->dispatch('notify', title:'failed', message:'Data Gagal Disimpan');

        $this->dispatch('dispatch-kategori-create-save')->to(KategoriTabel::class);
    }

    public function render()
    {
        return view('livewire.kategori.kategori-create');
    }
}
