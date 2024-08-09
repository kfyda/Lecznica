<x-app-layout>
    <div class="p-6">
        <h1 class="text-[64px] text-green-500 text-center font-semibold underline underline-offset-[16px]">Ogłoszenia</h1>

        <div class="flex flex-col justify-center mt-6 p-6 space-y-12">
            {{--Ogłoszenia--}}

            {{--Najnowsze ogłoszenie--}}
            <section>
                <h2 class="text-4xl font-semibold mb-4">Najnowsze ogłoszenie</h2>
                <div class="flex flex-col justify-center lg:justify-between gap-x-5 xl:flex-row bg-white p-4 rounded-sm">
                    {{--Zdjęcie--}}
                    <img alt="{{ $recentNews->slug }}" src="{{ $recentNews->getURLImage() }}" class="mx-auto rounded-sm w-full md:w-1/2 xl:w-1/3">
                    {{--Ogłoszenie 1--}}
                    <article class="mt-4 lg:mt-0 w-full xl:w-2/3">
                        <h3 class="text-2xl text-center mt-6 md:mt-0 font-semibold mb-3">{{ $recentNews->title }}</h3>
                        <p class="text-justify text-lg mb-4">{!! $recentNews->getShortDescription(80) !!}</p>
                        <x-go-to-button :news="$recentNews" />
                    </article>
                </div>
            </section>

            {{--Pozostałe ogłoszenia--}}
            <section class="mb-12">
                <h2 class="text-3xl font-semibold mb-4">Zobacz również pozostałe ogłoszenia</h2>
                <div class="w-full flex grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-between">
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
