<?php

namespace App\Livewire\Tiket;

use App\Livewire\Forms\TiketForm;
use App\Models\Tiket;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TiketTabel extends Component
{
    use WithPagination;
    use WithSorting;
    public TiketForm $form;
    public    
    $paginate   =5,
    $sortBy     ='tbl_tiket.id',
    $sortDirection = 'desc';
    #[On('dispatch-tiket-create-save')]
    #[On('dispatch-tiket-create-edit')]
    #[On('dispatch-tiket-delete-del')]
    public function render()
{
    $tiket = Tiket::
    select(
        'tbl_tiket.id as tiket_id', 
        'tbl_tiket.nama_tiket', 
        'tbl_tiket.nama_supir', 
        'tbl_tiket.harga', 
        'tbl_tiket.jumlah_tiket', 
        'r.id as rute_id', 
        'k.id as kategori_id'
    )
    ->join('tbl_rute as r', 'r.id', 'tbl_tiket.rute_id')
    ->join('tbl_kategori as k', 'k.id', 'tbl_tiket.kategori_id')
    ->where('nama_tiket', 'like', '%' . $this->form->nama_tiket . '%') 
    ->where('nama_supir', 'like', '%' . $this->form->nama_supir . '%')
    ->orderBy($this->sortBy, $this->sortDirection)
    ->paginate($this->paginate);

return view('livewire.tiket.tiket-tabel', [
    'tiket' => $tiket,
]);


}}
