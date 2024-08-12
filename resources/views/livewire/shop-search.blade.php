<div x-data="{ filterOpen: false }" class="flex w-full p-6 mt-6">
    <section class="w-full">
        <div class="w-full flex items-center bg-white gap-x-4 mb-4 p-4">
            <!-- Pasek wyszukiwania -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-green-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input type="text" placeholder="Szukaj..." class="w-full h-8 px-2 rounded-sm border-2 focus-visible:outline-none focus:border-green-500 transition duration-150 ease-in-out" wire:model="search" />
        </div>
        <!-- Filtr sortowania -->
        <div class="relative">
            <button @click="filterOpen = !filterOpen" class="flex items-center px-4 py-2 border-2 border-gray-300 rounded-md bg-white text-gray-700 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500">
                Sortuj
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="filterOpen" @click.away="filterOpen = false" class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg z-10">
                <ul class="divide-y divide-gray-200">
                    <li>
                        <button wire:click="$set('sortOption', 'price_asc')" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 w-full text-left">Cena: rosnąco</button>
                    </li>
                    <li>
                        <button wire:click="$set('sortOption', 'price_desc')" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 w-full text-left">Cena: malejąco</button>
                    </li>
                    <li>
                        <button wire:click="$set('sortOption', 'alphabetical')" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 w-full text-left">Alfabetycznie</button>
                    </li>
                    <li>
                        <button wire:click="$set('sortOption', 'latest')" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 w-full text-left">Ostatnio dodane</button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 justify-between">
            @foreach($items as $item)
                <a href="{{ route('shop.show', $item) }}">
                    <div x-data="{ visible: false }" class="relative w-full bg-white rounded-sm p-4">
                        <img alt="{{ $item->slug }}" src="{{ $item->getURLImage() }}" class="mx-auto rounded-sm" />
                        <h5 class="text-center mt-2">{{ $item->name }}</h5>
                        <p class="text-center text-sm">{{ $item->price }} zł</p>

                        @if($item->is_available)
                            <div
                                @mouseover="visible = true"
                                @mouseleave="visible = false"
                                class="relative flex items-center justify-center w-10 h-10 rounded-full bg-green-500 text-white">
                                <p x-show="visible" class="absolute top-full mt-2 text-xs bg-black text-white px-2 py-1 rounded">Dostępny</p>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                            </div>
                        @else
                            <div
                                @mouseover="visible = true"
                                @mouseleave="visible = false"
                                class="relative flex items-center justify-center w-10 h-10 rounded-full bg-red-500 text-white">
                                <p x-show="visible" class="absolute top-full mt-2 text-xs bg-black text-white px-2 py-1 rounded">Niedostępny</p>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </div>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
        {{ $items->links() }}
    </section>
</div>
