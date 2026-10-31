{{-- Tombol pill. variant: accent | light | ghost | outline --}}
@props(['href' => '#', 'variant' => 'accent', 'icon' => 'arrow-right'])

@php
    $variants = [
        'accent' => 'bg-accent text-white hover:bg-primary shadow-lg shadow-accent/25',
        'light' => 'bg-white text-primary hover:bg-accent-soft',
        'ghost' => 'border border-white/40 text-white hover:bg-white/10',
        'outline' => 'border border-dark/15 text-dark hover:border-accent hover:text-accent',
    ];
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'group inline-flex items-center gap-2 rounded-full py-2 pr-2 pl-5 text-sm font-semibold transition duration-300 '.$variants[$variant]]) }}>
    <span>{{ $slot }}</span>
    @if ($icon)
        <span @class([
            'grid size-8 place-items-center rounded-full transition-transform duration-300 group-hover:translate-x-0.5',
            'bg-white/20' => in_array($variant, ['accent', 'ghost']),
            'bg-accent text-white' => in_array($variant, ['light', 'outline']),
        ])>
            <x-icon :name="$icon" class="size-4" />
        </span>
    @endif
</a>
