@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'inline-flex items-center px-2 py-2 border-b-2 border-green-700 dark:border-green-600 text-md font-bold font-medium leading-5 text-green-700 dark:text-green-400 focus:outline-none focus:border-green-700 transition duration-150 ease-in-out'
                : 'inline-flex items-center px-2 py-2 border-b-2 border-transparent text-md font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
