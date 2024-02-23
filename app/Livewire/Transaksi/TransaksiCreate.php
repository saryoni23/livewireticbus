<?php

namespace App\Livewire\Transaksi;


use App\Livewire\Forms\TransaksiForm;
use App\Models\Kategori;
use App\Models\Rute;
use App\Models\Tiket;
use App\Models\User;
use Livewire\Component;

class TransaksiCreate extends Component
{
    public TransaksiForm $form;

    public $modalTransaksiCreate = false;

    public function save(){

        $this->validate();

        $simpan = $this->form->store();

        is_null($simpan)
        ? $this->dispatch('notify', title:'success', message:'Data Berhasil Disimpan')
        :$this->dispatch('notify', title:'failed', message:'Data Gagal Disimpan');

        $this->dispatch('dispatch-transaksi-create-save')->to(TransaksiTabel::class);
    }

    public function render()
    {
        return view('livewire.transaksi.transaksi-create',['tiket'=>Tiket::all(),'user'=>User::all(),'rute' => Rute::all(), 'kategori'=> Kategori::all()]);
    }
}
