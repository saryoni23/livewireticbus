<div>
    <x-button @click="$wire.modalTransaksiCreate = true">Create Transaksi</x-button>

    <x-dialog-modal wire:model.live="modalTransaksiCreate" wire:click="$set('modalTransaksiCreate', false)"
        submit="save">
        <x-slot name="title">
            Form Transaksi
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">

                <!-- Rute Tiket -->
                <div class="col-span-12">
                    <x-label for="form.user" value="Pemesan" />
                    <x-select wire:model="form.user" id="form.user" type="text" class="mt-1 w-full" required
                        autocomplete="form.user">
                        <option></option>
                        @foreach($user as $usr)
                        <option value="{{ $usr->id }}">{{ $usr->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="form.user" class="mt-1" />
                </div>

                <!-- Tiket -->
                <div class="col-span-12">
                    <x-label for="form.tiket" value="Rute Tiket" />
                    <x-select wire:model="form.tiket" id="form.tiket" type="text" class="mt-1 w-full" required autocomplete="form.tiket">
                        <option></option>
                        @foreach($tiket as $tk)
                        <option value="{{ $tk->id }}" data-harga="{{ $tk->harga }}">{{ $tk->nama_tiket }} ,Supir: {{ $tk->nama_supir }}, Tipe
                            : {{ $tk->kategori->name }}, Harga:{{ $tk->harga }},
                        </option>
                        @endforeach
                    </x-select>
                    <x-input-error for="form.rute" class="mt-1" />
                </div>

                <!-- Jumlah Kursi -->
                <div class="col-span-12">
                    <x-label for="form.jumlah_kursi" value="Jumlah Kursi" />
                    <x-input wire:model="form.jumlah_kursi" id="form.jumlah_kursi" type="number" min='1'
                        class="mt-1 w-full" required autocomplete="form.jumlah_kursi" />
                    <x-input-error for="form.jumlah_kursi" class="mt-1" />
                </div>

                <!-- Nomor Kursi-->
                <div class="col-span-12">
                    <x-label for="form.nomor_kursi" value="Nomor Kursi" />
                    <x-input wire:model="form.nomor_kursi" id="form.nomor_kursi" type="text" class="mt-1 w-full"
                        required autocomplete="form.nomor_kursi" />
                    <x-input-error for="form.nomor_kursi" class="mt-1" />
                </div>

                <!-- Total Bayar -->
                <div class="col-span-12">
                    <x-label for="form.total_bayar" value="Total Bayar" />
                    <x-input id="form.total_bayar" type="text" class="mt-1 w-full" disabled autocomplete="form.total_bayar" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.modalTransaksiCreate = false" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>

<script>
    // Mendapatkan elemen select tiket
    var selectTiket = document.getElementById('form.tiket');

    // Mendapatkan elemen input jumlah kursi dan total bayar
    var inputJumlahKursi = document.getElementById('form.jumlah_kursi');
    var inputTotalBayar = document.getElementById('form.total_bayar');

    // Menambahkan event listener untuk menghitung total bayar setiap kali opsi tiket dipilih
    selectTiket.addEventListener('change', function() {
        // Mendapatkan harga tiket dari opsi yang dipilih
        var hargaTiket = selectTiket.options[selectTiket.selectedIndex].getAttribute('data-harga');

        // Menghitung total bayar
        var totalBayar = inputJumlahKursi.value * hargaTiket;

        // Menampilkan total bayar di input total bayar
        inputTotalBayar.value = totalBayar;
    });

    // Menambahkan event listener untuk menghitung total bayar setiap kali jumlah kursi berubah
    inputJumlahKursi.addEventListener('change', function() {
        // Mendapatkan harga tiket dari opsi yang dipilih
        var hargaTiket = selectTiket.options[selectTiket.selectedIndex].getAttribute('data-harga');

        // Menghitung total bayar
        var totalBayar = inputJumlahKursi.value * hargaTiket;

        // Menampilkan total bayar di input total bayar
        inputTotalBayar.value = totalBayar;
    });
</script>