@extends('halaman_depan.layout.index')

@section('content')

<div class="mx-auto max-w-2xl py-4 sm:py-12 lg:py-56 space-y-20">
    <div id="custom-controls-gallery" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            @foreach($gambar as $index => $item)
                <!-- Item {{$index + 1}} -->
                <div class="hidden duration-700 ease-in-out {{$index == 0 ? 'block' : ''}}" data-carousel-item="{{$index == 0 ? 'active' : ''}}">
                    <img src="{{ asset('/storage/carosel/'.$item->image) }}" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                </div>
            @endforeach
        </div>
        <!-- Slider controls -->
        <div class="flex justify-center items-center pt-4">
            <!-- Button for previous slide -->
            <button type="button" class="flex justify-center items-center me-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                    <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <!-- Button for next slide -->
            <button type="button" class="flex justify-center items-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                    <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>
    
    @forelse ($data as $data)
    <div class="text-center">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-6xl">
            {{ $data->nama_perusahaan }}
        </h1>
        <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
            {!! strip_tags($data->visi, '<strong><em><span>
                        <div>') !!}
        </h1>
        <div id="tambahstyle">
            <p class="lead  ">
                {!! $data->isi !!}
            </p>
        </div>
    </div>
    @empty
            <article
            class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-center items-center mb-5 text-gray-500">
               Profil Company belum Ada.
    </article>
    @endforelse
</div>


@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
    // Fungsi untuk menambahkan class pada elemen
    function tambahStylePadaElement() {
        // Temukan elemen dengan id 'tambahstyle'
        var element = document.getElementById('tambahstyle');

        // Periksa jika elemen ditemukan
        if (element) {
            // Tambahkan class yang diinginkan
            element.classList.add('text-gray-900', 'dark:text-white');
        }
    }

    // Panggil fungsi untuk pertama kali saat dokumen dimuat
    tambahStylePadaElement();

    // Buat observer untuk memantau perubahan dalam DOM
    var observer = new MutationObserver(function (mutationsList, observer) {
        // Periksa setiap mutasi
        for (var mutation of mutationsList) {
            // Periksa apakah ada penambahan node
            if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
                // Panggil fungsi untuk menambahkan style pada elemen
                tambahStylePadaElement();
            }
        }
    });

    // Mulai memantau perubahan dalam subtree dokumen
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
});

</script>
