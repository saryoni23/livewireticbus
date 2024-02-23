{{-- resources/views/livewire/seat-selection.blade.php --}}

<div>
    <x-label for="form.jumlah_kursi" value="Jumlah Kursi" />
    <x-input wire:model="jumlahKursi" id="form.jumlah_kursi" type="number" min="1" class="mt-1 w-full" required autocomplete="form.jumlah_kursi" />
    <x-input-error for="jumlahKursi" class="mt-1" />

    @foreach($nomorKursi as $index => $nomor)
        <div class="col-span-12">
            <x-label for="form.nomor_kursi_{{ $index }}" value="Nomor Kursi {{ $index + 1 }}" />
            <x-input wire:model="nomorKursi.{{ $index }}" id="form.nomor_kursi_{{ $index }}" type="text" class="mt-1 w-full" required autocomplete="form.nomor_kursi_{{ $index }}" />
            <x-input-error for="nomorKursi.{{ $index }}" class="mt-1" />
        </div>
    @endforeach
</div>
