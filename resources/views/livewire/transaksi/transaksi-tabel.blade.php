<div>
    <x-select wire:model.live='paginate' class='text-xs mt-8'>
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="50">50</option>
        <option value="100">100</option>
    </x-select>
<table class="w-full mt-2">
    <thead>
        <tr>
            <th class='p-2 border border-spacing-1'>#</th>
            <th class='p-2 whitespace-nowrap border border-spacing-1'>Action</th>

            <th @click="$wire.sortField('u.name')"
                class='p-2 whitespace-nowrap border border-spacing-1 cursor-pointer'>
                <x-sort :$sortDirection :$sortBy :field="'u.name'" />Nama User</th>
            <th @click="$wire.sortField('r.kota_asal')"
                class='p-2 whitespace-nowrap border border-spacing-1 cursor-pointer'>
                <x-sort :$sortDirection :$sortBy :field="'r.kota_asal'" />Rute</th>
            <th @click="$wire.sortField('s.nama_tiket')"
                class='p-2 whitespace-nowrap border border-spacing-1 cursor-pointer'>
                <x-sort :$sortDirection :$sortBy :field="'s.nama_tiket'" />Tiket</th>
            
            <th @click="$wire.sortField('jumlah_kursi')"
                class='p-2 whitespace-nowrap border border-spacing-1 cursor-pointer'>
                <x-sort :$sortDirection :$sortBy :field="'jumlah_kursi'" />Jumlah Kursi</th>
            <th @click="$wire.sortField('nomor_kursi')"
                class='p-2 whitespace-nowrap border border-spacing-1 cursor-pointer'>
                <x-sort :$sortDirection :$sortBy :field="'nomor_kursi'" />Nomor Kursi</th>
            <th @click="$wire.sortField('total_bayar')"
                class='p-2 whitespace-nowrap border border-spacing-1 cursor-pointer'>
                <x-sort :$sortDirection :$sortBy :field="'total_bayar'" />Total Bayar</th>

        </tr>

    </thead>
    <tbody>
       

        @foreach ($transaksi as $item)

            <tr>
                <td class="p-2 text-center border border-spacing-1">{{ $loop->iteration }}.</td>
                <td class="text-center p-2 border border-spacing-1"> 
                    <!-- <x-button @click="$dispatch('dispatch-transaksi-table-edit', { id:  '{{ $item->transaksi_id }}'  })" type="button" class="text-sm">Edit</x-button> -->
                    <x-danger-button @click="$dispatch('dispatch-transaksi-table-delete', { id:  '{{ $item->transaksi_id }}', nama:  '{{ $item->user->name }}' })">Delete</x-danger-button>
                </td>
                <td class="p-2 text-center border border-spacing-1">{{ $item->user->name }}</td>
                
                <td class="p-2 border border-spacing-1 text-center"><span class='font-bold text-lg'>Dari: </span>{{ $item->tiket->rute->kota_asal }} <br><span class='font-bold text-lg'>Ke:</span> {{ $item->tiket->rute->kota_tujuan }}</td>

              <td class="p-2 border border-spacing-1 text-center">{{ $item->tiket->nama_tiket }}</td>

                <td class="p-2 border border-spacing-1 text-center">{{ $item->jumlah_kursi}}</td>
                <td class="p-2 border border-spacing-1 text-center">{{ $item->nomor_kursi }}</td>
                <td class="p-2 border border-spacing-1 text-center">{{ $item->total_bayar }}</td>
            </tr>
        @endforeach

    </tbody>
</table>
<div class="mt-3">{{ $transaksi->links() }}</div>
</div>
