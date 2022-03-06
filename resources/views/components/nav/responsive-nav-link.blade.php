@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-gray-700 text-base font-medium text-gray-700 bg-transparent transition duration-150 ease-in-out'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-700 bg-transparent hover:text-gray-500 hover:border-gray-600 focus:text-gray-500 focus:border-gray-600 transition duration-150 ease-in-out'
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
