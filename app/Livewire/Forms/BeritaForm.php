<?php

namespace App\Livewire\Forms;

use App\Models\Berita;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Livewire\WithFileUploads;

class BeritaForm extends Form
{
    use WithFileUploads;


    public ?Berita $berita;

    public $id;

    #[Rule('required|min:3', as: 'Judul harus diisi /')]
    public $judul;
    
    #[Rule('required|min:3', as: 'Isi harus diisi /')]
    public $isi;
    
    #[Rule('image', message: 'File Harus Gambar')]
    #[Rule('max:1024', message: 'Ukuran File Maksimal 1MB')]
    public $image;
    public $hapusGambar = false;
    
    public function setBerita(Berita $berita){
        $this->berita   = $berita;
    
        $this->judul    = $berita->judul;
        $this->isi      = $berita->isi;
        $this->image    = $berita->image;
    }
    
    public function store()
    {
        $this->validate();
        Berita::create([
            'judul' => $this->judul,
            'isi' => $this->isi,
            'image' => $this->image->storeAs('public/berita',$this->image->hashName()),
        ]);
        $this->reset();
    }
    
    public function update()
    {
        $this->validate();
    
        // Hapus gambar lama jika ada gambar baru diunggah
        if ($this->image) {
            Storage::delete('public/berita/' . $this->berita->image);
        }
    
        $this->berita->update([
            'judul' => $this->judul,
            'isi' => $this->isi,
            // Hanya mengupdate gambar jika ada gambar baru diunggah
            'image' => $this->image ? $this->image->storeAs('public/berita', $this->image->hashName()) : $this->berita->image,
        ]);
    
        $this->reset();
    }    

}
