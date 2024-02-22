<?php

namespace App\Livewire\Berita;

use App\Livewire\Berita\BeritaTabel;
use App\Models\Berita;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class  BeritaDelete extends Component
{   
    #[Locked]
    public $id;
    #[Locked]
    public $judul;

    public $modalBeritaDelete = false;

    #[On('dispatch-berita-table-delete')]
    public function set_berita($id, $judul){
        $this->id       = $id;
        $this->judul    = $judul;

        $this->modalBeritaDelete= true;
    }

    public function del(){

        $del = Berita::destroy($this->id);

        ($del)
        ? $this->dispatch('notify', title:'success', message:'Data Berhasil Dihapus')
        :$this->dispatch('notify', title:'failed', message:'Data Gagal Dihapus');

        $this->modalBeritaDelete=false;

        $this->dispatch('dispatch-berita-delete-del')->to(BeritaTabel::class);
    }

    public function render()
    {
        return view('livewire.berita.berita-delete');
    }
}
