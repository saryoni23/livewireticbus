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
            <th @click="$wire.sortField('kategori')"
                class='p-2 whitespace-nowrap border border-spacing-1 cursor-pointer'>
                <x-sort :$sortDirection :$sortBy :field="'kategori'" />Kategori Mobil</th>
            <th @click="$wire.sortField('car')"
                class='p-2 whitespace-nowrap border border-spacing-1 cursor-pointer'>
                <x-sort :$sortDirection :$sortBy :field="'car'" />Car</th>
            <th @click="$wire.sortField('type')"
                class='p-2 whitespace-nowrap border border-spacing-1 cursor-pointer'>
                <x-sort :$sortDirection :$sortBy :field="'type'" />Type</th>

        </tr>
        <tr>
            <td></td>
            <td></td>
            <td class="p-2 border border-spacing-1"><x-input wire:model.live="form.id"      type="search" class="w-full text-sm"/></td>
            <td class="p-2 border border-spacing-1"><x-input wire:model.live="form.kategori"   type="search" class="w-full text-sm"/></td>
            <td class="p-2 border border-spacing-1"><x-input wire:model.live="form.car"     type="search" class="w-full text-sm"/></td>
            <td class="p-2 border border-spacing-1"><x-input wire:model.live="form.type"     type="search" class="w-full text-sm"/></td>
        </tr>
    </thead>
    <tbody>
        @isset($data)
        @foreach ($data as $service)
        <tr>
            <td class='p-2 text-center border border-spacing-1'>{{ $loop->iteration }}.</td>
            <td class='p-2 border border-spacing-1'> 
                <x-button @click="$dispatch('dispatch-service-table-edit', { id:  '{{ $service->id }}'  })" type='button' class='text-sm'>Edit</x-button>
                <x-danger-button @click="$dispatch('dispatch-service-table-delete', { id:  '{{ $service->id }}', judul:  '{{ $service->judul }}' })">Delete</x-danger-button>
            </td>
            <td class='p-2 text-center border border-spacing-1'>{{ $service->id }}</td>
            <td class='p-2 border border-spacing-1'>{{ $service->kategori->name }}</td>
            <td class='p-2 border border-spacing-1'>{{ $service->type->car->name }}</td>
            <td class='p-2 border border-spacing-1'>{{ $service->type->name }}</td>
        </tr>
        @endforeach
        @endisset
    </tbody>
</table>
<div class="mt-3">{{ $data->onEachSide(1)->links() }}</div>
</div>
