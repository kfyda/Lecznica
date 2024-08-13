<x-app-layout>
    @section('title')
        {{ $service->name }}
    @endsection

    <x-header title="{{ $service->name }}" />

    <div class="p-6">
        <article class="">
            <p>{!! $service->description !!}</p>
        </article>
    </div>

    <div class="flex flex-wrap gap-4 justify-center my-16">
        @foreach($service->image_path as $image)
            <img alt="{{ $image }}" src="{{ '/storage/' . $image }}" class="md:h-48 rounded-lg" />
        @endforeach
    </div>
</x-app-layout>
