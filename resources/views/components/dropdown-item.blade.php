
@php
    $classes = 'block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white';
@endphp

<a
    {{ $attributes(['class' => $classes]) }}
>{{ $slot }}</a>
