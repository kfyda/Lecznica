<div class="flex flex-col items-center p-3 bg-white rounded-lg hover:scale-105 transition duration-[0.3s] ease-out">
    {{--Zdjęcie--}}
    <img alt="{{ $news->slug }}" src="{{ $news->getURLImage() }}" class="mx-auto rounded-lg">
    {{--Ogłoszenie 1--}}
    <article class="w-full h-56 mt-4 p-2">
        <h4 class="text-2xl font-bold text-nowrap text-ellipsis overflow-hidden border-b-4 border-green-600">{{ $news->title }}</h4>
        <p class="text-sm text-green-600 text-center mt-2">Dodano: {{ $news->formatedDate() }}</p>
        <p class="mt-2 text-justify">{!! $news->getShortDescription(32) !!}</p>
    </article>
    <x-go-to-button :news="$news" />
</div>
