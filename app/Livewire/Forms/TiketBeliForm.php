<?php

namespace App\Livewire\Forms;

use App\Models\Tiket;
use App\Models\TiketBeli;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TiketBeliForm extends Form
{

    public ?TiketBeli $tiketbeli;

    public $id;
    #[Rule('required', as: 'User')]
    public $user;
    #[Rule('required', as: 'Tiket')]
    public $tiket;
    #[Rule('required', as: 'Jumlah Kursi')]
    public $jumlah_kursi;
    #[Rule('required', as: 'Nomor Kursi')]
    public $nama_pemesan;
    public $nomor_kursi;
    public $total_bayar;

    public function setTiketBeli(TiketBeli $tiketbeli): void
    {
        $this->tiketbeli = $tiketbeli;

        $this->id = $tiketbeli->id;
        $this->user = $tiketbeli->user_id;
        $this->tiket = $tiketbeli->tiket_id;
        $this->jumlah_kursi = $tiketbeli->jumlah_kursi;
        $this->nama_pemesan = $tiketbeli->nama_pemesan;
        $this->nomor_kursi = $tiketbeli->nomor_kursi;
        $this->total_bayar = $tiketbeli->total_bayar;
    }

    public function setUser(): array
    {
        return User::pluck('name', 'id')->all();
    }

    public function setTiket(): array
    {
        return Tiket::pluck('nama_tiket', 'id')->all();
    }


    public function calculateTotalBayar(): void
    {
        if (!empty($this->tiket) && !empty($this->jumlah_kursi)) {
            $tiket = Tiket::find($this->tiket);
            $this->total_bayar = $tiket->harga * $this->jumlah_kursi;
        } else {
            $this->total_bayar = null; // Atau isi dengan nilai default jika diperlukan
        }
    }



    public function store(): void
    {
        // Hitung total bayar sebelum menyimpan data
        $this->calculateTotalBayar();

        // Pastikan total bayar memiliki nilai yang valid
        if ($this->total_bayar !== null) {
            // Kurangi jumlah tiket yang tersedia
            $tiket = Tiket::find($this->tiket);
            $tiket->jumlah_tiket -= $this->jumlah_kursi;
            $tiket->save();

            // Simpan tiketbeli
            TiketBeli::create([
                'user_id' => $this->user,
                'tiket_id' => $this->tiket,
                'jumlah_kursi' => $this->jumlah_kursi,
                'nama_pemesan' => $this->nama_pemesan,
                'nomor_kursi' => $this->nomor_kursi,
                'total_bayar' => $this->total_bayar,
            ]);

            // Reset nilai properti setelah penyimpanan berhasil
            $this->reset();
        }
    }



    public function update()
    {
        $this->tiketbeli->update([
            'user_id' => $this->user,
            'tiket_id' => $this->tiket,
            'nama_pemesan' => $this->nama_pemesan,
            'jumlah_kursi' => $this->jumlah_kursi,
            'nomor_kursi' => $this->nomor_kursi,
            'total_bayar' => $this->total_bayar,
        ]);
    }
}

