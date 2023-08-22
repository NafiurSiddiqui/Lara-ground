@props(['active' => false])

@php

    $defaultClasses = "block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white";
    $activeClass = "bg-blue-500 text-white"
 @endphp

<a  {{ $attributes->class([$defaultClasses, $activeClass => $active]) }}>
   {{ $slot }}
</a>
