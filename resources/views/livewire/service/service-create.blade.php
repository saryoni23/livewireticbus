<div>
    <x-button @click="$wire.modalServiceCreate = true">Create Service</x-button>

    <x-dialog-modal wire:model.live="modalServiceCreate" wire:click="$set('modalServiceCreate', false)" submit="save">
        <x-slot name="title">
            Form Service
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">



                <!-- Kategori -->
                <div class="col-span-12">
                    <x-label for="kategori-create" value="Jenis Bus" />
                    <x-tom x-init="$el.kategori = new Tom($el, {
                            sortField: {
                                field: 'text',
                                direction: 'asc'
                            },
                            valueField: 'id',
                            labelField: 'name',
                            searchField: 'name',
                        })" @set-kategori-create.window="
                        el.kategori.addOption(event.detail.data);" @set-reset.window="el.kategori.clear()"
                        wire:model="form.kategori" id="kategori-create" class="mt-1 w-full" require
                        autocomplete="kategori-create">
                        <option></option>
                    </x-tom>
                    <x-input-error for="form.kategori" class="mt-1" />
                </div>

                <!-- Car -->
                <div class="col-span-12">
                    <x-label for="form.car" value="Jenis Mobil" />
                    <x-tom x-init="$el.car = new Tom($el, {
                            sortField: { field: 'name', direction: 'asc' }, 
                            valueField: 'id',
                            labelField: 'name',
                            searchField: 'name'
                        })" @set-car-create.window="el.car.addOption(event.detail.data);"
                        @set-reset.window="el.car.clear()" wire:model="form.car" id="car-create" class="mt-1 w-full"
                        require autocomplete="off">
                        <option></option>
                    </x-tom>
                    <x-input-error for="form.car" class="mt-1" />
                </div>

                <!-- Car -->
                <div class="col-span-12">
                    <x-label for="form.type" value="Tipe Mobil" />
                    <x-tom x-init="$el.type = new Tom($el, {
                            sortField: { field: 'name', direction: 'asc' }, 
                            valueField: 'id',
                            labelField: 'name',
                            searchField: 'name'
                        })" @set-type-create.window="el.type.addOption(event.detail.data);"
                        @set-reset.window="el.type.clear()" wire:model="form.type" id="type-create" class="mt-1 w-full"
                        require autocomplete="off">
                        <option></option>
                    </x-tom>
                    <x-input-error for="form.type" class="mt-1" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.modalServiceCreate = false" wire:loading.attr="disabled">
                Batal
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Simpan
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>

