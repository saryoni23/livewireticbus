@extends('halaman_depan.layout.index')

@section('content')

<div class="mx-auto max-w-full py-32 sm:py-48 lg:py-28">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Tiket</h2>
            <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Kami memiliki tiket untuk solusi
                perjalanan anda</p>
        </div>
        <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
            @forelse($tiket as $item)
            <!-- Pricing Card -->
            <div class="flex flex-row">
                <div
                    class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-slate-400 rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">Supir: </h3>

                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400"> {{ $item->nama_supir }} </p>
                    <div class="flex flex-col justify-center items-center  my-8">
                        <span class="mr-2 text-4xl font-extrabold">{{ $item->name_tiket }}</span>
                        <span class="text-gray-500 dark:text-gray-400">Jam:
                            {{ date('H:i', strtotime($item->rute->jam_berangkat)) }}</span>

                    </div>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400"> {{ $item->rute->kota_asal}} Ke
                        {{ $item->rute->kota_tujuan}} </p>
                    <!-- List -->
                    <ul role="list" class="mb-8 space-y-4 text-left">

                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Harga <span class="font-semibold">{{ $item->harga_tiket }}</span></span>
                        </li>
                    </ul>
                    <a href="#"
                        class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900">Get
                        started</a>
                </div>
            </div>
            @empty
        </div>
        <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-center items-center mb-5 text-gray-500">
                Tiket Belum ada.
        </article>
        @endforelse
    </div>
</div>

@endsection
