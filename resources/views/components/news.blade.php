
    <div class="flex flex-col justify-between space-x-4 md:flex-row bg-yellow-500">
            {{--Zdjęcie--}}
            <img alt="{{ $news->slug }}" src="{{ $news->getURLImage() }}" class="w-full md:w-1/3">
            {{--Ogłoszenie 1--}}
            <article class="w-full md:p-4 md:w-2/3 gap-4">
                <h3 class="text-2xl mb-3">{{ $news->title }}</h3>
                <p class="text-justify text-lg">{{ $news->getShortDescription(64) }}</p>
            </article>
    </div>

