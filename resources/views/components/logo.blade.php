{{--
    Official TAN Logistic logo (public/images/brand).
    variant: light = for light backgrounds (black text), dark = for dark backgrounds (white text).
    Set the height through class, e.g. class="h-10".
--}}
@props(['variant' => 'light'])

@php
    $src = config($variant === 'dark' ? 'content.company.logo_dark' : 'content.company.logo');
    [$width, $height] = @getimagesize(public_path($src)) ?: [726, 348];
@endphp

<img src="{{ asset($src) }}"
     alt="{{ config('content.company.brand') }}"
     width="{{ $width }}" height="{{ $height }}"
     {{ $attributes->merge(['class' => 'h-10 w-auto']) }}>
