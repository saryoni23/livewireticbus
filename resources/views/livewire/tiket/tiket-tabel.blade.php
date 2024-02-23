<div>
    <x-select wire:model="paginate" class="text-xs mt-8">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="50">50</option>
        <option value="100">100</option>
    </x-select>
    <table class="w-full mt-2">
        <thead>
            <tr>
                <th class="p-2 border border-spacing-1">#</th>
                <th class="p-2 whitespace-nowrap border border-spacing-1">Action</th>
                <th @click="$wire.sortField('tiket_id')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :sortDirection="$sortDirection" :sortBy="$sortBy" field="tiket_id" />ID Tiket</th>
                <th @click="$wire.sortField('nama_tiket')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :sortDirection="$sortDirection" :sortBy="$sortBy" field="nama_tiket" />Nama Tiket</th>
                <th @click="$wire.sortField('nama_supir')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :sortDirection="$sortDirection" :sortBy="$sortBy" field="nama_supir" />Nama Supir</th>
                <th @click="$wire.sortField('harga')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :sortDirection="$sortDirection" :sortBy="$sortBy" field="harga" />Harga</th>
                <th @click="$wire.sortField('rute_id')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :sortDirection="$sortDirection" :sortBy="$sortBy" field="rute_id" />Rute</th>
                <th @click="$wire.sortField('kategori_id')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :sortDirection="$sortDirection" :sortBy="$sortBy" field="kategori_id" />Kategori</th>
                <th @click="$wire.sortField('jumlah_tiket')" class="p-2 whitespace-nowrap border border-spacing-1 cursor-pointer">
                    <x-sort :sortDirection="$sortDirection" :sortBy="$sortBy" field="jumlah_tiket" />Jumlah Tiket</th>
            </tr>
        </thead>
        <tbody>
            @isset($tiket)
                @foreach ($tiket as $item)
                    <tr>
                        <td class="p-2 text-center border border-spacing-1">{{ $loop->iteration }}.</td>
                        <td class="p-2 border border-spacing-1"> 
                            <x-button @click="$dispatch('dispatch-tiket-table-edit', { id:  '{{ $item->tiket_id }}'  })" type="button" class="text-sm">Edit</x-button>
                            <x-danger-button @click="$dispatch('dispatch-tiket-table-delete', { id:  '{{ $item->tiket_id }}', nama:  'Nama: {{ $item->nama_tiket }}' })">Delete</x-danger-button>
                        </td>
                        <td class="p-2 text-center border border-spacing-1">{{ $item->tiket_id }}</td>
                        <td class="p-2 border border-spacing-1">{{ $item->nama_tiket }}</td>
                        <td class="p-2 border border-spacing-1">{{ $item->nama_supir }}</td>
                        <td class="p-2 border border-spacing-1 text-center">Rp.{{ $item->harga }}</td>
                        <td class="p-2 border border-spacing-1 text-center">Dari: {{ $item->rute->kota_asal }} <br>Ke: {{ $item->rute->kota_tujuan }}</td>
                        <td class="p-2 border border-spacing-1 text-center">{{ $item->kategori->name }}</td>
                        <td class="p-2 border border-spacing-1 text-center">{{ $item->jumlah_tiket }}</td>
                    </tr>
                @endforeach
            @endisset
        </tbody>
    </table>
    <div class="mt-3">{{ $tiket->links() }}</div>
</div>
