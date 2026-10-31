{{--
    Client logo: grayscale on desktop until hover, full colour on touch screens.
    Falls back to the client name as text when the logo file is missing.
--}}
@props(['name', 'logo' => null])

<div {{ $attributes->merge(['class' => 'group grid h-24 place-items-center rounded-2xl border border-dark/5 bg-white px-5 transition duration-300 hover:-translate-y-0.5 hover:border-accent/20 hover:shadow-lg hover:shadow-primary/5']) }}
     title="{{ $name }}">
    @if ($logo && file_exists(public_path($logo)))
        <img src="{{ asset($logo) }}" alt="{{ $name }} logo" loading="lazy" decoding="async"
             class="max-h-12 max-w-[85%] object-contain transition md:opacity-60 md:grayscale duration-300 group-hover:opacity-100 group-hover:grayscale-0">
    @else
        <span class="text-center font-display text-lg leading-tight tracking-wide text-dark uppercase opacity-35 transition duration-300 group-hover:text-accent group-hover:opacity-100">{{ $name }}</span>
    @endif
</div>
