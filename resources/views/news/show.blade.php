<x-app-layout>
    @section('title')
        {{ 'Ogłoszenie ' . $news->title }}
    @endsection

    <div class="flex justify-center bg-green-500 mt-20">
        @if($news->image_path)
            <img alt="{{ $news->slug }}" src="{{ $news->getURLImage() }}" class="max-w-[32rem]" />
        @else
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-[70vh] size-64">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
            </svg>
        @endif
    </div>
    <div class="flex flex-col md:flex-row p-6 gap-x-4">
        <article class="md:w-3/4 p-4 md:border-r-2 md:border-gray-300/50 shadow-inner">
            <div class="">
                <p class="lg:text-right">Dodano: &nbsp;<time>{{ $news->formatedDate() }} <br> O godzinie: {{ $news->formatedTime() }}</time></p>
                <h2 class="text-4xl font-semibold text-center text-green-600 mt-8 lg:mt-0">{{ $news->title }}</h2>
            </div>
            <p class="mt-12 text-justify">{!! $news->description !!}</p>
        </article>
        <aside class="flex grid grid-cols-2 md:grid-cols-1 justify-center md:flex-col md:gap-y-6 w-full md:w-1/4">
            @foreach($newsCollection as $singleNews)
{{--                <a href="{{ route('news.show', $singleNews) }}">--}}
                    <div class="flex flex-col items-center justify-center bg-white rounded-md h-72 md:h-64 p-2 shadow-lg">
                        <div>
                            @if($singleNews->image_path)
                                <img class="mx-auto w-64 md:w-48 rounded-sm mt-2 mb-2" src="{{ $singleNews->getURLImage() }}" />
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-800 size-24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                                </svg>
                            @endif
                        </div>
                        <div class="w-full">
                            <h3 class="text-center font-semibold text-nowrap text-ellipsis overflow-hidden">{{ $singleNews->title }}</h3>
                            <p class="text-sm text-center mt-4">Dodano: &nbsp;<time>{{ $news->formatedDate() }} </br> O godzinie: {{ $news->formatedTime() }}</time></p>
                        </div>
                    </div>
{{--                </a>--}}
            @endforeach
        </aside>
    </div>
</x-app-layout>
