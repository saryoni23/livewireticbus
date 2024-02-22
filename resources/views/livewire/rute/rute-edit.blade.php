<div>
   
    <x-dialog-modal wire:model.live="modalRuteEdit" wire:click="$set('modalRuteEdit', false)" submit="edit">
        <x-slot name="title">
            Form Edit Rute
        </x-slot>

        <x-slot name="content">
           <div class="grid grid-col-12 gap-4">

            <!-- kota_asal -->
            <div class="col-span-12">
                <x-label for="form.kota_asal" value="Kota Asal"/>
                <x-input wire:model="form.kota_asal" id="form.kota_asal" type="text" class="mt-1 w-full" require autocomplete="form.kota_asal"/>
                <x-input-error for="form.judul" class="mt-1"/>
            </div>

            <!-- kota_tujuan -->
            <div class="col-span-12">
                <x-label for="form.kota_tujuan" value="Kota Tujuan"/>
                <x-input wire:model="form.kota_tujuan" id="form.kota_tujuan" class="mt-1 block w-full" name="form.isi" required autocomplete="form.isi" rows="5"></x-input>
                <x-input-error for="form.isi" class="mt-1"/>
            </div>

            <!-- Gambar -->
            <div class="col-span-12">
                <x-label for="form.jam_berangkat" value="jam_berangkat"/>
                <x-input wire:model="form.jam_berangkat" id="form.jam_berangkat" type="time" class="mt-1 w-full" require autocomplete="form.jam_berangkat"/>
                <x-input-error for="form.jam_berangkat" class="mt-1"/>
            </div>
            
           </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.modalRuteEdit = false" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Update
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
