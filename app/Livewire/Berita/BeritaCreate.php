<?php

namespace App\Livewire\Berita;


use App\Livewire\Forms\BeritaForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class BeritaCreate extends Component
{
    use WithFileUploads;

    public $image;

    public BeritaForm $form;

    public $modalBeritaCreate = false;

    public function save()
    {
        $this->validate([
            'form.image' => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);
    
        $imageName = $this->form->image->store('public/posts');
    
        $this->form->image = $imageName;
    
        // Remove the redundant validation call here
    
        $simpan = $this->form->store();
    
        if ($simpan) {
            $this->emit('notify', ['title' => 'success', 'message' => 'Data Berhasil Disimpan']);
        } else {
            $this->emit('notify', ['title' => 'failed', 'message' => 'Data Gagal Disimpan']);
        }
    
        $this->emit('dispatch-berita-create-save');
    }
    

    public function render()
    {
        return view('livewire.berita.berita-create');
    }
}
