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

    #[Rule('required', as: 'Kategori')]
    public $kategori;
    
    #[Rule('required', as: 'Rute')]
    public $rute;
    
    #[Rule('required', as: 'Nama Tiket')]
    public $nama_tiket;
    
    #[Rule('required', as: 'Nama Supir')]
    public $nama_supir;
    #[Rule('required', as: 'Harga Satuan Tiket')]
    public $harga;
    #[Rule('required', as: 'Jumlah Tiket')]
    public $jumlah_tiket;

    public function setTiket(Tiket $tiket):void
    {
        $this->tiket    = $tiket;

        $this->id           = $tiket->id;
        $this->kategori     = $tiket->kategori->id;
        $this->rute         = $tiket->rute->id;
        $this->nama_tiket   = $tiket->nama_tiket;
        $this->nama_supir   = $tiket->nama_supir;
        $this->harga        = $tiket->harga;
        $this->jumlah_tiket = $tiket->jumlah_tiket;
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

    public function setRute(): array
    {
        $setRute    = [];
        $Rutes      = Rute::select('id','kota_asal')->get();
        foreach ($Rutes as $ind => $data) {
            $setRute[$ind] = ['id' => $data->id,'kota_asal'=>$data->kota_asal];
        }
        return $setRute;
    }


    public function store():void
    {
        Tiket::create([
            'rute_id'       => $this->rute,
            'kategori_id'   => $this->kategori,
            'nama_tiket'    => $this->nama_tiket,
            'nama_supir'    => $this->nama_supir,
            'harga'         => $this->harga,
            'jumlah_tiket'  => $this->jumlah_tiket,
        ]);
    }

    public function update()
    {
        $this->tiket->where('id', $this->id)
            ->update([
            'kategori_id'   => $this->kategori,
            'rute_id'       => $this->rute,
            'nama_tiket'    => $this->nama_tiket,
            'nama_supir'    => $this->nama_supir,
            'harga'         => $this->harga,
            'jumlah_tiket'  => $this->jumlah_tiket,
            ]);
    }
}
