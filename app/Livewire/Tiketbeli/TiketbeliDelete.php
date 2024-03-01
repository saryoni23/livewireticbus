<?php

namespace App\Livewire\Tiketbeli;

use App\Livewire\TiketBeli\TiketBeliTabel;
use App\Models\Tiket;
use App\Models\TiketBeli;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class  TiketBeliDelete extends Component
{
    #[Locked]
    public $id;
    #[Locked]
    public $nama;

    public $modalTiketBeliDelete = false;

    #[On('dispatch-tiketbeli-table-delete')]
    public function set_tiketbeli($id, $nama){
        $this->id       = $id;
        $this->nama    = $nama;

        $this->modalTiketBeliDelete= true;
    }

    public function del(){

        $tiketbeli = TiketBeli::find($this->id);
        if (!$tiketbeli) {
            $this->dispatch('notify', title: 'failed', message: 'Data tidak ditemukan');
            return;
        }

        $delete = $tiketbeli->delete();

        if ($delete) {
            // Tambahkan jumlah tiket
            $tiket = Tiket::find($tiketbeli->tiket_id);
            if ($tiket) {
                $tiket->jumlah_tiket += $tiketbeli->jumlah_kursi;
                $tiket->save();
            }

            $this->dispatch('dispatch-tiketbeli-delete-del')->to(TiketBeliTabel::class);

            $this->dispatch('notify', title: 'success', message: 'Data Berhasil Dihapus');
        } else {
            $this->dispatch('notify', title: 'failed', message: 'Data Gagal Dihapus');
        }

        $this->modalTiketBeliDelete = false;

    }

    public function render()
    {
        return view('livewire.tiketbeli.tiketbeli-delete');
    }
}
