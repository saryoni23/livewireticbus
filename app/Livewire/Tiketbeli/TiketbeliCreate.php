<?php

namespace App\Livewire\Tiketbeli;

use App\Livewire\Forms\TIketBeliForm;
use App\Models\Kategori;
use App\Models\Rute;
use App\Models\Tiket;
use App\Models\TiketBeli;
use App\Models\User;
use Livewire\Component;

class TiketbeliCreate extends Component
{
    public TIketBeliForm $form;

    public $modalTiketbeliCreate = false;

    public $jumlahTiket;

    public function updatedFormTiket($value)
    {
        // Perbarui jumlah kursi yang tersedia saat pemilihan tiket berubah
        if (!empty($value)) {
            $tiket = Tiket::find($value);
            $this->jumlahTiket = $tiket->jumlah_tiket;
        } else {
            $this->jumlahTiket = null;
        }
    }

    public function save(){
    $this->validate();

    // Periksa apakah tiket yang dipilih valid
    $tiket = Tiket::find($this->form->tiket);
    if (!$tiket) {
        // Kirim notifikasi jika tiket tidak valid
        $this->dispatch('notify', title: 'failed', message: 'Tiket tidak valid.');
        return;
    }

    // Periksa apakah masih tersedia tiket
    if ($this->jumlahTiket > 0) {
        // Periksa apakah jumlah kursi yang diminta tidak melebihi jumlah tiket yang tersedia
        if ($this->form->jumlah_kursi <= $this->jumlahTiket) {
            try {
                // Lakukan penyimpanan tiketbeli
                $this->form->store();
                $this->dispatch('dispatch-tiketbeli-create-save')->to(TiketbeliTabel::class);


                // Kurangi jumlah tiket yang tersedia
                $this->updateSisaTiket($tiket);

                // Kirim notifikasi berhasil
                $this->dispatch('notify', title: 'success', message: 'Data Berhasil Disimpan');
            } catch (\Exception $e) {
                // Kirim notifikasi gagal
                $this->dispatch('notify', title: 'failed', message: 'Data Gagal Disimpan');
            }
        } else {
            // Kirim notifikasi jika jumlah kursi melebihi jumlah tiket yang tersedia
            $this->dispatch('notify', title: 'failed', message: 'Jumlah kursi melebihi jumlah tiket yang tersedia.');
            $this->dispatch('dispatch-tiketbeli-create-save')->to(TiketbeliTabel::class);
        }
    } else {
        // Kirim notifikasi jika tiket telah habis
        $this->dispatch('notify', title: 'failed', message: 'Tiket sudah habis. Silakan pilih tiket lain.');
    }
}


    public function updateSisaTiket($tiket)
    {
        // Kurangi jumlah tiket yang tersedia
        $tiket->jumlah_tiket -= $this->form->jumlah_kursi;

        // Simpan perubahan
        $tiket->save();

        // Perbarui jumlah tiket yang tersedia
        $this->jumlahTiket = $tiket->jumlah_tiket;
    }


    public function render()
    {

        return view('livewire.tiketbeli.tiketbeli-create', [
            'tiket' => Tiket::all(),
            'user' => User::all(),


        ]);
    }
}
