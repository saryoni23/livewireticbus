<?php

namespace App\Livewire\Transaksi;

use App\Livewire\Transaksi\TransaksiTabel;
use App\Models\Tiket;
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

        $transaksi = Transaksi::find($this->id);
        if (!$transaksi) {
            $this->dispatch('notify', title: 'failed', message: 'Data tidak ditemukan');
            return;
        }

        $delete = $transaksi->delete();

        if ($delete) {
            // Tambahkan jumlah tiket
            $tiket = Tiket::find($transaksi->tiket_id);
            if ($tiket) {
                $tiket->jumlah_tiket += $transaksi->jumlah_kursi;
                $tiket->save();
            }
            
            $this->dispatch('notify', title: 'success', message: 'Data Berhasil Dihapus');
        } else {
            $this->dispatch('notify', title: 'failed', message: 'Data Gagal Dihapus');
        }

        $this->modalTransaksiDelete = false;

        $this->dispatch('dispatch-transaksi-delete-del')->to(TransaksiTabel::class);
    }

    public function render()
    {
        return view('livewire.transaksi.transaksi-delete');
    }
}