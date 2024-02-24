<?php

namespace App\Livewire\Transaksi;

use App\Livewire\Forms\TransaksiForm;
use App\Models\Kategori;
use App\Models\Rute;
use App\Models\Transaksi;
use App\Models\User;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TransaksiTabel extends Component
{
    use WithPagination;
    use WithSorting;

    public TransaksiForm $form;
    public $paginate = 5;

    // Set default sorting
    public $sortBy = 'tbl_transaksi.id';
    public $sortDirection = 'desc';
    #[On('dispatch-rute-create-save')]
    #[On('dispatch-rute-create-edit')]
    #[On('dispatch-rute-delete-del')]
    public function render()
    {
      
        $transaksi = Transaksi::select(
            'tbl_transaksi.id as transaksi_id', 
            'tbl_transaksi.jumlah_kursi', 
            'tbl_transaksi.nomor_kursi',
            'tbl_transaksi.total_bayar',
            'tbl_tiket.id as tiket_id',
            'u.id as user_id', 
            
        )
        ->join('tbl_tiket', 'tbl_tiket.id', 'tbl_transaksi.tiket_id')

        ->join('users as u', 'u.id', 'tbl_transaksi.user_id')
        ->where('user_id', 'like', '%' . $this->form->user . '%')
        ->where('nomor_kursi', 'like','%'.$this->form->nomor_kursi.'%')
        ->where('jumlah_kursi', 'like','%'.$this->form->jumlah_kursi.'%')
        ->where('total_bayar', 'like','%'.$this->form->total_bayar.'%')
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate($this->paginate);
        
            // dd($transaksi);
        return view('livewire.transaksi.transaksi-tabel', [
            'transaksi' => $transaksi,
            'kota_asal' => Rute::all(),
        ]);
    }
    }  