<?php

namespace App\Livewire\Tiket;


use App\Livewire\Forms\TiketForm;
use App\Models\Kategori;
use App\Models\Rute;
use Livewire\Component;

class TiketCreate extends Component
{
    public TiketForm $form;

    public $modalTiketCreate = false;

    public function save(){

        $this->validate();
        try{
            $this->form->store();
            $this->dispatch('notify', title:'success', message:'Data Berhasil Disimpan');
            $this->dispatch('dispatch-tiket-create-save')->to(TiketTabel::class);
            $this->dispatch('set-reset');
        }catch(\Exception $e){
            $this->dispatch('notify', title:'failed', message:'Data Gagal Disimpan');
        }

    }  
    public function render()
    {

        return view('livewire.tiket.tiket-create',['rute' => Rute::all(), 'kategori'=> Kategori::all()]);
    }
}
