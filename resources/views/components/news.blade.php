
    <div class="flex flex-col justify-between gap-x-5 md:flex-row bg-white p-4 rounded-md">
            {{--Zdjęcie--}}
            <img alt="{{ $news->slug }}" src="{{ $news->getURLImage() }}" class="w-full md:w-1/3 rounded-md">
            {{--Ogłoszenie 1--}}
            <article class="w-full">
                <h3 class="text-2xl mt-6 md:mt-0 font-semibold mb-3">{{ $news->title }}</h3>
                <p class="text-justify text-lg">{!! $news->getShortDescription(64) !!}</p>
            </article>
    </div>

