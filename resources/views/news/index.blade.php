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
                <div class="flex flex-col justify-center items-center lg:justify-between gap-x-5 lg:flex-row bg-white p-4 rounded-lg transition duration-[0.3s] ease-out shadow-lg">
                    {{--Zdjęcie--}}
                    @if($recentNews->image_path)
                        <img alt="{{ $recentNews->slug }}" src="{{ $recentNews->getURLImage() }}" class="mx-auto rounded-lg w-full sm:w-1/2 lg:w-auto lg:h-64">
                    @else
                        <div class="flex items-center justify-center w-full sm:w-1/2 lg:w-1/3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-800 size-24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                            </svg>
                        </div>
                    @endif
                    {{--Treść--}}
                    <article class="flex flex-col justify-center lg:mt-0 w-full lg:w-2/3">
                        <p class="text-sm text-center text-600 lg:text-right">Dodano: {{ $recentNews->formatedDate() }} <br> O godzinie: {{ $recentNews->formatedTime() }}</p>
                        <h3 class="text-2xl text-center text-green-600 mt-6 md:mt-0 font-semibold mb-2">{{ $recentNews->title }}</h3>
                        <p class="text-justify text-center text-lg">{!! $recentNews->getShortDescription(48) !!}</p>
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
        {{ $newsCollection->links() }}
    </div>
</x-app-layout>
