<?php

namespace App\Livewire\Transaksi;

use App\Livewire\Forms\TransaksiForm;
use App\Models\Kategori;
use App\Models\Transaksi;
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

    #[On('dispatch-transaksi-create-save')]
    #[On('dispatch-transaksi-create-edit')]
    #[On('dispatch-transaksi-delete-del')]
    public function render()
    {
        $transaksi = Transaksi::
            select(
                'tbl_transaksi.id as transaksi_id', 
                'tbl_transaksi.jumlah_kursi', 
                'tbl_transaksi.nomor_kursi', 
                'tbl_transaksi.total_bayar', 
                'u.id as user_id', 
                's.id as tiket_id'
            )
            ->join('users as u', 'u.id', 'tbl_transaksi.user_id')
            ->join('tbl_tiket as s', 's.id', 'tbl_transaksi.tiket_id')
            ->join('tbl_rute as r', 'r.id', 's.rute_id')
            ->where('user_id', 'like', '%' . $this->form->user . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate);

        return view('livewire.transaksi.transaksi-tabel', [
            'transaksi' => $transaksi,
            'kategori'=> Kategori::all(),
        ]);
    }
}
