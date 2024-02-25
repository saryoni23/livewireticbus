<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class KelolauserForm extends Form
{
    use WithFileUploads;


    public ?User $kelolauser;

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
    
    
    public function setKelolauser(User $kelolauser){
        $this->kelolauser   = $kelolauser;
        $this->judul    = $kelolauser->judul;
        $this->isi      = $kelolauser->isi;
        $this->image    = $kelolauser->image;
        $this->is_active= $kelolauser->is_active;
        $this->user_id  = $kelolauser->user_id;

    }
    
    public function store()
{
    $this->validate();


    // Menyimpan gambar ke direktori 'public/kelolauser'
    $this->image->storeAs('public/kelolauser', $this->image->hashName());

    // Membuat entri baru di database
    User::create([
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
            Storage::delete($this->kelolauser->image);
        }

        $this->kelolauser->update([
            'judul' => $this->judul,
            'isi' => $this->isi,
            // Hanya mengupdate gambar jika ada gambar baru diunggah
            'image' => $this->image ? $this->image->storeAs('storage/kelolauser', $this->image->hashName()) : $this->kelolauser->image,
        ]);

        $this->reset();
    }    
}
