<?php

namespace App\Livewire\Forms;

use App\Models\Berita;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;


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

    public $is_active;
    public $user_id;
    
    
    public function setBerita(Berita $berita){
        $this->berita   = $berita;
        $this->judul    = $berita->judul;
        $this->isi      = $berita->isi;
        $this->image    = $berita->image;
        $this->is_active= $berita->is_active;
        $this->user_id  = $berita->user_id;

    }
    
    public function store()
{
    $this->validate();


    // Menyimpan gambar ke direktori 'public/berita'
    $this->image->storeAs('public/berita', $this->image->hashName());

    // Membuat entri baru di database
    Berita::create([
        'judul' => $this->judul,
        'isi' => $this->isi,
        'user_id' => $this->user_id,
        'is_active' => 1,
        'image' => $$this->image->hashName(), // Menyimpan nama file saja, bukan path lengkap
    ]);

    $this->reset();
}

    public function update()
    {
        $this->validate();

        // Hapus gambar lama jika ada gambar baru diunggah
        if ($this->image) {
            Storage::delete($this->berita->image);
        }

        $this->berita->update([
            'judul' => $this->judul,
            'isi' => $this->isi,
            // Hanya mengupdate gambar jika ada gambar baru diunggah
            'image' => $this->image ? $this->image->storeAs('storage/berita', $this->image->hashName()) : $this->berita->image,
        ]);

        $this->reset();
    }    
}
