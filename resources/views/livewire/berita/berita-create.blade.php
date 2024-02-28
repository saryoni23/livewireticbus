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
                
                <x-input wire:model="form.user_id" id="user_id" type="text" class="mt-1 w-full" autocomplete="user_id"  :value=""
                value="{{ old('user_id', Auth::id()) }}" hidden/>


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

