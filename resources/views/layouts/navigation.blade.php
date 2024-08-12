<nav x-data="{ open: false }" class="fixed top-0 z-50 bg-black w-full">
    <!-- Primary Navigation Menu -->
    <div class="w-full max-w-7xl mx-auto">
        <div class="flex justify-between items-center h-20 px-4">
            <!-- Logo and Text -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-4">
                    <img src="{{ asset('Images/cat2.png') }}" alt="Logo kota" class="h-12 w-auto">
                    <span class="text-white text-2xl font-semibold hidden md:block">
                    Lecznica weterynaryjna <span class="text-green-600">"Soczek"</span>
                    </span>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:flex sm:items-center">
                <x-nav-link :href="route('gallery.index')" :active="request()->routeIs('gallery.index')" class="text-white hover:text-green-300">
                    {{ __('Galeria') }}
                </x-nav-link>

                <x-nav-link :href="route('news.index')" :active="request()->routeIs('news.index')" class="text-white hover:text-green-300">
                    {{ __('Ogłoszenia') }}
                </x-nav-link>

                <x-dropdown align="left" width="48" :active="request()->routeIs('services.*')" class="text-white hover:text-green-300">
                    <x-slot name="trigger">
                        <button class="text-md leading-5 font-medium text-white bg-transparent hover:text-green-300 focus:outline-none transition ease-in-out duration-150">
                            <div>Usługi</div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @foreach($services as $service)
                            <x-dropdown-link :href="route('services.show', $service)" class="text-black hover:bg-green-100">
                                {{  $service->name }}
                            </x-dropdown-link>
                        @endforeach
                    </x-slot>
                </x-dropdown>

                <x-nav-link :href="route('shop.index')" :active="request()->routeIs('shop.index')" class="text-white hover:text-green-300">
                    {{ __('Sklep') }}
                </x-nav-link>

                <x-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.index')" class="text-white hover:text-green-300">
                    {{ __('Kontakt') }}
                </x-nav-link>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-green-300 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="absolute top-0 left-0 w-full bg-black bg-opacity-90 sm:hidden">
        <div class="space-y-1 px-4 py-2">
            <x-responsive-nav-link :href="route('gallery.index')" :active="request()->routeIs('gallery.index')" class="text-white hover:text-green-300">
                {{ __('Galeria') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('news.index')" :active="request()->routeIs('news.index')" class="text-white hover:text-green-300">
                {{ __('Ogłoszenia') }}
            </x-responsive-nav-link>

            <x-responsive-dropdown x-data="{openDropdown: false}" :active="request()->routeIs('services.*')" class="text-white hover:text-green-300">
                <x-slot:trigger>
                    <button @click="openDropdown = ! openDropdown" class="flex items-center">
                        <div>Usługi</div>
                    </button>
                </x-slot:trigger>

                <x-slot:content>
                    @foreach($services as $service)
                        <x-responsive-nav-link :href="route('services.show', $service)" :active="request()->routeIs('services.vaccination')" class="text-white hover:text-green-300">
                            {{ $service->name }}
                        </x-responsive-nav-link>
                    @endforeach
                </x-slot:content>
            </x-responsive-dropdown>

            <x-responsive-nav-link :href="route('shop.index')" :active="request()->routeIs('shop.index')" class="text-white hover:text-green-300">
                {{ __('Sklep') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.index')" class="text-white hover:text-green-300">
                {{ __('Kontakt') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t bg-gray-800 border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name ?? 'Gość' }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email ?? 'gosc@test.pl' }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:text-green-300">
                    {{ __('Profil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" class="text-white hover:text-green-300"
                                           onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Wyloguj się') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
