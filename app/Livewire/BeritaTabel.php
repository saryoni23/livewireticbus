<?php

namespace App\Livewire;

use App\Livewire\Forms\BeritaForm;
use App\Models\Berita;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class BeritaTabel extends Component
{
    use WithPagination;
    use WithSorting;
    public BeritaForm $form;
    public    
    $paginate   =10,
    $sortBy     ='berita.id',
    $sortDirection = 'desc';
    #[On('dispatch-berita-create-save')]
    public function render()
    {
        return view('livewire.berita-tabel',[
            'data' => Berita::where('id', 'like','%'.$this->form->id.'%')
            ->where('judul', 'like','%'.$this->form->judul.'%')
            ->where('isi', 'like','%'.$this->form->isi.'%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate),

        ]);
    }
}
