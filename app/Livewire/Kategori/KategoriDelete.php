<?php

namespace App\Livewire\Kategori;

use App\Livewire\Kategori\KategoriTabel;
use App\Models\Kategori;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class  KategoriDelete extends Component
{   
    #[Locked]
    public $id;
    #[Locked]
    public $name;


    public $modalKategoriDelete = false;

    #[On('dispatch-kategori-table-delete')]
    public function set_kategori($id,$name){
        $this->id       = $id;
        $this->name       = $name;

        $this->modalKategoriDelete= true;
    }

    public function del(){

        $del = Kategori::destroy($this->id);

        ($del)
        ? $this->dispatch('notify', title:'success', message:'Data Berhasil Dihapus')
        :$this->dispatch('notify', title:'failed', message:'Data Gagal Dihapus');

        $this->modalKategoriDelete=false;

        $this->dispatch('dispatch-kategori-delete-del')->to(KategoriTabel::class);
    }

    public function render()
    {
        return view('livewire.kategori.kategori-delete');
    }
}
