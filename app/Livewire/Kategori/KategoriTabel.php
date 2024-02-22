<?php

namespace App\Livewire\Kategori;

use App\Livewire\Forms\KategoriForm;
use App\Models\Kategori;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class KategoriTabel extends Component
{
    use WithPagination;
    use WithSorting;
    public KategoriForm $form;
    public    
    $paginate   =10,
    $sortBy     ='tbl_kategori.id',
    $sortDirection = 'desc';
    #[On('dispatch-kategori-create-save')]
    #[On('dispatch-kategori-create-edit')]
    #[On('dispatch-kategori-delete-del')]
    public function render()
    {
        return view('livewire.kategori.kategori-tabel',[
            'data' => Kategori::where('id', 'like','%'.$this->form->id.'%')
            ->where('name', 'like','%'.$this->form->name.'%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate),

        ]);
    }
}
