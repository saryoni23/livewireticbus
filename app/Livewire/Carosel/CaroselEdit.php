<?php

namespace App\Livewire\Carosel;

use App\Livewire\Forms\BeritaForm;
use App\Livewire\Berita\BeritaTabel;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;


class CaroselEdit extends Component
{
    use WithFileUploads;

    public BeritaForm $form;

    public $modalBeritaEdit = false;

    #[Rule('required|min:3', as: 'Judul harus diisi /')]
    public $judul;
    
    #[Rule('required|min:3', as: 'Isi harus diisi /')]
    public $isi;
    
    public $image;

        
    #[On('dispatch-berita-table-edit')]
    public function set_berita(Berita $id){
        $this->form->setBerita($id);

        $this->modalBeritaEdit=true;
    }
    public function edit()
    {
        $this->validate(
            [
                'judul' => ['required', 'min:3'],
                'isi' => ['required', 'min:3'],
                'image' => ['nullable', 'image', 'max:1024'], // Buat gambar opsional dengan menambahkan 'nullable'
            ]);
        
            // Hanya mengupdate gambar jika ada gambar baru diunggah
            if ($this->image) {
                // Simpan gambar baru
                $this->image->storeAs('public/berita', $this->image->hashName());
        
                // Hapus gambar lama jika ada
                if ($this->berita->image) {
                    Storage::delete($this->berita->image);
                }
        
                // Update entri di database dengan nama gambar yang baru
                $this->berita->update([
                    'image' => $this->image->hashName(),
                ]);
            }
        
            // Update judul dan isi jika tidak ada gambar baru diunggah atau jika ada perubahan
            $this->berita->update([
                'judul' => $this->judul,
                'isi' => $this->isi,
            ]
        );

        $update = $this->form->update();

        is_null($update)
        ? $this->dispatch('notify', title:'success', message:'Data Berhasil Update')
        :$this->dispatch('notify', title:'failed', message:'Data Gagal Update');

        $this->dispatch('dispatch-berita-create-edit')->to(BeritaTabel::class);
        $this->modalBeritaEdit=false;
    }
    public function render()
    {
        return view('livewire.carosel.carosel-edit');
    }
}
