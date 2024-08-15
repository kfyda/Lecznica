<x-app-layout>
    @section('title')
        {{ $service->name }}
    @endsection

    <x-header title="{{ $service->name }}" />

        <div class="p-4">
            <div class="flex flex-col md:flex-row items-center">
                <!-- Sekcja ze zdjęciem po lewej stronie -->
                <div class="md:w-1/2 flex items-center justify-center py-2">
                    <div class="w-full h-80 md:h-96 flex items-center justify-center">
                        <img alt="Zdjęcie kota" src="{{ asset('Images/pies1.jpg') }}" class="w-full h-full object-cover rounded-lg shadow-md" />
                    </div>
                </div>

                <!-- Sekcja z opisem usługi po prawej stronie -->
                <div class="md:w-1/2 p-4 flex flex-col">
                    <article class="prose text-center">
                        <!-- Nagłówek przed opisem -->
                        <h2 class="text-xl font-bold mb-4">Więcej szczegółów:</h2>
                        <p>{!! $service->description !!}</p>
                    </article>
                </div>
            </div>
        </div>

    <div class="flex flex-wrap gap-4 justify-center my-8">
        @foreach($service->image_path as $image)
            <img alt="{{ $image }}" src="{{ '/storage/' . $image }}" class="md:h-36 rounded-lg shadow-md" />
        @endforeach
    </div>
</x-app-layout>
