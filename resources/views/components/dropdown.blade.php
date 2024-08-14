@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white dark:bg-gray-700', 'active'])

@php
$alignmentClasses = match ($align) {
    'left' => 'ltr:origin-top-left rtl:origin-top-right start-0',
    'top' => 'origin-top',
    default => 'ltr:origin-top-right rtl:origin-top-left end-0',
};

$classes = ($active ?? false)
            ? 'inline-flex items-center px-2 py-2 border-b-2 cursor-pointer border-green-500 dark:border-green-600 text-md font-medium leading-5 text-green-500 dark:text-green-400 focus:outline-none focus:border-green-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-2 py-2 border-b-2 cursor-pointer border-transparent text-md font-medium leading-5 text-white dark:text-gray-400 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out';

$width = match ($width) {
    '48' => 'w-48',
    default => $width,
};
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false" @mouseleave="open = false">
    <!-- Zmieniamy @click na @mouseover, aby menu się rozwijało po najechaniu myszką -->
    <div @mouseover="open = true" :class="{'': open, '': ! open}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $trigger }}
    </div>

    <div x-show="open" x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="absolute z-50 {{ $width }} rounded-md shadow-lg h-[60vh] overflow-auto {{ $alignmentClasses }}"
         @click="open = false">
        <div class="rounded-md rounded-r-[0px] ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>
