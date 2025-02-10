<x-app-layout>
    @section('title')
        {{ 'Strona Główna' }}
    @endsection

    <div class="text-[#1e212b]">
        @include('layouts.home-header')
        <head>
            <!-- Inne meta tagi, linki i skrypty -->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        </head>

        <!-- Sekcja "O nas" -->
        <section class="bg-gradient-to-r from-green-700 via-green-300 to-green-700 text-grey py-20">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-6xl font-extrabold text-[#333333]">O nas</h2>
                    <p class="mt-6 text-xl max-w-2xl mx-auto leading-relaxed text-[#333333]">
                        Lecznica weterynaryjna “Soczek” działa na rynku już od ponad 20 lat, oferując kompleksową opiekę
                        weterynaryjną dla wszystkich rodzajów zwierząt. Nasz zespół doświadczonych specjalistów jest
                        gotowy, by nieść pomoc Twoim pupilom przez całą dobę.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 @if($services->isNotEmpty()) lg:grid-cols-3 @endif">
                    @if($services->isNotEmpty())
                        <div class="bg-white text-[#1e212b] p-8 rounded-lg shadow-lg">
                            <h3 class="text-3xl font-bold mb-4 border-b-4 border-green-600 inline-block">Nasze
                                specjalizacje</h3>
                            <ul class="mt-4 space-y-2 text-lg">

                                @foreach($services as $service)
                                    <li class="flex items-center">
                                        <span
                                            class="material-icons text-green-600 mr-2">check_circle</span>{{ $service->name }}
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    @endif

                <div class="bg-white text-[#1e212b] p-8 rounded-lg shadow-lg">
                    <h3 class="text-4xl font-bold mb-4 border-b-4 border-green-600 inline-block">Nasi lekarze</h3>
                    <ul class="mt-4 space-y-4 text-lg">
                        <li class="text-center">
                            <strong>Dr. Janusz Soczek</strong>
                        </li>
                        <li class="flex justify-center mt-3">
                            <img src="{{ asset('Images/soczek_janusz1.jpg') }}" alt="Janusz Soczek"
                                class="w-40 h-40 rounded-full shadow-lg">
                        </li>
                        <li class="text-center">
                            <strong>Dr. Wioletta Klara Soczek</strong>
                        </li>
                        <li class="flex justify-center mt-3">
                            <img src="{{ asset('Images/pies6.jpg') }}" alt="Wioletta Klara Soczek"
                                class="w-40 h-40 rounded-full shadow-lg">
                        </li>
                        <li class="text-center">
                            <strong>Dr. Ihor Ihorowski</strong>
                        </li>
                        <li class="flex justify-center mt-3">
                            <img src="{{ asset('Images/soczek_janusz1.jpg') }}" alt="Janusz Soczek"
                                class="w-40 h-40 rounded-full shadow-lg">
                        </li>
                    </ul>
                </div>


                    <div class="bg-white text-[#1e212b] p-8 rounded-lg shadow-lg">
                        <h3 class="text-3xl font-bold mb-4 border-b-4 border-green-600 inline-block">Nasza misja</h3>
                        <p class="mt-4 text-lg leading-relaxed">
                            Naszą misją jest zapewnienie najwyższej jakości opieki weterynaryjnej, która obejmuje nie
                            tylko leczenie, ale także profilaktykę i edukację właścicieli zwierząt. Wierzymy, że zdrowie
                            i dobrostan zwierząt są nierozerwalnie związane z wiedzą i zaangażowaniem ich opiekunów.
                        </p>
                        <p class="mt-4 text-lg leading-relaxed">
                            Dbamy o zdrowie i dobrostan Twoich zwierząt, oferując najwyższej jakości usługi
                            weterynaryjne. Zapraszamy do skorzystania z naszych usług i dołączenia do grona zadowolonych
                            klientów Lecznicy weterynaryjnej “Soczek”.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Sekcja najnowsze ogłoszenia --}}
        @if($newsCollection->isNotEmpty())
            <section class="py-20 relative">
                <div class="max-w-7xl mx-auto px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <h2 class="text-6xl font-extrabold text-[#333333] text-green-700">Najnowsze ogłoszenia</h2>
                        <p class="mt-6 text-xl max-w-2xl mx-auto leading-relaxed text-[#333333]">
                            Bądź na bieżąco z aktualnościami.
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-24">
                        @foreach($newsCollection as $news)
                            <a href="{{ route('news.show', ['news' => $news->slug]) }}" class="block"> <!-- Użycie slug zamiast id -->
                                <x-news :news="$news" wire:key="{{ $news->id }}" />
                            </a>
                        @endforeach
                    </div>
                    <a href="{{ route('news.index') }}">
                        <div
                            class="absolute text-white flex flex-col items-center w-64 rounded-lg p-2 bg-green-500 bottom-12 left-1/2 -translate-x-1/2 inset-x-0 hover:bg-green-400 hover:scale-105 shadow-lg transition duration-[0.3s] ease-in-out">
                            <p class="text-xl font-semibold">Zobacz więcej ogłoszeń</p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="size-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m9 12.75 3 3m0 0 3-3m-3 3v-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                    </a>
                </div>
            </section>
        @endif
    </div>
</x-app-layout>
