@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'flex items-center block w-full ps-3 pe-4 py-2 border-l-4 border-green-400 dark:border-green-600 text-start text-base font-medium text-white dark:text-green-300 bg-green-500 dark:bg-green-900/50 focus:outline-none focus:text-green-800 dark:focus:text-green-200 focus:bg-green-100 dark:focus:bg-green-900 focus:border-green-700 dark:focus:border-green-300 transition duration-150 ease-in-out'
                : 'flex items-center block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 bg-gray-100 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out';
@endphp

<div x-data="{ open: false }">
    <div @click="open = ! open" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $trigger }}
        <div class="ms-1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5" :class="{'block': ! open, 'hidden': open}">
                <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5" :class="{'block': open, 'hidden': ! open}">
                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </div>
    </div>

    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="mt-2"
         style="display: none;"
         @click="open = false">
        <div class="ring-1 ring-black ring-opacity-5">
            {{ $content }}
        </div>
    </div>
</div>
