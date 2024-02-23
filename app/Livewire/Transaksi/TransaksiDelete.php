<?php

namespace App\Livewire\Transaksi;

use App\Livewire\Transaksi\TransaksiTabel;
use App\Models\Transaksi;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class  TransaksiDelete extends Component
{   
    #[Locked]
    public $id;
    #[Locked]
    public $nama;

    public $modalTransaksiDelete = false;

    #[On('dispatch-transaksi-table-delete')]
    public function set_transaksi($id, $nama){
        $this->id       = $id;
        $this->nama    = $nama;

        $this->modalTransaksiDelete= true;
    }

    public function del(){

        $del = Transaksi::destroy($this->id);

        ($del)
        ? $this->dispatch('notify', title:'success', message:'Data Berhasil Dihapus')
        :$this->dispatch('notify', title:'failed', message:'Data Gagal Dihapus');

        $this->modalTransaksiDelete=false;

        $this->dispatch('dispatch-transaksi-delete-del')->to(TransaksiTabel::class);
    }

    public function render()
    {
        return view('livewire.transaksi.transaksi-delete');
    }
}
