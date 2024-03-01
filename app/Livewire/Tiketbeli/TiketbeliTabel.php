<?php

namespace App\Livewire\Tiketbeli;

use App\Livewire\Forms\TiketBeliForm;
use App\Models\Kategori;
use App\Models\Rute;
use App\Models\TiketBeli;
use App\Models\User;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TiketbeliTabel extends Component
{
    use WithPagination;
    use WithSorting;

    public TiketBeliForm $form;
    public $paginate = 5;

    // Set default sorting
    public $sortBy = 'tbl_tiketbeli.id';
    public $sortDirection = 'desc';
    #[On('dispatch-tiketbeli-create-save')]
    #[On('dispatch-tiketbeli-delete-del')]
    public function render()
    {

        $tiketbeli = TiketBeli::select(
            'tbl_tiketbeli.id as tiketbeli_id',
            'tbl_tiketbeli.jumlah_kursi',
            'tbl_tiketbeli.nomor_kursi',
            'tbl_tiketbeli.total_bayar',
            'tbl_tiketbeli.nama_pemesan',
            'tbl_tiket.id as tiket_id',
            'u.id as user_id',

        )
        ->join('tbl_tiket', 'tbl_tiket.id', 'tbl_tiketbeli.tiket_id')

        ->join('users as u', 'u.id', 'tbl_tiketbeli.user_id')
        ->where('user_id', 'like', '%' . $this->form->user . '%')
        ->where('nama_pemesan', 'like','%'.$this->form->nama_pemesan.'%')
        ->where('nomor_kursi', 'like','%'.$this->form->nomor_kursi.'%')
        ->where('jumlah_kursi', 'like','%'.$this->form->jumlah_kursi.'%')
        ->where('total_bayar', 'like','%'.$this->form->total_bayar.'%')
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate($this->paginate);

            // dd($tiketbeli);
        return view('livewire.tiketbeli.tiketbeli-tabel', [
            'tiketbeli' => $tiketbeli,
            'kota_asal' => Rute::all(),
        ]);
    }
    }
