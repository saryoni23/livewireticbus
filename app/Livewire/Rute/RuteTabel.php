<?php

namespace App\Livewire\Rute;

use App\Livewire\Forms\RuteForm;
use App\Models\Rute;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class RuteTabel extends Component
{
    use WithPagination;
    use WithSorting;
    public RuteForm $form;
    public    
    $paginate   =5,
    $sortBy     ='tbl_rute.id',
    $sortDirection = 'desc';
    #[On('dispatch-rute-create-save')]
    #[On('dispatch-rute-create-edit')]
    #[On('dispatch-rute-delete-del')]
    public function render()
    {
        return view('livewire.rute.rute-tabel',[
            'data' => Rute::where('id', 'like','%'.$this->form->id.'%')
            ->where('kota_asal', 'like','%'.$this->form->kota_asal.'%')
            ->where('kota_tujuan', 'like','%'.$this->form->kota_tujuan.'%')
            ->where('jam_berangkat', 'like','%'.$this->form->jam_berangkat.'%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate),

        ]);
    }
}
