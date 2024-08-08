<x-app-layout>
    <div class="p-6">
        <h1 class="text-[64px] text-green-500 text-center font-semibold underline underline-offset-[16px]">Ogłoszenia</h1>

        <section class="flex flex-col justify-center mt-6 p-6 space-y-12">
            {{--Ogłoszenia--}}

            {{--Najnowsze ogłoszenie--}}
            <div>
                <h2 class="text-4xl font-semibold mb-4">Najnowsze ogłoszenie</h2>
                <div class="flex flex-col justify-center lg:justify-between gap-x-5 lg:flex-row bg-white p-4 rounded-md">
                    {{--Zdjęcie--}}
                    <img alt="{{ $recentNews->slug }}" src="{{ $recentNews->getURLImage() }}" class="mx-auto rounded-md w-full md:w-2/3 lg:w-1/3">
                    {{--Ogłoszenie 1--}}
                    <article class="mt-4 lg:mt-0">
                        <h3 class="text-2xl text-center mt-6 md:mt-0 font-semibold mb-3">{{ $recentNews->title }}</h3>
                        <p class="text-justify text-lg">{!! $recentNews->getShortDescription(80) !!}</p>
                    </article>
                </div>
            </div>

            {{--Pozostałe ogłoszenia--}}
            <div>
                <h2 class="text-3xl font-semibold mb-4">Zobacz również pozostałe ogłoszenia</h2>
                <div class="w-full flex flex-wrap">
                    @foreach($newsCollection as $news)
                        <a class="md:w-1/2 lg:w-1/3" href="{{route('news.show', $news)}}">
                            <x-news :news="$news" wire:key="{{ $news->id }}" />
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
