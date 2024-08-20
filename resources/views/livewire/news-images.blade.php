<div
    class="relative flex justify-center items-center bg-gradient-to-b from-gray-900 via-gray-800 text-white to-black gap-x-12 mt-20">
    @if(!empty($news->image_path) && is_array($news->image_path) && count($news->image_path) > 0)
        <button wire:click="getPreviousImage()"
                class="absolute left-0 md:left-24 lg:left-54 md:block opacity-50 hover:opacity-100 transition duration-150 ease-in">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="size-12 xl:size-24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </button>
        <div class="w-full md:w-1/2 flex items-center justify-center">
            <img alt="{{ $image }}" src="{{ '/storage/' . $image }}" class="max-h-[66vh] md:max-w-[50vw]" />
        </div>
        <button wire:click="getNextImage()"
                class="absolute right-0 md:right-24 lg:right-54 md:block opacity-50 hover:opacity-100 transition duration-150 ease-in">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="size-12 xl:size-24">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </button>
    @else
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
             stroke="currentColor" class="h-[70vh] size-64 text-green-300">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
        </svg>
    @endif
</div>
