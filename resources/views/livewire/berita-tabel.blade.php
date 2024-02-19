<div>
    <table class="w-full mt-8">
        <thead>
            <tr>
                <th class='p-2 whitespace-nowrap border border-spacing-1'>#</th>
                <th class='p-2 whitespace-nowrap border border-spacing-1'>Action</th>
                <th  @click="wire.sortField('id')"class='p-2 whitespace-nowrap border border-spacing-1 cursor-pointer'>
                    <x-sort :$sortDirection :$sortBy :field="'id'"/>ID</th>
                <th @click="wire.sortField('judul')" class='p-2 whitespace-nowrap border border-spacing-1 cursor-pointer'>
                    <x-sort :$sortDirection :$sortBy :field="'judul'"/>Judul</th>
                <th @click="wire.sortField('isi')" class='p-2 whitespace-nowrap border border-spacing-1 cursor-pointer'>
                    <x-sort :$sortDirection :$sortBy :field="'isi'"/>Isi</th>
                <th class='p-2 whitespace-nowrap border border-spacing-1'>Image</th>
            </tr>
        </thead>
        <tbody>
            @isset($data)
            @foreach ($data as $berita)
            <tr>
                <td class='p-2 text-center border border-spacing-1'>{{ $loop->iteration }}.</td>
                <td class='p-2 whitespace-nowrap border border-spacing-1'></td>
                <td class='p-2 text-center border border-spacing-1'>{{ $berita->id }}</td>
                <td class='p-2 whitespace-nowrap border border-spacing-1'>{{ $berita->judul }}</td>
                <td class='p-2 whitespace-nowrap border border-spacing-1'>{{ $berita->isi }}</td>
                <td class='p-2 whitespace-nowrap border border-spacing-1'>{{ $berita->image }}</td>
            </tr>
            @endforeach
            @endisset
        </tbody>
    </table>
</div>
