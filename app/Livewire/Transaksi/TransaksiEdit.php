<?php

namespace App\Livewire\Transaksi;

use App\Livewire\Forms\TransaksiForm;
use App\Livewire\Transaksi\TransaksiTabel;
use App\Models\Transaksi;
use Livewire\Attributes\On;
use Livewire\Component;

class TransaksiEdit extends Component
{
    public TransaksiForm $form;

    public $modalTransaksiEdit = false;

    #[On('dispatch-transaksi-table-edit')]
    public function set_transaksi(Transaksi $id){
        $this->form->setTransaksi($id);

        $this->modalTransaksiEdit=true;
    }
    public function edit()
    {
        $this->validate();

        $update = $this->form->update();

        is_null($update)
        ? $this->dispatch('notify', title:'success', message:'Data Berhasil Update')
        :$this->dispatch('notify', title:'failed', message:'Data Gagal Update');

        $this->dispatch('dispatch-transaksi-create-edit')->to(TransaksiTabel::class);
    }
    public function render()
    {
        return view('livewire.transaksi.transaksi-edit');
    }
}
