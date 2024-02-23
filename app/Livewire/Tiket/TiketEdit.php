<?php

namespace App\Livewire\Tiket;

use App\Livewire\Forms\TiketForm;
use App\Livewire\Tiket\TiketTabel;
use App\Models\Kategori;
use App\Models\Rute;
use App\Models\Tiket;
use Livewire\Attributes\On;
use Livewire\Component;

class TiketEdit extends Component
{
    public TiketForm $form;

    public $modalTiketEdit = false;

    #[On('dispatch-tiket-table-edit')]
    public function set_tiket(Tiket $id){
        $this->form->setTiket($id);

        $this->modalTiketEdit=true;
    }
    public function edit()
    {
        $this->validate();
        try{
            $update = $this->form->update();
            $this->dispatch('notify', title:'success', message:'Data Berhasil Update');
            $this->dispatch('dispatch-tiket-create-edit')->to(TiketTabel::class);
        }catch(\Exception $e){
            $this->dispatch('notify', title:'failed', message:'Data Gagal Update');
        }


        
    }
    public function render()
    {
        return view('livewire.tiket.tiket-edit',['rute' => Rute::all(), 'kategori'=> Kategori::all()]);
    }
}
