<?php

namespace App\Livewire;

use App\Livewire\Forms\BeritaForm;
use App\Livewire\BeritaTable;
use App\Models\Berita;
use Livewire\Attributes\On;
use Livewire\Component;

class BeritaEdit extends Component
{
    public BeritaForm $form;

    public $modalBeritaEdit = false;

    #[On('dispatch-berita-table-edit')]
    public function set_berita(Berita $id){
        $this->form->setBerita($id);

        $this->modalBeritaEdit=true;
    }
    public function edit()
    {
        $this->validate();

        $update = $this->form->update();

        is_null($update)
        ? $this->dispatch('notify', title:'success', message:'Data Berhasil Update')
        :$this->dispatch('notify', title:'failed', message:'Data Gagal Update');

        $this->dispatch('dispatch-berita-create-edit')->to(BeritaTable::class);
    }
    public function render()
    {
        return view('livewire.berita-edit');
    }
}
