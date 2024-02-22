<?php

namespace App\Livewire\Tiket;

use App\Livewire\Forms\BeritaForm;
use App\Models\Berita;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TiketTabel extends Component
{
    use WithPagination;
    use WithSorting;
    public BeritaForm $form;
    public    
    $paginate   =10,
    $sortBy     ='berita.id',
    $sortDirection = 'desc';
    #[On('dispatch-berita-create-save')]
    #[On('dispatch-berita-create-edit')]
    #[On('dispatch-berita-delete-del')]
    public function render()
    {
        return view('livewire.tiket.tiket-tabel',[
            'data' => Berita::where('id', 'like','%'.$this->form->id.'%')
            ->where('judul', 'like','%'.$this->form->judul.'%')
            ->where('isi', 'like','%'.$this->form->isi.'%')
            ->where('image', 'like','%'.$this->form->isi.'%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate),

        ]);
    }
}
