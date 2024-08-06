<x-app-layout>
    <div class="p-6">
        <h1 class="text-[64px] text-green-500 text-center font-semibold underline underline-offset-[16px]">Ogłoszenia</h1>

        <section class="flex flex-col w-full justify-center mt-6 p-6 bg-blue-300 space-y-12">
            {{--Ogłoszenia--}}
            @foreach($newsCollection as $news)
                <a href="{{route('news.show', $news)}}">
                    <x-news :news="$news" wire:key="{{ $news->id }}" />
                </a>
            @endforeach
        </section>
    </div>
</x-app-layout>
