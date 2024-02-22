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
                <th @click="$wire.sortField('id')" class='p-2 whitespace-nowrap border border-spacing-1 cursor-pointer'>
                    <x-sort :$sortDirection :$sortBy :field="'id'" />ID</th>
                <th @click="$wire.sortField('judul')"
                    class='p-2 whitespace-nowrap border border-spacing-1 cursor-pointer'>
                    <x-sort :$sortDirection :$sortBy :field="'judul'" />Nama Kategori</th>

            </tr>
            <tr>
                <td></td>
                <td></td>
                <td class="p-2 border border-spacing-1">
                    <x-input wire:model.live="form.id" type="search" class="w-full text-sm" />
                </td>
                <td class="p-2 border border-spacing-1">
                    <x-input wire:model.live="form.name" type="search" class="w-full text-sm" />
                </td>
            </tr>
        </thead>
        <tbody>
            @isset($data)
            @foreach ($data as $kategori)
            <tr>
                <td class='p-2 text-center border border-spacing-1'>{{ $loop->iteration }}.</td>
                <td class='p-2 border border-spacing-1'>
                    <x-button @click="$dispatch('dispatch-kategori-table-edit', { id:  '{{ $kategori->id }}'  })"
                        type='button' class='text-sm'>Edit</x-button>
                    <x-danger-button
                        @click="$dispatch('dispatch-kategori-table-delete', { id:  '{{ $kategori->id }}', name:  '{{ $kategori->name }}' })">
                        Delete</x-danger-button>
                </td>
                <td class='p-2 text-center border border-spacing-1'>{{ $kategori->id }}</td>
                <td class='p-2 border border-spacing-1'>{{ $kategori->name }}</td>

            </tr>
            @endforeach
            @endisset
        </tbody>
    </table>
    <div class="mt-3">{{ $data->onEachSide(1)->links() }}</div>
</div>
