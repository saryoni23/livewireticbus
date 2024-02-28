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
    
    // #[Rule('image', message: 'File Harus Gambar')]
    // #[Rule('max:1024', message: 'Ukuran File Maksimal 1MB')]
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
    
        // Simpan gambar ke direktori storage
        $storedPath = $this->image->store('public/berita');
    
        // Ambil nama file yang diunggah
        $fileName = basename($storedPath);
    
        // Buat objek Berita dengan nama file yang diunggah
        Berita::create([
            'judul' => $this->judul,
            'isi' => $this->isi,
            'user_id' => $this->user_id,
            'is_active' => 1,
            'image' => $fileName,
        ]);
    
        // Reset formulir setelah penyimpanan berhasil
        $this->reset();
    }

    public function update()
    {
    $this->validate([
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
    ]);

    $this->reset();
    }

    
}
