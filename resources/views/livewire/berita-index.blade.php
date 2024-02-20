<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class='text-3xl mb-5'>Berita</h1>
            <livewire:berita-create/>
            <livewire:berita-edit/>
            <livewire:berita-delete/>
            <livewire:berita-tabel/>
            </div>

        </div>
    </div>
</div>
