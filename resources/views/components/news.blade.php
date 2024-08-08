<div class="w-full p-3">
    {{--Zdjęcie--}}
    <img alt="{{ $news->slug }}" src="{{ $news->getURLImage() }}" class="mx-auto rounded-md">
    {{--Ogłoszenie 1--}}
    <article class="w-full h-48 mt-4 p-2">
        <h4 class="text-2xl font-bold text-nowrap text-ellipsis overflow-hidden">{{ $news->title }}</h4>
        <p class="mt-2 text-justify">{!! $news->getShortDescription(32) !!}</p>
    </article>
    <x-go-to-button :news="$news" />
</div>
