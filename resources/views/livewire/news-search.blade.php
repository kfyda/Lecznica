<div x-data="{ itemsPerPageOpen: false }" class="flex w-full">
    @if($newsCollection->first())
        <section class="mt-16">
            <h2 class="text-3xl font-semibold">Zobacz również pozostałe ogłoszenia</h2>
            <div class="w-full flex flex-col md:flex-row items-center justify-between bg-gray-100 rounded-lg gap-4 mb-6 p-4 shadow-md">
                <!-- Pasek wyszukiwania -->
                <div class="flex items-center w-full md:w-1/2 bg-white p-2 rounded-lg shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <input type="text" placeholder="Szukaj..." class="w-full h-10 px-3 rounded-md border-0 focus:ring-0 focus:outline-none" wire:model.live="search" />
                </div>

                <div class="flex justify-center md:justify-end w-1/2">
                    <!-- Pasek wyboru liczby elementów na stronie -->
                    <div class="relative">
                        <button @click="itemsPerPageOpen = !itemsPerPageOpen" class="flex items-center justify-between w-full md:w-auto px-4 py-2 bg-green-600 text-white font-semibold rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Wyświetl
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="itemsPerPageOpen" @click.away="itemsPerPageOpen = false" x-cloak
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10">
                            <ul class="divide-y divide-gray-200">
                                <li>
                                    <button @click="$wire.set('itemsPerPage', 8); itemsPerPageOpen = false" class="block px-4 py-2 text-black font-medium hover:bg-gray-100 w-full text-left">Wyświetl 8</button>
                                </li>
                                <li>
                                    <button @click="$wire.set('itemsPerPage', 16); itemsPerPageOpen = false" class="block px-4 py-2 text-black font-medium hover:bg-gray-100 w-full text-left">Wyświetl 16</button>
                                </li>
                                <li>
                                    <button @click="$wire.set('itemsPerPage', 24); itemsPerPageOpen = false" class="block px-4 py-2 text-black font-medium hover:bg-gray-100 w-full text-left">Wyświetl 24</button>
                                </li>
                                <li>
                                    <button @click="$wire.set('itemsPerPage', 36); itemsPerPageOpen = false" class="block px-4 py-2 text-black font-medium hover:bg-gray-100 w-full text-left">Wyświetl 36</button>
                                </li>
                                <li>
                                    <button @click="$wire.set('itemsPerPage', 1500); itemsPerPageOpen = false" class="block px-4 py-2 text-black font-medium hover:bg-gray-100 w-full text-left">Wyświetl wszystko</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="w-full flex grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 justify-between mb-10">
                @foreach($newsCollection as $news)
                    <div class="bg-white">
                        <x-news :news="$news" wire:key="{{ $news->id }}" />
                    </div>
                @endforeach
            </div>
            {{ $newsCollection->links() }}
        </section>
    @endif
</div>
