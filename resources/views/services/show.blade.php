<x-app-layout>
    <div class="flex justify-center bg-gray-700">
        @foreach($service->image_path as $image)
            <img alt="{{ $image }}" src="{{ '/storage/' . $image }}" class="h-[70vh]" />
        @endforeach
    </div>
    <div>
        <h1>{{ $service->name }}</h1>
        <p>{{ $service->description }}</p>
    </div>
</x-app-layout>
