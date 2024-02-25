<?php

namespace App\Livewire\Berita;


use App\Livewire\Forms\BeritaForm;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;


class BeritaCreate extends Component
{
    use WithFileUploads;
    public BeritaForm $form;

    public $modalBeritaCreate = false;

    public function save()
    {
        $this->form->user_id = Auth::id(); // Akses properti user_id dari objek $form
        
        $this->form->validate(); // Perlu diubah dari $this->validate() menjadi $this->form->validate()
    
        $simpan = $this->form->store();
    
        is_null($simpan)
        ? $this->dispatch('notify', ['title' => 'success', 'message' => 'Data Berhasil Disimpan'])
        : $this->dispatch('notify', ['title' => 'failed', 'message' => 'Data Gagal Disimpan']);
    
        $this->dispatch('dispatch-berita-create-save')->to(BeritaTabel::class);
    }
    public function render()
    {
        return view('livewire.berita.berita-create');
    }
}
