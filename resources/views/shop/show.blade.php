<x-app-layout>
    @section('title', 'Przedmiot ' . $item->name)

    <div class="container mx-auto mt-20 p-6">
        <div class="flex flex-wrap md:items-center lg:items-start mx-auto lg:flex-nowrap mb-12 gap-8">
            <!-- Sekcja zdjęcia -->
            <aside class="flex-shrink-0 flex justify-center w-full md:w-1/2">
                @if($item->image_path)
                    <img alt="{{ $item->slug }}" src="{{ $item->getURLImage() }}"
                         class="rounded-lg shadow-2xl max-h-[60vh] max-w-[80vw] md:max-w-[33vw]" />
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-64 h-64 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                @endif
            </aside>

            <!-- Sekcja informacji o produkcie -->
            <div class="flex-1 flex flex-col justify-center items-center lg:items-start text-center lg:text-left">
                <!-- Tytuł -->
                <section class="mb-4">
                    <h1 class="text-5xl font-extrabold text-gray-900 tracking-tight leading-tight mb-2">
                        {{ $item->name }}
                    </h1>
                    <div class="h-1 w-24 bg-green-500 rounded-full"></div>
                    <div class="mt-5 flex items-center gap-4">
                        <div class="flex gap-4">
                            <h2 class="text-lg">Kategoria: </h2>
                            <p class="bg-green-500 rounded-md px-2 py-1 text-white font-semibold">{{ $item->category }}</p>
                        </div>
                        <div class="flex gap-4">
                            <h2 class="text-lg">Zwierzę: </h2>
                            <p class="bg-yellow-400 rounded-md px-2 py-1 text-white font-semibold">{{ $item->animal_type }}</p>
                        </div>
                    </div>
                </section>

                <!-- Opis -->
                <article class="prose max-w-none text-lg leading-relaxed text-gray-700 mt-6">
                    <p>{!! $item->description !!}</p>
                </article>

                {{-- <!-- Cena -->
                <section class="mt-8 w-full">
                    <div
                        class=" text-green-600 text-3xl font-semibold py-4 px-6 rounded-lg shadow-md transform hover:scale-105 transition-transform duration-300 ease-in-out">
                        Cena w sklepie: {{ $item->getPrice() }}
                    </div>
                </section> --}}
            </div>
        </div>

        <!-- Sekcja podobnych produktów -->
        @if($itemCollection->isNotEmpty())
            <section class="bg-gray-100 border rounded-lg p-6 mt-12 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Podobne produkty: </h2>
                <div class="flex flex-wrap justify-center gap-6">
                    @foreach($itemCollection as $singleItem)
                        <a href="{{ route('shop.show', $singleItem) }}">
                            <x-shop-item :item="$singleItem" wire:key="{{ $singleItem->id }}" />
                        </a>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
</x-app-layout>
