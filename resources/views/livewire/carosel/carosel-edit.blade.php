<div>
    <x-dialog-modal wire:model.live="modalBeritaEdit" wire:click="$set('modalBeritaEdit', false)" submit="edit">
        <x-slot name="title">
            Form Edit Berita
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-col-12 gap-4">
                <!-- Judul -->
                <div class="col-span-12">
                    <x-label for="judul" value="Judul" />
                    <x-input wire:model="form.judul" id="judul" type="text" class="mt-1 w-full" required autocomplete="judul" />
                    <x-input-error for="form.judul" class="mt-1" />
                </div>

                <!-- Isi -->
                <div class="col-span-12">
                    <x-label for="isi" value="Isi" />
                    <textarea wire:model="form.isi" id="isi" class="mt-1 block w-full" required autocomplete="isi" rows="5"></textarea>
                    <x-input-error for="form.isi" class="mt-1" />
                </div>

                <div class="col-span-12">
                    <x-label for="image" value="Gambar" />
                    <input type="file" wire:model="form.image" id="image">
                
                    @error('form.image') <span class="error">{{ $message }}</span> @enderror
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.modalBeritaEdit = false" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Update
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
