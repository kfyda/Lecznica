<x-app-layout>
    @section('title')
        {{ 'Ogłoszenia' }}
    @endsection

    <x-header title="Ogłoszenia" />

    <div class="p-6">
        <div class="flex flex-col justify-center mt-6 p-6 space-y-12">
            {{--Ogłoszenia--}}

            {{--Najnowsze ogłoszenie--}}
            <section>
                <h2 class="text-4xl font-semibold mb-4">Najnowsze</h2>
                <div class="flex flex-col justify-center items-center lg:justify-between gap-x-5 lg:flex-row bg-white p-4 rounded-lg transition duration-[0.3s] ease-out">
                    {{--Zdjęcie--}}
                    <img alt="{{ $recentNews->slug }}" src="{{ $recentNews->getURLImage() }}" class="mx-auto rounded-lg w-full sm:w-1/2 lg:w-auto lg:h-64">
                    {{--Treść--}}
                    <article class="flex flex-col justify-center lg:mt-0 w-full lg:w-2/3">
                        <p class="text-sm text-center text-green-600 lg:text-right">Dodano: {{ $recentNews->formatedDate() }} <br> O godzinie: {{ $recentNews->formatedTime() }}</p>
                        <h3 class="text-2xl text-center mt-6 md:mt-0 font-semibold mb-2">{{ $recentNews->title }}</h3>
                        <p class="text-justify text-lg">{!! $recentNews->getShortDescription(80) !!}</p>
                        <x-go-to-button :news="$recentNews" class="mt-4" />
                    </article>
                </div>
            </section>

            {{--Pozostałe ogłoszenia--}}
            <section class="p-4">
                <h2 class="text-3xl font-semibold mb-4">Zobacz również pozostałe ogłoszenia</h2>
                <div class="w-full flex grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 justify-between">
                    @foreach($newsCollection as $news)
                        <div class="bg-white">
                            <x-news :news="$news" wire:key="{{ $news->id }}" />
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
