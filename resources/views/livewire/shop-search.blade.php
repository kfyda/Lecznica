<div x-data="{ filterOpen: false }" class="flex w-full p-6 mt-6">
    <section class="w-full">
        <div class="w-full flex flex-col md:flex-row items-center bg-gray-100 rounded-lg gap-4 mb-6 p-4 shadow-md">
            <!-- Pasek wyszukiwania -->
            <div class="flex items-center w-full md:w-1/2 bg-white p-2 rounded-lg shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input type="text" placeholder="Szukaj..." class="w-full h-10 px-3 rounded-md border-0 focus:ring-0 focus:outline-none" wire:model.live="search" />
            </div>
            <!-- Filtr sortowania -->
            <div class="relative w-full md:w-auto ml-auto">
                <button @click="filterOpen = !filterOpen" class="flex items-center justify-between w-full md:w-auto px-4 py-2 bg-green-600 text-white font-semibold rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Sortuj
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="filterOpen" @click.away="filterOpen = false" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10">
                    <ul class="divide-y divide-gray-200">
                        <li>
                            <button wire:click="$set('sortOption', 'price_asc')" class="block px-4 py-2 text-black font-medium hover:bg-gray-100 w-full text-left">Cena: rosnąco</button>
                        </li>
                        <li>
                            <button wire:click="$set('sortOption', 'price_desc')" class="block px-4 py-2 text-black font-medium hover:bg-gray-100 w-full text-left">Cena: malejąco</button>
                        </li>
                        <li>
                            <button wire:click="$set('sortOption', 'alphabetical')" class="block px-4 py-2 text-black font-medium hover:bg-gray-100 w-full text-left">Alfabetycznie</button>
                        </li>
                        <li>
                            <button wire:click="$set('sortOption', 'latest')" class="block px-4 py-2 text-black font-medium hover:bg-gray-100 w-full text-left">Ostatnio dodane</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-10">
            @foreach($items as $item)
                <a href="{{ route('shop.show', $item) }}">
                    <div x-data="{ visible: false }" class="product-card">
                        <img alt="{{ $item->slug }}" src="{{ $item->getURLImage() }}" />
                        <div class="product-details">
                            <h5 class="text-center mt-4 product-name">{{ $item->name }}</h5>
                            <p class="text-center text-lg font-bold text-green-600 mt-2">{{ $item->getPrice() }} zł</p>
                        </div>

{{--                        @if($item->is_available)--}}
{{--                            <div--}}
{{--                                @mouseover="visible = true"--}}
{{--                                @mouseleave="visible = false"--}}
{{--                                class="absolute top-2 right-2 flex items-center justify-center w-10 h-10 rounded-full bg-green-500 text-white shadow-lg">--}}
{{--                                <p x-show="visible" class="absolute top-full mt-2 text-xs bg-black text-white px-2 py-1 rounded-md">Dostępny</p>--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">--}}
{{--                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                        @else--}}
{{--                            <div--}}
{{--                                @mouseover="visible = true"--}}
{{--                                @mouseleave="visible = false"--}}
{{--                                class="absolute top-2 right-2 flex items-center justify-center w-10 h-10 rounded-full bg-red-500 text-white shadow-lg">--}}
{{--                                <p x-show="visible" class="absolute top-full mt-2 text-xs bg-black text-white px-2 py-1 rounded-md">Niedostępny</p>--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">--}}
{{--                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                        @endif--}}
                    </div>
                </a>
            @endforeach
        </div>
        {{ $items->links() }}
    </section>
</div>
