<div>
    <x-button @click="$wire.modalKategoriCreate = true">Create Tipe Bus</x-button>
   
    <x-dialog-modal wire:model.live="modalKategoriCreate" wire:click="$set('modalKategoriCreate', false)" submit="save">
        <x-slot name="title">
            Form Tambah TIpe Bus
        </x-slot>

        <x-slot name="content">
           <div class="grid grid-col-12 gap-4">

            <!-- name -->
            <div class="col-span-12">
                <x-label for="form.name" value="Nama Tipe Bus"/>
                <x-input wire:model="form.name" id="form.name" type="text" class="mt-1 w-full" require autocomplete="form.name"/>
                <x-input-error for="form.name" class="mt-1"/>
            </div>
           </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.modalKategoriCreate = false" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
