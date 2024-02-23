@extends('halaman_depan.layout.index')

@section('content')

<div class="mx-auto max-w-full py-32 sm:py-48 lg:py-28">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
            <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">

                <section class="bg-gray-300 dark:bg-gray-600">
                    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 gap-3">
                        <h1
                            class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                            {{ $post->judul }}
                        </h1>
                        <img src="{{ asset('storage/posts/'.$post->image) }}" class="w-100 rounded" />
                        <p class="mb-8  font-normal text-gray-500  dark:text-gray-400">
                            {!! $post->isi !!}</p>


                        <div class="flex flex-col mt-10 sm:flex-row sm:justify-center sm:space-y-0">
                            <a href="/blog"
                                class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                                Berita Lain
                                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>

                        </div>
                    </div>
                </section>

        </div>
    </div>
</div>
@endsection
