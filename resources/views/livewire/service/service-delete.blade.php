<div>
   
    <x-dialog-modal wire:model.live="modalServiceDelete" wire:click="$set('modalServiceDelete', false)" submit="edit">
        <x-slot name="title">
            Delete Service
        </x-slot>

        <x-slot name="content">
        <p>Apakah Anda Ingin Menghapus Data dengan ID:{{ $id }} dan {{ $judul }}</p>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.modalServiceDelete = false" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-danger-button @click="$wire.del()" class="ms-3" wire:loading.attr="disabled">
                Delete
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
