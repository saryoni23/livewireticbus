<div>
    <x-button @click="$wire.modalBeritaCreate = true">Create Berita</x-button>
   
    <x-dialog-modal wire:model.live="modalBeritaCreate" wire:click="$set('modalBeritaCreate', false)" submit="save">
        <x-slot name="title">
            Form Berita
        </x-slot>

        <x-slot name="content">
           <div class="grid grid-col-12 gap-4">

            <!-- Judul -->
            <div class="col-span-12">
                <x-label for="form.judul" value="Judul"/>
                <x-input wire:model="form.judul" id="form.judul" type="text" class="mt-1 w-full" require autocomplete="form.judul"/>
                <x-input-error for="form.judul" class="mt-1"/>
            </div>

            <!-- Isi -->
            <div class="col-span-12">
                <x-label for="form.isi" value="Isi"/>
                <textarea wire:model="form.isi" id="form.isi" class="mt-1 block w-full" name="form.isi" required autocomplete="form.isi" rows="5"></textarea>
                <x-input-error for="form.isi" class="mt-1"/>
            </div>

            <!-- Gambar -->
            <div class="col-span-12">
                <x-label for="form.image" value="Image"/>
                <x-input wire:model="form.image" id="form.image" type="text" class="mt-1 w-full" require autocomplete="form.image"/>
                <x-input-error for="form.image" class="mt-1"/>
            </div>
            
           </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.modalBeritaCreate = false" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
