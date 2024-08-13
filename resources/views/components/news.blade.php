<div class="flex flex-col items-center p-3 bg-white rounded-lg hover:scale-105 transition duration-[0.3s] ease-out gap-y-2">
    {{--Zdjęcie--}}
    <div class="h-48">
        <img alt="{{ $news->slug }}" src="{{ $news->getURLImage() }}" class="mx-auto max-h-48 rounded-lg">
    </div>
    {{--Ogłoszenie 1--}}
    <article class="w-full p-2">
        <h4 class="text-2xl font-bold text-nowrap text-ellipsis overflow-hidden border-b-4 border-green-600">{{ $news->title }}</h4>
        <p class="text-sm text-center mt-2"><time>Dodano: {{ $news->formatedDate() }} <br> O godzinie: {{ $news->formatedTime() }}</time></p>
        <p class="mt-2 text-justify overflow-hidden">{!! $news->getShortDescription(32) !!}</p>
    </article>
    <x-go-to-button :news="$news" />
</div>
