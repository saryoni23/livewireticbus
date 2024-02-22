<?php

namespace App\Livewire\Forms;

use App\Models\Kategori;
use Livewire\Attributes\Rule;
use Livewire\Form;

class KategoriForm extends Form
{
    public ?Kategori $kategori;

    public $id;

    #[Rule('required|min:3', as: 'Name Kategori harus diisi /')]
    public $name;
    
    
    public function setKategori(Kategori $kategori){
        $this->kategori   = $kategori;
    
        $this->name    = $kategori->name;
    }
    
    public function store()
    {
        // $this->validate();
        Kategori::create($this->except('kategori'));
        $this->reset();
    }
    
    public function update(){
        $this->validate();
        $this->kategori->update($this->except('kategori'));
    }
    

}