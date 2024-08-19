@if($items->first())
<div x-data="{ filterOpen: false, itemsPerPageOpen: false, categoryFilterOpen: false, itemsPerPage: 12 }" class="flex w-full p-6 mt-6">
    <section class="w-full">
        <div class="w-full flex flex-col md:flex-row items-center justify-between bg-gray-100 rounded-lg gap-4 mb-6 p-4 shadow-md">
            <!-- Pasek wyszukiwania -->
            <div class="flex items-center w-full md:w-1/2 bg-white p-2 rounded-lg shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input type="text" placeholder="Szukaj..." class="w-full h-10 px-3 rounded-md border-0 focus:ring-0 focus:outline-none" wire:model.live="search" />
            </div>
            <div class="flex flex-col gap-y-4 md:gap-y-0 md:flex-row">
                <!-- Pasek wyboru liczby elementów na stronie -->
                <div class="relative w-full md:w-1/3 mr-4">
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
                                <button @click="$wire.set('itemsPerPage', 12); itemsPerPageOpen = false" class="block px-4 py-2 text-black font-medium hover:bg-gray-100 w-full text-left">Wyświetl 12</button>
                            </li>
                            <li>
                                <button @click="$wire.set('itemsPerPage', 24); itemsPerPageOpen = false" class="block px-4 py-2 text-black font-medium hover:bg-gray-100 w-full text-left">Wyświetl 24</button>
                            </li>
                            <li>
                                <button @click="$wire.set('itemsPerPage', 36); itemsPerPageOpen = false" class="block px-4 py-2 text-black font-medium hover:bg-gray-100 w-full text-left">Wyświetl 36</button>
                            </li>
                            <li>
                                <button @click="$wire.set('itemsPerPage', 48); itemsPerPageOpen = false" class="block px-4 py-2 text-black font-medium hover:bg-gray-100 w-full text-left">Wyświetl 48</button>
                            </li>
                            <li>
                                <button @click="$wire.set('itemsPerPage', 1500); itemsPerPageOpen = false" class="block px-4 py-2 text-black font-medium hover:bg-gray-100 w-full text-left">Wyświetl wszystko</button>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Filtr kategorii -->
                <div class="relative w-full md:w-1/3 mr-4">
                    <button @click="categoryFilterOpen = !categoryFilterOpen" class="flex items-center justify-between w-full md:w-auto px-4 py-2 bg-green-600 text-white font-semibold rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Kategorie
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="categoryFilterOpen" @click.away="categoryFilterOpen = false" x-cloak
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10">
                        <ul class="divide-y divide-gray-200">
                            <li wire:key="all-categories">
                                <button wire:click="$set('categoryOption', '')" @click="categoryFilterOpen = false" class="block px-4 py-2 text-black font-medium hover:bg-gray-100 w-full text-left">Wszystkie</button>
                            </li>
                            @foreach(\App\Enums\CategoryTypes::values() as $category)
                                <li wire:key="{{ $category }}">
                                    <button wire:click="$set('categoryOption', '{{ $category }}')" @click="categoryFilterOpen = false" class="block px-4 py-2 text-black font-medium hover:bg-gray-100 w-full text-left">{{ $category }}</button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Filtr sortowania -->
                <div class="relative w-full md:w-auto">
                    <button @click="filterOpen = !filterOpen" class="flex items-center justify-between w-full md:w-auto px-4 py-2 bg-green-600 text-white font-semibold rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Sortuj
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="filterOpen" @click.away="filterOpen = false" x-cloak
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10">
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
        </div>


        <!-- Reszta kodu pozostaje bez zmian -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-10">
            @foreach($items as $item)
                <a href="{{ route('shop.show', $item) }}">
                    <x-shop-item :item="$item" wire:key="{{ $item->id }}" />
                </a>
            @endforeach
        </div>
        {{ $items->links() }}
    </section>
</div>
@else
    <div class="flex items-center justify-center h-[20vh]">
        <h1 class="text-4xl text-center">Aktualnie nie odnaleziono żadnych przedmiotów w sklepie. <br> Przepraszamy za utrudnienia. &#128575;</h1>
    </div>
@endif
