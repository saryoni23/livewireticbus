<div class="flex flex-col w-full sm:w-1/2">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <button class="flex justify item-center px-6 py-2 w-full focus:outline-none hover:bg-gray-500 hover:text-gray-50"
            wire:click="toggleSidebar">
            <samp>Admin </samp>
            <svg aria-hidden="true" data-prefix="fas" data-icon="angle-down"
                class="w-4 h-4 fill-current svg-inline--fa fa-angle-down fa-w-10" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 320 512" wire:loading.remove wire:key="angle-down">
                <path
                    d="M143 352.3L7 216.3a23.9 23.9 0 010-33.9l22.6-22.6a23.9 23.9 0 0133.9 0l96.4 96.4 96.4-96.4a23.9 23.9 0 0133.9 0l22.6 22.6a23.9 23.9 0 010 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z" />
            </svg>
            <svg aria-hidden="true" data-prefix="fas" data-icon="angle-left"
                class="w-4 h-4 fill-current svg-inline--fa fa-angle-left fa-w-8" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 256 512" wire:loading.remove wire:key="angle-left">
                <path
                    d="M31.7 239l136-136a23.9 23.9 0 0133.9 0l22.6 22.6a23.9 23.9 0 010 33.9L127.9 256l96.4 96.4a23.9 23.9 0 010 33.9L201.7 409a23.9 23.9 0 01-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z" />
            </svg>
        </button>
        <div class="flex flex-col" wire:loading.remove wire:key="sidebar">
            @if($isOpen)
                <a href='#' class='text-right capitalize border-t w-full px-6 py-2'>Admin</a>
                <div>
                    <a href='#' class='text-right capitalize border-t w-full px-6 py-2'>Role</a>
                    <a href='#' class='text-right capitalize border-t w-full px-6 py-2'>User</a>
                </div>
            @endif
        </div>
    </div>
</div>

