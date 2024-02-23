@extends('halaman_depan.layout.index')

@section('content')

<div class="mx-auto max-w-full py-32 sm:py-48 lg:py-28">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
            <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                Blog / Berita</h2>
            <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400"></p>
        </div>
        <div class="grid gap-8 lg:grid-cols-3">
            
            @forelse($berita as $item)
            <article
                class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-end items-center mb-5 text-gray-500">
                    <span class="text-sm">{{ $item->created_at }}</span>
                </div>
                <div class="" id="tambahstyle">
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="\blog\{{ $item->id }}">{{ $item->judul }}</a></h2>
                <p class="mb-5 font-light text-gray-500 dark:text-gray-400"> {!! $item->isi !!}
                </p>
                <div  class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <img class="w-7 h-7 rounded-full"
                            src="{{ asset('storage/posts/'.$item->image) }}"
                            alt="Jese Leos avatar" />
                        <span class="font-medium dark:text-white">

                        </span>
                    </div>
                    <a href="\blog\{{ $item->id }}"
                        class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                        Detail
                        <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
                </div>
            </article>
            @empty
            <article
            class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-center items-center mb-5 text-gray-500">
                Berita belum Tersedia.
        </article>
            @endforelse
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Temukan elemen dengan id 'tambahstyle'
        var element = document.getElementById('tambahstyle');

        // Periksa jika elemen ditemukan
        if (element) {
            // Tambahkan class yang diinginkan
            element.classList.add('text-gray-900','dark:text-white','gap-3');
        }
    });

</script>
@endsection

