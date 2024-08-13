<div class="p-2 text-white rounded-lg bg-green-500 hover:bg-green-400 w-48 transition duration-150 ease-in-out {{ $class ?? '' }}">
    <a href="{{ route('news.show', $news) }}" class="flex justify-between items-center gap-x-2">
        <p>
            Przejdź do artykułu
        </p>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
    </a>
</div>
