<div>
    <x-button @click="$wire.modalTiketbeliCreate = true">Beli Tiket</x-button>

    <x-dialog-modal wire:model="modalTiketbeliCreate" wire:click="$set('modalTiketbeliCreate', false)" submit="save">
        <x-slot name="title">
            Form Beli Tiket
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">

                <div class="col-span-12">
                    <x-label for="form.user" value="Pemesan" />
                    <x-input wire:model="form.user" id="form.user" type="text" class="mt-1 w-full" autocomplete="off" />

                    <x-input-error for="form.user" class="mt-1" />
                </div>
                <x-label for="form.user" value="Pemesan" />
                <x-input id="form.user" type="text" class="mt-1 w-full" autocomplete="off" disabled>
                    {{ auth()->user()->name }}
                </x-input>

                <!-- Tiket -->
                <div class="col-span-12">
                    <x-label for="form.tiket" value="Rute Tiket" />
                    <x-select wire:model="form.tiket" id="form.tiket" type="text" class="mt-1 w-full" require
                        autocomplete="form.tiket">
                        <option></option>
                        @foreach($tiket as $tk)
                        <option value="{{ $tk->id }}" data-harga="{{ $tk->harga }}"
                            data-jumlah="{{ $tk->jumlah_tiket }}">{{ $tk->nama_tiket }} ,Supir: {{ $tk->nama_supir }},
                            Tipe
                            : {{ $tk->kategori->name }}, Harga:{{ $tk->harga }}, Jumlah Tiket: {{ $tk->jumlah_tiket }}
                        </option>
                        @endforeach
                    </x-select>
                    <x-input-error for="form.tiket" class="mt-1" />
                </div>


                <!-- Jumlah Kursi -->
                <div class="col-span-12">
                    <x-label for="form.jumlah_kursi" value="Jumlah Kursi" />
                    <x-input wire:model="form.jumlah_kursi" id="form.jumlah_kursi" type="number" min='1'
                        class="mt-1 w-full" require autocomplete="form.jumlah_kursi" />
                    <x-input-error for="form.jumlah_kursi" class="mt-1" />
                </div>

                <!-- Nomor Kursi-->
                <div class="col-span-12">
                    <x-label for="form.nama_pemesan" value="Nama Pemesan" />
                    <x-input wire:model="form.nama_pemesan" id="form.nama_pemesan" type="text" class="mt-1 w-full"
                        require autocomplete="form.nomor_kursi" />
                    <x-input-error for="form.nama_pemesan" class="mt-1" />
                </div>

                <!-- Total Bayar -->
                <div class="col-span-12">
                    <x-label for="form.total_bayar" value="Total Bayar" />
                    <x-input id="form.total_bayar" type="text" class="mt-1 w-full" disabled
                        autocomplete="form.total_bayar" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.modalTiketbeliCreate = false" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button class="ms-3" wire:click="save" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        var selectTiket = document.getElementById('form.tiket');
        var inputJumlahKursi = document.getElementById('form.jumlah_kursi');
        var inputTotalBayar = document.getElementById('form.total_bayar');

        selectTiket.addEventListener('change', function () {
            var selectedOption = selectTiket.options[selectTiket.selectedIndex];
            var maxJumlah = selectedOption.getAttribute('data-jumlah');
            inputJumlahKursi.setAttribute('max', maxJumlah);
        });

        inputJumlahKursi.addEventListener('input', function () {
            hitungTotalBayar();
        });

        function hitungTotalBayar() {
            var selectedOption = selectTiket.options[selectTiket.selectedIndex];
            var hargaTiket = selectedOption.getAttribute('data-harga');

            if (inputJumlahKursi.value !== '') {
                var totalBayar = inputJumlahKursi.value * hargaTiket;
                inputTotalBayar.value = totalBayar.toFixed(2);
            }
        }
    });
</script>
