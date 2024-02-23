<?php

namespace App\Livewire\Service;

use App\Livewire\Service\ServiceTabel;
use App\Models\Service;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class  ServiceDelete extends Component
{   
    #[Locked]
    public $id;
    #[Locked]
    public $judul;

    public $modalServiceDelete = false;

    #[On('dispatch-service-table-delete')]
    public function set_service($id, $judul){
        $this->id       = $id;
        $this->judul    = $judul;

        $this->modalServiceDelete= true;
    }

    public function del(){

        $del = Service::destroy($this->id);

        ($del)
        ? $this->dispatch('notify', title:'success', message:'Data Berhasil Dihapus')
        :$this->dispatch('notify', title:'failed', message:'Data Gagal Dihapus');

        $this->modalServiceDelete=false;

        $this->dispatch('dispatch-service-delete-del')->to(ServiceTabel::class);
    }

    public function render()
    {
        return view('livewire.service.service-delete');
    }
}
