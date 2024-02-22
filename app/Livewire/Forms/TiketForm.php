<?php

namespace App\Livewire\Forms;

use App\Models\Kategori;
use App\Models\Rute;
use App\Models\Tiket;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TiketForm extends Form
{
    public ?Tiket $tiket;

    public $id;

    // #[Rule('required', as: 'User')]
    // public $user;
    
    #[Rule('required', as: 'Kategori')]
    public $kategori;
    
    #[Rule('required', as: 'Rute')]
    public $rute;

    public function setTiket(Tiket $tiket){
        $this->tiket = $tiket;

        $this->id       = $tiket->id;
        // $this->user     = $tiket->user->id;
        $this->kategori = $tiket->kategori->id;
        $this->rute     = $tiket->rute->id;
    }

    // public function setUser(): array
    // {
    //     $setUser    = [];
    //     $user       = User::select('id','name')->get();
    //     foreach ($user as $ind => $data) {
    //         $setUser[$ind] = ['id' => $data->id,'name'=>$data->name];
    //     }
    //     return $setUser;
    // }
    

    public function setKategori(): array
    {
        $setKategori    = [];
        $Kategoris      = Kategori::select('id','name')->get();
        foreach ($Kategoris as $ind => $data) {
            $setKategori[$ind] = ['id' => $data->id,'name'=>$data->name];
        }
        return $setKategori;
    }

    public function setRute(): array
    {
        $setRute    = [];
        $Rutes      = Rute::select('id','kota_asal')->where('kategori_id', $this->kategori)->get();
        foreach ($Rutes as $ind => $data) {
            $setRute[$ind] = ['id' => $data->id,'kota_asal'=>$data->kota_asal];
        }
        return $setRute;
    }


    public function store():void
    {
        Tiket::create([
            // 'user_id'       => $this->user,
            'kategori_id'   => $this->kategori,
            'rute_id'       => $this->rute,
        ]);
    }

    public function update()
    {
        $this->tiket->where('id', $this->id)
            ->update([
            'user_id'       => $this->user,
            'kategori_id'   => $this->kategori,
            'rute_id'       => $this->rute,
            ]);
    }
}
