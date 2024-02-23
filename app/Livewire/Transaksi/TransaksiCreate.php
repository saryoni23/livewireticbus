<?php

namespace App\Livewire\Transaksi;

use App\Livewire\Forms\TransaksiForm;
use App\Models\Kategori;
use App\Models\Rute;
use App\Models\Tiket;
use App\Models\User;
use Livewire\Component;

class TransaksiCreate extends Component
{
    public TransaksiForm $form;

    public $modalTransaksiCreate = false;
    public $seatSelectionFormVisible = false;
    // public $selectedSeat;
    public $jumlahTiket; // Tambahkan properti untuk menyimpan jumlah kursi yang tersedia

    // public function showSeatSelectionForm()
    // {
    //     $this->reset(['selectedSeat']);
    //     $this->seatSelectionFormVisible = true;
    // }

    // public function selectSeat($nomorKursi)
    // {
    //     $this->selectedSeat = $nomorKursi;
    // }

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

    public function save()
{
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
                // Lakukan penyimpanan transaksi
                $this->form->store();
                $this->dispatch('dispatch-transaksi-create-save')->to(TransaksiTabel::class);

                
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

        return view('livewire.transaksi.transaksi-create', [
            'tiket' => Tiket::all(),
            'user' => User::all(),


        ]);
    }
}
