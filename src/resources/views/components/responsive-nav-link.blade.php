@props(['active'])

@php
$classes = 'block w-full  py-2 pl-3 pr-4 text-left text-base font-medium' ;
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
