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
        $this->form->user_id = Auth::id(); // Mengatur nilai user_id dari objek $form

        $this->form->validate(
            [
                'judul' => ['required', 'min:3'],
                'isi' => ['required', 'min:3'],
                'image' => ['nullable', 'image', 'max:1024'], // Buat gambar opsional dengan menambahkan 'nullable'
            ]
        ); // Menggunakan metode validate() dari objek $form

        $simpan = $this->form->store();

        ($simpan)
        ? $this->dispatch('notify', title:'failed', message:'Data gagal disimpan')
        :$this->dispatch('notify', title:'success', message:'Data berhail Disimpan');

        $this->dispatch('dispatch-berita-create-save')->to(BeritaTabel::class);
        $this->modalBeritaCreate=false;

    }

    public function render()
    {
        return view('livewire.berita.berita-create');
    }
}
