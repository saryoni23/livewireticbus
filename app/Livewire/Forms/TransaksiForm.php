<?php

namespace App\Livewire\Forms;

use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Form;

class TransaksiForm extends Form
{
    public ?Transaksi $transaksi;

    public $id;
    #[Rule('required', as: 'User')]
    public $user;
    #[Rule('required', as: 'Tiket')]
    public $tiket;
    #[Rule('required', as: 'Jumlah Kursi')]
    public $jumlah_kursi;
    #[Rule('required', as: 'Nomor Kursi')]
    public $nomor_kursi;
    public $total_bayar;

    public function setTransaksi(Transaksi $transaksi): void
    {
        $this->transaksi = $transaksi;

        $this->id = $transaksi->id;
        $this->user = $transaksi->user_id;
        $this->tiket = $transaksi->tiket_id;
        $this->jumlah_kursi = $transaksi->jumlah_kursi;
        $this->nomor_kursi = $transaksi->nomor_kursi;
        $this->total_bayar = $transaksi->total_bayar;
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

        // Simpan transaksi
        Transaksi::create([
            'user_id' => $this->user,
            'tiket_id' => $this->tiket,
            'jumlah_kursi' => $this->jumlah_kursi,
            'nomor_kursi' => $this->nomor_kursi,
            'total_bayar' => $this->total_bayar,
        ]);

        // Reset nilai properti setelah penyimpanan berhasil
        $this->reset();
    }
}



    public function update()
    {
        $this->transaksi->update([
            'user_id' => $this->user,
            'tiket_id' => $this->tiket,
            'jumlah_kursi' => $this->jumlah_kursi,
            'nomor_kursi' => $this->nomor_kursi,
            'total_bayar' => $this->total_bayar,
        ]);
    }
}
