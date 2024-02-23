<div>
   
    <x-dialog-modal wire:model.live="modalTiketEdit" wire:click="$set('modalTiketEdit', false)" submit="edit">
        <x-slot name="title">
            Form Edit Tiket
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">
                <!-- Nama Tiket -->
                <div class="col-span-12">
                    <x-label for="form.nama_tiket" value="Nama Tiket" />
                    <x-input wire:model="form.nama_tiket" id="form.nama_tiket" type="text" class="mt-1 w-full" required
                        autocomplete="form.nama_tiket" />
                    <x-input-error for="form.nama_tiket" class="mt-1" />
                </div>

                <!-- Nama Supir -->
                <div class="col-span-12">
                    <x-label for="form.nama_supir" value="Nama Supir" />
                    <x-input wire:model="form.nama_supir" id="form.nama_supir" type="text" class="mt-1 w-full" required
                        autocomplete="form.nama_supir" />
                    <x-input-error for="form.nama_supir" class="mt-1" />
                </div>

                <!-- Harga Tiket -->
                <div class="col-span-12">
                    <x-label for="form.harga" value="Harga Tiket Satuan" />
                    <x-input wire:model="form.harga" id="form.harga" type="text" class="mt-1 w-full" required
                        autocomplete="form.harga" />
                    <x-input-error for="form.harga" class="mt-1" />
                </div>

                <!-- Rute Tiket -->
                <div class="col-span-12">
                    <x-label for="form.rute" value="Rute Tiket" />
                    <x-select wire:model="form.rute" id="form.rute" type="text" class="mt-1 w-full"
                        required autocomplete="form.rute">
                    <option></option>
                    @isset($rute)
                    @foreach($rute as $rute)
                        <option value="{{ $rute->id }}"><span class='font-bold text-lg'>Dari:</span>{{ $rute->kota_asal }} <span class='font-bold text-lg'>Ke:</span> {{ $rute->kota_tujuan }} <span class='font-bold text-lg'>Jam:</span> {{ date('H:i', strtotime($rute->jam_berangkat)) }}</option>
                        @endforeach
                    @endisset
                    </x-select>
                    <x-input-error for="form.rute" class="mt-1" />
                </div>

                <!-- Tipe Bus -->
                <div class="col-span-12">
                    <x-label for="form.kategori" value="Tipe Bus" />
                    <x-select wire:model="form.kategori" id="form.kategori" type="text" class="mt-1 w-full"
                        required autocomplete="form.kategori">
                    <option></option>
                    @isset($kategori)
                    @foreach($kategori as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                    @endforeach
                    @endisset
                    </x-select>
                    <x-input-error for="form.kategori" class="mt-1" />
                </div>

                

                <!-- Jumlah Tiket -->
                <div class="col-span-12">
                    <x-label for="form.jumlah_tiket" value="Jumlah Tiket" />
                    <x-input wire:model="form.jumlah_tiket" id="form.jumlah_tiket" type="text" class="mt-1 w-full"
                        required autocomplete="form.jumlah_tiket" />
                    <x-input-error for="form.jumlah_tiket" class="mt-1" />
                </div>
            </div>
        </x-slot>


        <x-slot name="footer">
            <x-secondary-button @click="$wire.modalTiketEdit = false" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Update
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
