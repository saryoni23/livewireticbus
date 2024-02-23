<?php

namespace App\Livewire\Service;


use App\Livewire\Forms\ServiceForm;
use App\Models\Service;
use Livewire\Component;

class ServiceCreate extends Component
{
    public ServiceForm $form;

    public $modalServiceCreate = false;

    public function save(){

        $this->validate();
        try{
            $this->form->store();
            $this->dispatch('notify', title:'success', message:'Data Berhasil Disimpan');
            $this->dispatch('dispatch-tiket-create-save')->to(Service::class);
            $this->dispatch('set-reset');
        }catch(\Exception $e){
            $this->dispatch('notify', title:'failed', message:'Data Gagal Disimpan');
        }

    }

    public function kategoriChange()
    {
        $this->dispatch('set-kategori-create', id:$this->form->kategori, data: $this->form->setKategori());

        $this->resetErrorBag();
    }



    public function render()
    {
        $this->dispatch('set-kategori-create', id:$this->form->kategori, data: $this->form->setKategori());
        $this->dispatch('set-car-create', id:$this->form->car, data: $this->form->setCar());

        return view('livewire.service.service-create');
    }
}
