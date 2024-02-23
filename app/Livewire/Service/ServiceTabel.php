<?php

namespace App\Livewire\Service;

use App\Livewire\Forms\ServiceForm;
use App\Models\Service;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceTabel extends Component
{
    use WithPagination;
    use WithSorting;
    public ServiceForm $form;
    public    
    $paginate   =10,
    $sortBy     ='services.id',
    $sortDirection = 'desc';
    #[On('dispatch-service-create-save')]
    #[On('dispatch-service-create-edit')]
    #[On('dispatch-service-delete-del')]
    public function render()
    {
        return view('livewire.service.service-tabel', [
            'data' => Service::join('tbl_kategori', 'tbl_kategori.id', 'services.kategory_id')
                ->join('types', 'types.id', 'services.type_id')
                ->join('cars', 'cars.id', 'types.car_id')
                ->where('services.id', 'like', '%' . $this->form->id . '%')
                ->where('tbl_kategori.name', 'like', '%' . $this->form->kategori . '%')
                ->where('cars.name', 'like', '%' . $this->form->car . '%')
                ->where('types.name', 'like','%'.$this->form->type.'%')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate),
        ]);
    }
}
