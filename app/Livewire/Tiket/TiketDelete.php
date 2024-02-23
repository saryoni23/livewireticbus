<?php

namespace App\Livewire\Tiket;

use App\Livewire\Tiket\TiketTabel;
use App\Models\Tiket;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class  TiketDelete extends Component
{   
    #[Locked]
    public $id;
    #[Locked]
    public $nama_tiket;

    public $modalTiketDelete = false;

    #[On('dispatch-tiket-table-delete')]
    public function set_tiket($id, $nama){
        $this->id       = $id;
        $this->nama_tiket    = $nama;

        $this->modalTiketDelete= true;
    }

    public function del()
    {
        try{
            $del = Tiket::destroy($this->id);
            $this->dispatch('notify', title:'success', message:'Data Berhasil Dihapus');

            $this->modalTiketDelete=false;

            $this->dispatch('dispatch-tiket-delete-del')->to(TiketTabel::class);
        }catch(\Exception $e){
            $this->dispatch('notify', title:'failed', message:'Data Gagal Dihapus');
        }
    }

    public function render()
    {
        return view('livewire.tiket.tiket-delete');
    }
}
