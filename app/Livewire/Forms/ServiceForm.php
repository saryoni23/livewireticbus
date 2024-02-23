<?php

namespace App\Livewire\Forms;

use App\Models\Car;
use App\Models\Kategori;
use App\Models\Service;
use App\Models\Type;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ServiceForm extends Form
{
    public ?Service $service;
    public $id;
    #[Rule('required', as: 'Kategori')]
    public $kategori;
    #[Rule('required', as: 'car')]
    public $car;
    #[Rule('required', as: 'type')]
    public $type;
    
    public function setService(Service $service):void
    {
        $this->service      = $service;

        $this->id           = $service->id;
        $this->kategori     = $service->kategori->id;
        $this->type         = $service->type->id;
        $this->car         = $service->type->car->id;
    }

    public function setKategori(): array
    {
        $setKategori    = [];
        $Kategoris      = Kategori::select('id','name')->get();
        foreach ($Kategoris as $ind => $data) {
            $setKategori[$ind] = ['id' => $data->id,'name'=>$data->name];
        }
        return $setKategori;
    }
    public function setCar(): array
    {
        $setCar   = [];
        $cars      = Car::select('id','name')->get();
        foreach ($cars as $ind => $data) {
            $setCar[$ind] = ['id' => $data->id,'name'=>$data->name];
        }
        return $setCar;
    }
    public function setType(): array
    {
        $setType   = [];
        $types      = Type::select('id','name')->where('car_id', $this->car)->get();
        foreach ($types as $ind => $data) {
            $setType[$ind] = ['id' => $data->id,'name'=>$data->name];
        }
        return $setType;
    }
    public function store():void
    {
        Service::create([
            'kategori_id'       => $this->kategori,
            'type_id'       => $this->type,
        ]);
    }

    public function update()
    {
        $this->service->where('id', $this->id)
            ->update([
            'kategori_id'   => $this->kategori,
            'type_id'   => $this->type,
        ]);
    }
}
