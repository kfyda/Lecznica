@props(['active'])

@php
    // Klasy bazowe
    $baseClasses = 'block w-full px-4 py-2 text-start text-sm leading-5 transition duration-150 ease-in-out';

    // Klasy dla aktywnego stanu
    $activeClasses = 'text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500';

    // Klasy dla nieaktywnego stanu
    $inactiveClasses = 'text-black dark:text-gray-200 bg-gray-100 dark:bg-gray-700 hover:bg-green-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500';

    // Wybór klas w zależności od stanu aktywności
    $classes = $active ? "{$baseClasses} {$activeClasses}" : "{$baseClasses} {$inactiveClasses}";
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
