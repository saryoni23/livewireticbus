<?php

namespace App\Livewire\Forms;

use App\Models\Berita;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BeritaForm extends Form
{
    public ?Berita $berita;

    public $id;

    #[Rule('required|min:3', as: 'Judul harus diisi /')]
    public $judul;
    
    #[Rule('required|min:3', as: 'Isi harus diisi /')]
    public $isi;
    
    #[Rule('required|min:3', as: 'Gambar harus diisi/')]
    public $image;
    
    public function setBerita(Berita $berita){
        $this->berita   = $berita;
    
        $this->judul    = $berita->judul;
        $this->isi      = $berita->isi;
        $this->image    = $berita->image;
    }
    
    public function store()
    {
        // $this->validate();
        Berita::create($this->except('berita'));
        $this->reset();
    }
    
    public function update(){
        $this->validate();
        $this->berita->update($this->except('berita'));
    }
    

}
