<x-app-layout>
    <div class="flex justify-center bg-gray-700">
        <img alt="{{ $news->slug }}" src="{{ $news->getURLImage() }}" class="h-[70vh]" />
    </div>
    <div class="flex flex-col md:flex-row p-6 gap-x-4">
        <article class="md:w-3/4 p-4 md:border-r-2 md:border-gray-300/50">
            <div class="relative flex justify-between">
                <h2 class="text-4xl font-semibold mt-8 md:mt-0">{{ $news->title }}</h2>
                <p class="absolute md:static">Dodano: &nbsp;<time>{{ $news->formatedDate() }}</time></p>
            </div>
            <p class="mt-12">{!! $news->description !!}</p>
        </article>
        <aside class="flex grid grid-cols-2 md:grid-cols-1 justify-center md:flex-col md:gap-y-6 w-full md:w-1/4">
            @foreach($newsCollection as $singleNews)
                <a href="{{ route('news.show', $singleNews) }}">
                    <div class="bg-white rounded-md h-72 md:h-64 w-auto p-2">
                        <img class="mx-auto w-64 md:w-48 rounded-sm mt-2 mb-2" src="{{ $singleNews->getURLImage() }}" />
                        <h3 class="text-center font-semibold text-nowrap text-ellipsis overflow-hidden">{{ $singleNews->title }}</h3>
                        <p class="text-sm text-center mt-4">Dodano: &nbsp;<time>{{ $news->formatedDate() }}</time></p>
                    </div>
                </a>
            @endforeach
        </aside>
    </div>
</x-app-layout>
