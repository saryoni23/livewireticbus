<div>

    <x-dialog-modal wire:model.live="modalKategoriEdit" wire:click="$set('modalKategoriEdit', false)" submit="edit">
        <x-slot name="title">
            Form Edit Tipe Bus
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-col-12 gap-4">

                <!-- name -->
                <div class="col-span-12">
                    <x-label for="form.name" value="Nama Class" />
                    <x-input wire:model="form.name" id="form.name" type="text" class="mt-1 w-full" require
                        autocomplete="form.name" />
                    <x-input-error for="form.name" class="mt-1" />
                </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.modalKategoriEdit = false" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Ubah
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
