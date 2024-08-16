<div class="product-card">
    @if($item->image_path)
        <img alt="{{ $item->slug }}" src="{{ $item->getURLImage() }}" />
    @endif
    <div class="product-details">
        <h5 class="text-center mt-4 product-name">{{ $item->name }}</h5>
        <div class="mt-5 flex items-center justify-center gap-4">
            <h5 class="text-lg">Kategoria: </h5>
            <p class="bg-green-500 rounded-md px-2 py-1 text-white font-semibold">{{ $item->category }}</p>
        </div>
        <p class="text-center text-lg font-bold text-green-600 mt-2">{{ $item->getPrice() }}</p>
    </div>
</div>
