<div class="flex justify-center bg-gradient-to-b from-gray-900 via-gray-800 to-black text-green-300 mt-20">

    @if($news->image_path)
        <img alt="{{ $news->slug }}" src="{{ $news->getURLImage() }}" class="max-h-[66vh] max-w-[50vw]" />
    @else
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
             stroke="currentColor" class="h-[70vh] size-64">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
        </svg>
    @endif
</div>
