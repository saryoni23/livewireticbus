<div>
   
    <x-dialog-modal wire:model.live="modalTiketDelete" wire:click="$set('modalTiketDelete', false)" submit="edit">
        <x-slot name="title">
            Delete Tiket
        </x-slot>

        <x-slot name="content">

        <p>Apakah Anda Ingin Menghapus Data dengan ID:{{ $id }} dan {{ $nama_tiket }}</p>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.modalTiketDelete = false" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-danger-button @click="$wire.del()" class="ms-3" wire:loading.attr="disabled">
                Delete
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
