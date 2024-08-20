<x-app-layout>
    @section('title')
        {{ 'Ogłoszenie ' . $news->title }}
    @endsection

    <livewire:news-images :news="$news" />

    <div class="flex flex-col md:flex-row p-6 gap-x-4">
        <article class="md:w-3/4 p-4 md:border-r-2 md:border-gray-300/50 shadow-inner">
            <div class="">
                <p class="lg:text-right">Dodano: &nbsp;<time>{{ $news->formatedDate() }} <br> O
                        godzinie: {{ $news->formatedTime() }}</time>
                </p>
                <h2 class="text-4xl font-semibold text-center text-green-600 mt-8 lg:mt-0">{{ $news->title }}</h2>
            </div>
            <p class="mt-12 text-justify">{!! $news->description !!}</p>
        </article>
        <aside class="flex grid grid-cols-2 md:grid-cols-1 justify-center md:flex-col md:gap-y-6 w-full md:w-1/4">
            @foreach($newsCollection as $singleNews)
                <a href="{{ route('news.show', $singleNews) }}">
                    <x-news :news="$singleNews" wire:key="{{ $singleNews->id }}" />
                </a>
            @endforeach
        </aside>
    </div>
</x-app-layout>
