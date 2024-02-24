<?php
namespace App\Livewire\Transaksi;

use App\Livewire\Forms\TransaksiForm;
use App\Models\Rute;
use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class TransaksiEdit extends Component
{
    public TransaksiForm $form;
    public $modalTransaksiEdit = false;
    public $jumlahTiket;

    #[On('dispatch-transaksi-table-edit')]
    public function set_transaksi(Transaksi $id)
    {
        $this->form->setTransaksi($id);
        $this->modalTransaksiEdit = true;
    }

    public function updatedFormTiket($value)
    {
        if (!empty($value)) {
            $tiket = Tiket::find($value);
            $this->jumlahTiket = $tiket->jumlah_tiket;
        } else {
            $this->jumlahTiket = null;
        }
    }

    public function edit()
    {
        $this->validate();

        try {
            $update = $this->form->update();
            $tiket = Tiket::find($this->form->tiket);

            if (!$tiket) {
                $this->dispatch('notify', title: 'failed', message: 'Tiket tidak valid.');
                return;
            }

            if ($this->jumlahTiket > 0) {
                if ($this->form->jumlah_kursi <= $this->jumlahTiket) {
                    $this->form->store();
                    $this->dispatch('dispatch-transaksi-create-save')->to(TransaksiTabel::class);
                    $this->updateSisaTiket($tiket);
                    $this->dispatch('notify', title: 'success', message: 'Data Berhasil Disimpan');
                } else {
                    $this->dispatch('notify', title: 'failed', message: 'Jumlah kursi melebihi jumlah tiket yang tersedia.');
                }
            } else {
                $this->dispatch('notify', title: 'failed', message: 'Tiket sudah habis. Silakan pilih tiket lain.');
            }

            $this->emit('refreshTransaksiTabel');
        } catch (\Exception $e) {
            $this->dispatch('notify', ['title' => 'failed', 'message' => 'Data Gagal Update']);
        }

        $this->modalTransaksiEdit = false;
    }

    public function render()
    {
        return view('livewire.transaksi.transaksi-edit', [
            'user' => User::all(),
            'tiket' => Tiket::all(),
            'rute' => Rute::all(),
        ]);
    }
}
