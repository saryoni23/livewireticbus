<?php

namespace App\Livewire\Kategori;

use App\Livewire\Forms\KategoriForm;
use App\Livewire\Kategori\KategoriTabel;
use App\Models\Kategori;
use Livewire\Attributes\On;
use Livewire\Component;

class KategoriEdit extends Component
{
    public KategoriForm $form;

    public $modalKategoriEdit = false;

    #[On('dispatch-kategori-table-edit')]
    public function set_kategori(Kategori $id){
        $this->form->setKategori($id);

        $this->modalKategoriEdit=true;
    }
    public function edit()
    {
        $this->validate();

        $update = $this->form->update();

        is_null($update)
        ? $this->dispatch('notify', title:'success', message:'Data Berhasil Update')
        :$this->dispatch('notify', title:'failed', message:'Data Gagal Update');

        $this->dispatch('dispatch-kategori-create-edit')->to(KategoriTabel::class);
    }
    public function render()
    {
        return view('livewire.kategori.kategori-edit');
    }
}