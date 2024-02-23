<div>
    <x-slot name="header">

            <h1 class='text-3xl mb-5'>{{ __('Transaksi') }}</h1>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <livewire:transaksi.transaksi-create/>
            <livewire:transaksi.transaksi-edit/>
            <livewire:transaksi.transaksi-delete/>
            <livewire:transaksi.transaksi-tabel/>
            </div>

        </div>
    </div>
</div>
