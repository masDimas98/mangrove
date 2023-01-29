<nav class="px-2 bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="container flex flex-wrap items-center justify-between mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <a href="#" class="flex items-center">
            <img src="" class="h-6 mr-3 sm:h-10" alt="logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Bappeda</span>
        </a>
        <button data-collapse-toggle="navbar-dropdown" type="button"
            class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul
                class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                @if (request()->routeIs('beranda'))
                    <x-nav-link :href="route('beranda')" :active="1">
                        {{ __('Beranda') }}
                    </x-nav-link>
                @else
                    <x-nav-link :href="route('beranda')" :active="0">
                        {{ __('Beranda') }}
                    </x-nav-link>
                @endif

                @if (request()->routeIs('galeri'))
                    <x-nav-link :href="route('galeri')" :active="1">
                        {{ __('Galeri') }}
                    </x-nav-link>
                @else
                    <x-nav-link :href="route('galeri')" :active="0">
                        {{ __('Galeri') }}
                    </x-nav-link>
                @endif

                @if (Route::has('login'))
                    @auth
                        {{-- <a href="{{ url('/dashboard') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 ">Dashboard</a> --}}
                    @else
                        @if (request()->routeIs('login'))
                            <x-nav-link :href="route('login')" :active="1">
                                {{ __('Login') }}
                            </x-nav-link>
                        @else
                            <x-nav-link :href="route('login')" :active="0">
                                {{ __('Login') }}
                            </x-nav-link>
                        @endif
                        @if (Route::has('register'))
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
