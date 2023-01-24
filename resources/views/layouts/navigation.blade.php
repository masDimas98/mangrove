<nav class="px-2 bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700 ">
    <div class="container flex flex-wrap items-center justify-between mx-auto max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="#" class="flex items-center">
            <img src="" class="h-6 mr-3 sm:h-10" alt="logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Bappeda</span>
        </a>
        <button data-collapse-toggle="navbar-multi-level" type="button"
            class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-multi-level" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
            <ul
                class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <!-- Navigation Links -->
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>

                @if (auth()->user()->hakakses == 1 || auth()->user()->hakakses == 2)
                    @if (request()->routeIs('wilayah') ||
                            request()->is('kecamatan') ||
                            request()->is('kecamatan/*') ||
                            request()->is('desa') ||
                            request()->is('desa/*') ||
                            request()->is('lahan') ||
                            request()->is('lahan/*'))
                        <x-nav-link :href="route('wilayah')" :active="1">
                            {{ __('Wilayah') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('wilayah')" :active="0">
                            {{ __('Wilayah') }}
                        </x-nav-link>
                    @endif
                    @if (request()->is('penanaman') || request()->is('penanaman/*'))
                        <x-nav-link :href="url('/penanaman')" :active="1">
                            {{ __('Penanaman') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="url('/penanaman')" :active="0">
                            {{ __('Penanaman') }}
                        </x-nav-link>
                    @endif
                    @if (request()->is('jenismangrove') ||
                            request()->is('jenismangrove/*') ||
                            request()->is('mangrove') ||
                            request()->is('mangrove/*'))
                        <x-nav-link :href="url('/jenismangrove')" :active="1">
                            {{ __('Mangrove') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="url('/jenismangrove')" :active="0">
                            {{ __('Mangrove') }}
                        </x-nav-link>
                    @endif
                    @if (request()->is('user') || request()->is('user/*'))
                        <x-nav-link :href="url('/user')" :active="1">
                            {{ __('Users') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="url('/user')" :active="0">
                            {{ __('Users') }}
                        </x-nav-link>
                    @endif

                @endif

                @if (auth()->user()->hakakses == 1 || auth()->user()->hakakses == 3)
                    @if (request()->routeIs('monitoring') || request()->routeIs('monitoringdetail'))
                        <x-nav-link :href="route('monitoring')" :active="1">
                            {{ __('Monitoring Mangrove') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('monitoring')" :active="0">
                            {{ __('Monitoring Mangrove') }}
                        </x-nav-link>
                    @endif
                    @if (request()->is('bibit') || request()->is('bibit/*'))
                        <x-nav-link :href="url('/bibit')" :active="1">
                            {{ __('bibit Mangrove') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="url('/bibit')" :active="0">
                            {{ __('bibit Mangrove') }}

                        </x-nav-link>
                    @endif
                @endif

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                <!-- Responsive Navigation Menu -->
                <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>

</nav>
