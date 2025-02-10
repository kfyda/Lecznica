<div class="product-card">
    @if($item->image_path)
        <img alt="{{ $item->slug }}" src="{{ $item->getURLImage() }}" />
    @endif
    <div class="product-details">
        <h5 class="text-center mt-4 product-name truncate">{{ $item->name }}</h5>
        <div class="mt-5 flex items-center justify-center gap-4 w-full">
            <h5 class="text-lg">Kategoria: </h5>
            <p class="bg-green-500 rounded-md px-2 py-1 text-white font-semibold">{{ $item->category }}</p>
        </div>
        <div class="mt-5 px-5 flex items-center justify-center gap-4 w-full">
            <h5 class="text-lg w-1/3">Zwierzę: </h5>
            <p class="bg-yellow-400 rounded-md px-2 py-1 text-white text-center font-semibold w-2/3">{{ $item->animal_type }}</p>
        </div>
        {{-- <p class="text-center text-lg font-bold text-green-600 mt-2">{{ $item->getPrice() }}</p> --}}
    </div>
</div>
