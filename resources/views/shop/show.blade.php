<x-app-layout>
    @section('title', 'Przedmiot ' . $item->name)

    <div class="container mx-auto mt-20 p-6">
        <div class="flex flex-wrap lg:flex-nowrap mb-12 gap-8">
            <!-- Sekcja zdjęcia -->
            <aside class="flex-shrink-0 flex items-center justify-center w-full lg:w-1/2 xl:w-1/3">
                @if($item->image_path)
                    <img alt="{{ $item->slug }}" src="{{ $item->getURLImage() }}" class="rounded-lg shadow-2xl" />
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-64 h-64 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
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
                </section>

                <!-- Opis -->
                <article class="prose max-w-none text-lg leading-relaxed text-gray-700 mt-6">
                    <p>{!! $item->description !!}</p>
                </article>

                <!-- Cena -->
                <section class="mt-8 w-full">
                    <div class=" text-green-600 text-3xl font-semibold py-4 px-6 rounded-lg shadow-md transform hover:scale-105 transition-transform duration-300 ease-in-out">
                        Cena w sklepie: {{ $item->getPrice() }}
                    </div>
                </section>
            </div>
        </div>
        <!-- Sekcja podobnych produktów -->
        <section class="bg-gray-100 border rounded-lg p-6 mt-12 shadow-lg">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Podobne produkty: </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($itemCollection as $singleItem)
                    <a href="{{ route('shop.show', $singleItem) }}">
                        <div x-data="{ visible: false }" class="product-card">
                            @if($item->image_path)
                                <img alt="{{ $item->slug }}" src="{{ $singleItem->getURLImage() }}" />
                            @endif
                            <div class="product-details">
                                <h5 class="text-center mt-4 product-name">{{ $singleItem->name }}</h5>
                                <p class="text-center text-lg font-bold text-green-600 mt-2">{{ $singleItem->getPrice() }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    </div>
</x-app-layout>
