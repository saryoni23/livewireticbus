<div x-data="{ open: false }" class=" flex flex-col w-full sm:w-1/4">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <ul class='gap-2'>
            <li class='mb-3'>
                <a href="{{ route('Home') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                    <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M5 3a2 2 0 0 0-2 2v5h18V5a2 2 0 0 0-2-2H5ZM3 14v-2h18v2a2 2 0 0 1-2 2h-6v3h2a1 1 0 1 1 0 2H9a1 1 0 1 1 0-2h2v-3H5a2 2 0 0 1-2-2Z"
                            clip-rule="evenodd" />
                    </svg>

                    <span class="ml-3" sidebar-toggle-item>Frontend</span>
                </a>
            </li>
            <li class='mb-3'>
                <a href="{{ route('admin.roles.dashboard') }}" wire:navigate :active="request()"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-400 dark:text-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('admin.dashboard.index') ? 'font-medium bg-gray-400 dark:bg-gray-600' : '' }}">
                    <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('admin.dashboard.index') ? 'text-gray-800 dark:text-white' : '' }}"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3" sidebar-toggle-item>Dashboard</span>
                </a>
            </li>




            <li x-data="{ isOpen: false }" class='mb-2'>
                <button type="button"
                    class="flex flex-wrap  justify-between w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-400 dark:text-gray-200 dark:hover:bg-gray-700"
                    aria-controls="dropdown-layouts2" @click="isOpen = !isOpen" aria-expanded="false">

                    <svg class="w-6 h-6  text-gray-500 transition duration-75{{ request()->routeIs('admin.berita.index','berita.create') ? 'font-medium text-gray-900 dark:text-gray-100  dark:bg-gray-600' : '' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7h1v12c0 .6-.4 1-1 1h-2a1 1 0 0 1-1-1V5c0-.6-.4-1-1-1H5a1 1 0 0 0-1 1v14c0 .6.4 1 1 1h11.5M7 14h6m-6 3h6m0-10h.5m-.5 3h.5M7 7h3v3H7V7Z" />
                    </svg><span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item="">Berita</span>
                    <template x-if="isOpen">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="angle-down"
                            class="w-4 h-4 fill-current svg-inline--fa fa-angle-down fa-w-10"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path
                                d="M143 352.3L7 216.3a23.9 23.9 0 010-33.9l22.6-22.6a23.9 23.9 0 0133.9 0l96.4 96.4 96.4-96.4a23.9 23.9 0 0133.9 0l22.6 22.6a23.9 23.9 0 010 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z" />
                        </svg>
                    </template>
                    <template x-if="!isOpen">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="angle-left"
                            class="w-4 h-4 fill-current svg-inline--fa fa-angle-left fa-w-8"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                            <path
                                d="M31.7 239l136-136a23.9 23.9 0 0133.9 0l22.6 22.6a23.9 23.9 0 010 33.9L127.9 256l96.4 96.4a23.9 23.9 0 010 33.9L201.7 409a23.9 23.9 0 01-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z" />
                        </svg>
                    </template>
                </button>
                <ul id="dropdown-layouts2" class="py-2 space-y-2" x-show="isOpen" @click.away="isOpen = false">
                    <li>
                        <a href="{{ route('admin.roles.berita') }}"  wire:navigate :active="request()"
                            class="flex items-center p-2 text-base text-gray-900 rounded-lg transition duration-75 hover:bg-gray-400 dark:hover:bg-gray-700 dark:text-white text-right group">
                            <span class="flex-1 ml-3" sidebar-toggle-item>Kelola Berita</span>
                            <svg class="w-6 h-6 text-gray-500 transition duration-75{{ request()->routeIs('admin.roles.berita','berita.create') ? ' font-medium text-gray-900 dark:text-gray-100  dark:bg-gray-600' : '' }}"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 7h1v12c0 .6-.4 1-1 1h-2a1 1 0 0 1-1-1V5c0-.6-.4-1-1-1H5a1 1 0 0 0-1 1v14c0 .6.4 1 1 1h11.5M7 14h6m-6 3h6m0-10h.5m-.5 3h.5M7 7h3v3H7V7Z" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.roles.berita') }}"  wire:navigate :active="request()"
                            class="flex items-center p-2 text-base text-gray-900 rounded-lg transition duration-75 hover:bg-gray-400 dark:hover:bg-gray-700 dark:text-white text-right group">
                            <span class="flex-1" sidebar-toggle-item>Tambah Berita</span>
                            <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('berita.create') ? 'text-gray-800 dark:text-white' : '' }}"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M17 14h2v3h3v2h-3v3h-2v-3h-3v-2h3zm3-3V8H4v3zm-7 2v1.68c-.63.95-1 2.09-1 3.32c0 1.09.29 2.12.8 3H4a2 2 0 0 1-2-2V3l1.67 1.67L5.33 3L7 4.67L8.67 3l1.66 1.67L12 3l1.67 1.67L15.33 3L17 4.67L18.67 3l1.66 1.67L22 3v10.5a6.137 6.137 0 0 0-4-1.5c-1.23 0-2.37.37-3.32 1zm-2 6v-6H4v6z" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </li>
            <li >
                <a href="{{ route('admin.roles.index') }}"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-400 dark:text-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('kelolaprofil') ?  'font-medium bg-gray-400 dark:bg-gray-600' : '' }}">
                    <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('kelolaprofil') ?  'font-medium text-gray-800 dark:text-white' : '' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 13v-2a1 1 0 0 0-1-1h-.8l-.7-1.7.6-.5a1 1 0 0 0 0-1.5L17.7 5a1 1 0 0 0-1.5 0l-.5.6-1.7-.7V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.8l-1.7.7-.5-.6a1 1 0 0 0-1.5 0L5 6.3a1 1 0 0 0 0 1.5l.6.5-.7 1.7H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.8l.7 1.7-.6.5a1 1 0 0 0 0 1.5L6.3 19a1 1 0 0 0 1.5 0l.5-.6 1.7.7v.8a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.8l1.7-.7.5.6a1 1 0 0 0 1.5 0l1.4-1.4a1 1 0 0 0 0-1.5l-.6-.5.7-1.7h.8a1 1 0 0 0 1-1Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    </svg>

                    <span class="ml-3" sidebar-toggle-item>Role</span>
                </a>
            </li>
        </ul>
        <x-responsive-nav-link href="{{ route('admin.roles.berita') }}" wire:navigate :active="request()->routeIs('admin.berita.index')">
            {{ __('Berita') }}
        </x-responsive-nav-link>

        <x-responsive-nav-link href="{{ route('admin.roles.kategori') }}" wire:navigate :active="request()->routeIs('admin.kategori.index')">
            {{ __('Tipe Bus') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link href="{{ route('admin.roles.rute') }}" wire:navigate :active="request()->routeIs('admin.rute.index')">
            {{ __('Rute') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link href="{{ route('admin.roles.tiket') }}" wire:navigate :active="request()->routeIs('admin.tiket.index')">
            {{ __('Tiket') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link href="{{ route('admin.roles.transaksi') }}" wire:navigate :active="request()->routeIs('admin.transaksi.index')">
            {{ __('Transaksi') }}
        </x-responsive-nav-link>

    </div>
</div>
