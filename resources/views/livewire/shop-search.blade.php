<div class="flex w-full p-6 mt-6">
    {{--            <aside class="hidden lg:block w-1/4 xl:w-1/5 p-2">--}}
    {{--                <h3>Filter</h3>--}}
    {{--            </aside>--}}
    {{--            <section class="w-full lg:w-3/4 xl:w-4/5 p-2 gap-3">--}}
    <section class="w-full">
        <div class="w-full flex items-center bg-white gap-x-4 mb-4 p-4" wire:model.live="search">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-green-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input type="text" placeholder="Szukaj..." class="w-full h-8 px-2 rounded-sm border-2 focus-visible:outline-none focus:border-green-500 transition duration-150 ease-in-out" />
        </div>
        <div class="flex grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 justify-between">
            @foreach($items as $item)
                <a href="{{ route('shop.show', $item) }}">
                    <div class="relative w-full bg-white rounded-sm p-4">
                        <img alt="{{ $item->slug }}" src="{{ $item->getURLImage() }}" class="mx-auto rounded-sm" />
                        <h5 class="text-center mt-2">{{ $item->name }}</h5>
                        <p class="text-center text-sm">{{ $item->price }} zł</p>

                        @if($item->is_available)
                            <div
                                class="absolute flex flex-col items-center justify-center z-20 top-5 right-5 rounded-md bg-green-500">
                                <p x-show>Dostępny</p>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                            </div>
                        @else
                            <div class="absolute flex flex-col items-center justify-center z-20 top-5 right-5 rounded-md bg-red-500">
                                <p class="hidden hover:block">Niedostępny</p>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </div>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
{{--        <div class="bg-yellow-500 w-[80vw] h-[80vh] fixed top-[55%] left-[50%] translate-x-[-50%] translate-y-[-50%] z-100">--}}

{{--        </div>--}}
        {{ $items->links() }}
    </section>
</div>
