<!-- <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> -->
            <aside
                class="fixed mt-1 top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
                aria-label="Sidenav" id="drawer-navigation">
                <div class="overflow-y-auto px-3 h-full bg-white dark:bg-gray-800">
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('Home') }}"
                                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M5 3a2 2 0 0 0-2 2v5h18V5a2 2 0 0 0-2-2H5ZM3 14v-2h18v2a2 2 0 0 1-2 2h-6v3h2a1 1 0 1 1 0 2H9a1 1 0 1 1 0-2h2v-3H5a2 2 0 0 1-2-2Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="ml-3" sidebar-toggle-item>Frontend</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.dashboard.index') }}"
                                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-400 dark:text-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('admin.dashboard.index') ? 'font-medium bg-gray-400 dark:bg-gray-600' : '' }}">
                                <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('admin.dashboard.index') ? 'text-gray-800 dark:text-white' : '' }}"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                </svg>
                                <span class="ml-3" sidebar-toggle-item>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <button type="button"
                                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-400 dark:text-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('datauser.index', 'datauser.create') ? 'font-medium text-gray-900 dark:text-gray-100 bg-gray-400 dark:bg-gray-600' : '' }}"
                                aria-controls="dropdown-layouts" data-collapse-toggle="dropdown-layouts"
                                aria-expanded="false">
                                <svg class="w-6 h-6  text-gray-500 transition duration-75{{ request()->routeIs('datauser.index', 'datauser.create') ? 'font-medium text-gray-900 dark:text-gray-100  ' : '' }}"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M7 2a2 2 0 0 0-2 2v1a1 1 0 0 0 0 2v1a1 1 0 0 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1c0 1.1.9 2 2 2h11a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H7Zm3 8a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm-1 7a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3c0 .6-.4 1-1 1h-6a1 1 0 0 1-1-1Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="flex-1 ml-3 text-left whitespace-nowrap">User</span>
                                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <ul id="dropdown-layouts"
                                class="py-2 space-y-2 {{ request()->routeIs('datauser.index', 'datauser.create') ? 'block' : 'hidden' }}">
                                <li>
                                    <a href=""
                                        class="flex items-center p-2 text-base text-gray-900 rounded-lg transition duration-75 hover:bg-gray-400 dark:hover:bg-gray-700 dark:text-white group {{ request()->routeIs('datauser.index') ? 'bg-gray-400 dark:bg-gray-600 font-medium' : '' }}">
                                        <svg class="w-6 h-6  text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('datauser') ? 'text-gray-800 dark:text-white' : '' }}"
                                            fill="currentColor" viewBox="0 0 640 512"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H322.8c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1H178.3zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z">
                                            </path>
                                        </svg>
                                        <span class="ml-3" sidebar-toggle-item>
                                            User Control</span>
                                    </a>
                                </li>
                                <li>
                                    <a href=""
                                        class="flex items-center p-2 text-base text-gray-900 rounded-lg transition duration-75 hover:bg-gray-400 dark:hover:bg-gray-700 dark:text-white group {{ request()->routeIs('datauser.create') ? 'bg-gray-400 dark:bg-gray-600 font-medium' : '' }}">
                                        <svg class="w-6 h-6  text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('datauser.create') ? 'text-gray-800 dark:text-white' : '' }} "
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1c0 .6-.4 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                        <span class="ml-3" sidebar-toggle-item>
                                            Tambah User</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <button type="button"
                                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-400 dark:text-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('berita.index','berita.create') ? 'font-medium text-gray-900 dark:text-gray-100 bg-gray-400 dark:bg-gray-600' : '' }}"
                                aria-controls="dropdown-layouts2" data-collapse-toggle="dropdown-layouts2"
                                aria-expanded="false">
                                <svg class="w-6 h-6  text-gray-500 transition duration-75{{ request()->routeIs('admin.berita.index','berita.create') ? 'font-medium text-gray-900 dark:text-gray-100  dark:bg-gray-600' : '' }}"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 7h1v12c0 .6-.4 1-1 1h-2a1 1 0 0 1-1-1V5c0-.6-.4-1-1-1H5a1 1 0 0 0-1 1v14c0 .6.4 1 1 1h11.5M7 14h6m-6 3h6m0-10h.5m-.5 3h.5M7 7h3v3H7V7Z" />
                                </svg>
                                <span class="flex-1 ml-3 text-left whitespace-nowrap"
                                    sidebar-toggle-item="">Berita</span>
                                <svg sidebar-toggle-item="" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <ul id="dropdown-layouts2"
                                class="py-2 space-y-2 {{ request()->routeIs('berita.index','berita.create') ? 'block' : 'hidden' }}">
                                <li>
                                    <a href="{{ route('admin.berita.index') }}"
                                        class="flex items-center p-2 text-base text-gray-900 rounded-lg transition duration-75 hover:bg-gray-400 dark:hover:bg-gray-700 dark:text-white group {{ request()->routeIs('berita.index') ? 'bg-gray-400 dark:bg-gray-600 font-medium' : '' }}">
                                        <svg class="w-6 h-6  text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('berita.index') ? 'text-gray-800 dark:text-white' : '' }}"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M5 3a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2V7c0-.6-.4-1-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Zm7 4c0-.6.4-1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm0 3c0-.6.4-1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm-6 4c0-.6.4-1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm0 3c0-.6.4-1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1ZM7 6a1 1 0 0 0-1 1v3c0 .6.4 1 1 1h3c.6 0 1-.4 1-1V7c0-.6-.4-1-1-1H7Zm1 3V8h1v1H8Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                        <span class="ml-3" sidebar-toggle-item>Kelola Berita</span>
                                    </a>
                                </li>
                                <li>
                                    <a href=""
                                        class="flex items-center p-2 text-base text-gray-900 rounded-lg transition duration-75 hover:bg-gray-400 dark:hover:bg-gray-700 dark:text-white group {{ request()->routeIs('berita.create') ? 'bg-gray-400 dark:bg-gray-600 font-medium' : '' }}">
                                        <svg class="w-6 h-6  text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('berita.create') ? 'text-gray-800 dark:text-white' : '' }}"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M17 14h2v3h3v2h-3v3h-2v-3h-3v-2h3zm3-3V8H4v3zm-7 2v1.68c-.63.95-1 2.09-1 3.32c0 1.09.29 2.12.8 3H4a2 2 0 0 1-2-2V3l1.67 1.67L5.33 3L7 4.67L8.67 3l1.66 1.67L12 3l1.67 1.67L15.33 3L17 4.67L18.67 3l1.66 1.67L22 3v10.5a6.137 6.137 0 0 0-4-1.5c-1.23 0-2.37.37-3.32 1zm-2 6v-6H4v6z" />
                                        </svg>
                                        <span class="ml-3" sidebar-toggle-item>
                                            Tambah Berita</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <button type="button"
                                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-400 dark:text-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('kelolatiket.index','kelolatiket.create') ? 'font-medium text-gray-900 dark:text-gray-100 bg-gray-400 dark:bg-gray-600' : '' }}"
                                aria-controls="dropdown-layouts3" data-collapse-toggle="dropdown-layouts3"
                                aria-expanded="false">
                                <svg class="w-6 h-6 text-gray-600 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M4 5a2 2 0 0 0-2 2v2.5c0 .6.4 1 1 1a1.5 1.5 0 1 1 0 3 1 1 0 0 0-1 1V17a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2.5a1 1 0 0 0-1-1 1.5 1.5 0 1 1 0-3 1 1 0 0 0 1-1V7a2 2 0 0 0-2-2H4Z" />
                                </svg>

                                <span class="flex-1 ml-3 text-left whitespace-nowrap"
                                    sidebar-toggle-item="">Tiket</span>
                                <svg sidebar-toggle-item="" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <ul id="dropdown-layouts3"
                                class="py-2 space-y-2 {{ request()->routeIs('kelolatiket.index','kelolatiket.create') ? 'block' : 'hidden' }}">
                                <li>
                                    <a href=""
                                        class="flex items-center p-2 text-base text-gray-900 rounded-lg transition duration-75 hover:bg-gray-400 dark:hover:bg-gray-700 dark:text-white group {{ request()->routeIs('kelolatiket.index') ? 'bg-gray-400 dark:bg-gray-600 font-medium' : '' }}">
                                        <svg class="w-6 h-6  text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('kelolatiket.index') ? 'text-gray-800 dark:text-white' : '' }}"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M5 3a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2V7c0-.6-.4-1-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Zm7 4c0-.6.4-1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm0 3c0-.6.4-1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm-6 4c0-.6.4-1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm0 3c0-.6.4-1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1ZM7 6a1 1 0 0 0-1 1v3c0 .6.4 1 1 1h3c.6 0 1-.4 1-1V7c0-.6-.4-1-1-1H7Zm1 3V8h1v1H8Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                        <span class="ml-3" sidebar-toggle-item>Kelola Tiket</span>
                                    </a>
                                </li>
                                <li>
                                    <a href=""
                                        class="flex items-center p-2 text-base text-gray-900 rounded-lg transition duration-75 hover:bg-gray-400 dark:hover:bg-gray-700 dark:text-white group {{ request()->routeIs('kelolatiket.create') ? 'bg-gray-400 dark:bg-gray-600 font-medium' : '' }}">
                                        <svg class="w-6 h-6  text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white {{ request()->routeIs('kelolatiket.create') ? 'text-gray-800 dark:text-white' : '' }}"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M17 14h2v3h3v2h-3v3h-2v-3h-3v-2h3zm3-3V8H4v3zm-7 2v1.68c-.63.95-1 2.09-1 3.32c0 1.09.29 2.12.8 3H4a2 2 0 0 1-2-2V3l1.67 1.67L5.33 3L7 4.67L8.67 3l1.66 1.67L12 3l1.67 1.67L15.33 3L17 4.67L18.67 3l1.66 1.67L22 3v10.5a6.137 6.137 0 0 0-4-1.5c-1.23 0-2.37.37-3.32 1zm-2 6v-6H4v6z" />
                                        </svg>
                                        <span class="ml-3" sidebar-toggle-item>
                                            Tambah Tiket</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <button type="button"
                                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-400 dark:text-gray-200 dark:hover:bg-gray-700 {{ request()->routeIs('kelolarute.index','kelolarute.create') ? 'font-medium text-gray-900 dark:text-gray-100 bg-gray-400 dark:bg-gray-600' : '' }}"
                                aria-controls="dropdown-layouts4" data-collapse-toggle="dropdown-layouts4"
                                aria-expanded="false">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 2a8 8 0 0 1 6.6 12.6l-.1.1-.6.7-5.1 6.2a1 1 0 0 1-1.6 0L6 15.3l-.3-.4-.2-.2v-.2A8 8 0 0 1 11.8 2Zm3 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                        clip-rule="evenodd" />
                                </svg>


                                <span class="flex-1 ml-3 text-left whitespace-nowrap"
                                    sidebar-toggle-item="">Rute</span>
                                <svg sidebar-toggle-item="" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <ul id="dropdown-layouts4"
                                class="py-2 space-y-2 {{ request()->routeIs('kelolarute.index','kelolarute.create') ? 'block' : 'hidden' }}">
                                <li>
                                    <a href=""
                                        class="flex items-center p-2 text-base text-gray-900 rounded-lg transition duration-75 hover:bg-gray-400 dark:hover:bg-gray-700 dark:text-white group {{ request()->routeIs('kelolarute.index') ? 'bg-gray-400 dark:bg-gray-600 font-medium' : '' }}">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M12 15a6 6 0 1 0 0-12 6 6 0 0 0 0 12Zm0 0v6M9.5 9A2.5 2.5 0 0 1 12 6.5" />
                                        </svg>

                                        <span class="ml-3" sidebar-toggle-item>Kelola Rute</span>
                                    </a>
                                </li>
                                <li>
                                    <a href=""
                                        class="flex items-center p-2 text-base text-gray-900 rounded-lg transition duration-75 hover:bg-gray-400 dark:hover:bg-gray-700 dark:text-white group {{ request()->routeIs('kelolarute.create') ? 'bg-gray-400 dark:bg-gray-600 font-medium' : '' }}">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M5 9a7 7 0 1 1 8 7v5a1 1 0 1 1-2 0v-5a7 7 0 0 1-6-7Zm6-1c.2-.3.6-.5 1-.5a1 1 0 1 0 0-2A3.5 3.5 0 0 0 8.5 9a1 1 0 0 0 2 0c0-.4.2-.8.4-1Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                        <span class="ml-3" sidebar-toggle-item>
                                            Tambah Rute</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
                            <li>
                                <a href="#"
                                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                    <svg aria-hidden="true"
                                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                        <path fill-rule="evenodd"
                                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="ml-3">Docs</span>
                                </a>
                            </li>
                            <li>
                                <a href=""
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

                                    <span class="ml-3" sidebar-toggle-item>Kelola Profil Usaha</span>
                                </a>
                            </li>
                        </ul>
                    </ul>
                </div>
            </aside>
        <!-- </div>
    </div>
</div> -->