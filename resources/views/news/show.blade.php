<x-app-layout>
    <h1>{{ $news->title }}</h1>
    <img alt="{{ $news->slug }}" src="{{ $news->getURLImage() }}" />
    <p>{!! $news->description !!}</p>
</x-app-layout>
