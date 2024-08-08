<x-app-layout>
    <div class="p-6">
        <h1 class="text-[64px] text-green-500 text-center font-semibold underline underline-offset-[16px]">Galeria</h1>

        <section class="flex flex-wrap gap-2 w-full mt-6 p-6 justify-center">
            {{--Zdjęcia--}}
            @foreach($photos as $photo)
                <img class="h-80" src="{{$photo->getURLImage()}}" alt="">
            @endforeach
        </section>
    </div>
</x-app-layout>
