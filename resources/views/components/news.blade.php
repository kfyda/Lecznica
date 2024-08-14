<div class="flex flex-col items-center p-3 bg-white rounded-lg hover:scale-105 transition duration-[0.3s] ease-out gap-y-2 shadow-lg">
    {{--Zdjęcie--}}
    <div class="h-48 flex items-center">
        @if($news->image_path)
            <img alt="{{ $news->slug }}" src="{{ $news->getURLImage() }}" class="mx-auto max-h-48 rounded-lg">
        @else
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-800 size-16">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
            </svg>
        @endif
    </div>
    {{--Ogłoszenie 1--}}
    <article class="w-full p-2 h-64">
        <h4 class="text-2xl font-bold text-nowrap text-ellipsis overflow-hidden border-b-4 border-green-600">{{ $news->title }}</h4>
        <p class="text-sm text-center mt-2"><time>Dodano: {{ $news->formatedDate() }} <br> O godzinie: {{ $news->formatedTime() }}</time></p>
        <p class="mt-2 text-justify overflow-hidden">{!! $news->getShortDescription(16) !!}</p>
    </article>
    <x-go-to-button :news="$news" />
</div>
