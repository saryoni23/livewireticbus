@php
use Illuminate\Support\Facades\Auth;
@endphp

<div>
    <x-button @click="$wire.modalBeritaCreate = true">Create Berita</x-button>

   
    <x-dialog-modal wire:model.live="modalBeritaCreate" wire:click="$set('modalBeritaCreate', false)" submit="save">
        <x-slot name="title">
            Form Tambah TIpe Bus
        </x-slot>

        <x-slot name="content">
            <form wire:submit="save">
                <input type="file" wire:model="photo">
             
                @error('photo') <span class="error">{{ $message }}</span> @enderror
             
                <button type="submit">Save photo</button>
            </form>
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

