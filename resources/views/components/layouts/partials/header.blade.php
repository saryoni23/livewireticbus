<!-- Navbar -->
<header x-data="{openSidebar:false}" class="absolute inset-x-0 top-0 z-50 mx-auto max-w-screen-xl">
    <nav class="flex flex-row items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">

            @forelse ($logos as $logo)
            <a href="/" class="flex items-center">
                <img class="h-8 mr-3" src="{{ asset('/storage/logo/'.$logo->logo) }}" alt="Logo" />
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap text-gray-900 dark:text-white">{{ $logo->singkatan_namausaha }}</span>
            </a>
            @empty
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M4 5a2 2 0 0 0-2 2v2.5c0 .6.4 1 1 1a1.5 1.5 0 1 1 0 3 1 1 0 0 0-1 1V17a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2.5a1 1 0 0 0-1-1 1.5 1.5 0 1 1 0-3 1 1 0 0 0 1-1V7a2 2 0 0 0-2-2H4Z" />
            </svg>
            @endforelse

        </div>

        <div class="flex lg:hidden">
            <button @click="openSidebar=true" type="button"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="/"
                class="text-sm font-semibold leading-6 text-gray-900 dark:text-white {{ Request::path()=='/' ? 'active':'' }}">Home</a>
            <a href="/blog"
                class="text-sm font-semibold leading-6 text-gray-900 dark:text-white {{ Request::path()=='blog' ? 'active':'' }}">Blog</a>
            <a href="/tiket"
                class="text-sm font-semibold leading-6 text-gray-900 dark:text-white {{ Request::path()=='tiket' ? 'active':'' }}">Tiket</a>
            <a href="/company"
                class="text-sm font-semibold leading-6 text-gray-900 dark:text-white {{ Request::path()=='company' ? 'active':'' }}">Company</a>
        </div>

        <div class="hidden lg:flex lg:flex-1 lg:justify-end space-x-4">
            <button id="theme-toggle" type="button"
                class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>
            <a href="{{ route('auth') }}" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">
                @if (Auth::check()) Hello
                {{ Auth::user()->fullname }}
                @else Login | Register @endif
                <span aria-hidden="true">&rarr;</span></a>
        </div>

    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div x-show="openSidebar" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg" class="lg:hidden" role="dialog"
        aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->


        <div
            class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white dark:bg-gray-900 px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">

                <a href="/" class="flex items-center">
                    <img class="h-8 mr-3" src="{{ asset('picture/logo/logo1.png') }}" alt="Logo" />

                    <span
                        class="self-center text-2xl font-semibold whitespace-nowrap text-gray-900 dark:text-white">Moria</span>
                </a>
                <button @click="openSidebar=false" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">

                    <div class="space-y-2 py-6">

                        <a href="/"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 dark:text-white hover:bg-gray-300  hover:text-black">Home</a>
                        <a href="/blog"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 dark:text-white hover:bg-gray-300  hover:text-black">Blog</a>
                        <a href="/tiket"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 dark:text-white hover:bg-gray-300  hover:text-black">Tiket</a>
                        <a href="/company"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 dark:text-white hover:bg-gray-300  hover:text-black">Company</a>
                    </div>
                    <div class="py-6">
                        <a href="{{ route('auth') }}"
                            class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 dark:text-white hover:bg-gray-50">
                            @if (Auth::check()) Hello
                            {{ Auth::user()->fullname }} @else Login | Register
                            @endif</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</header>
<!-- end Navbar -->
