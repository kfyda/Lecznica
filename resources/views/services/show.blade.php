<x-app-layout>
    @section('title')
        {{ $service->name }}
    @endsection

    <x-header title="{{ $service->name }}" />

        <div class="p-6">
            <div class="flex flex-col md:flex-row gap-x-10 p-6">
                <!-- Sekcja ze zdjęciem po lewej stronie -->
                <div class="md:w-1/2 items-center flex justify-center">
                    <img alt="{{ $service->slug }}" src="{{ $service->getURLImage() }}" class="rounded-lg shadow-md max-h-[65vh] max-w-[45vw]" />
                </div>

                <!-- Sekcja z opisem usługi po prawej stronie -->
                <div class="md:w-1/2 p-4 flex flex-col">
                    <article class="prose text-center">
                        <!-- Nagłówek przed opisem -->
                        <h2 class="text-xl font-bold mb-4">Więcej szczegółów:</h2>
                        <p class="text-justify">{!! $service->description !!}</p>
                    </article>
                </div>
            </div>
        </div>

{{--    <div class="flex flex-wrap gap-4 justify-center my-8">--}}
{{--        @foreach($service->image_path as $image)--}}
{{--            <img alt="{{ $image }}" src="{{ '/storage/' . $image }}" class="md:h-36 rounded-lg shadow-md" />--}}
{{--        @endforeach--}}
{{--    </div>--}}
</x-app-layout>
