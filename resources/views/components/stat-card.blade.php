{{-- variant: soft (default) | accent (highlight) | glass (di atas background gelap) --}}
@props(['value', 'label', 'icon' => null, 'variant' => 'soft'])

@php $dark = $variant !== 'soft'; @endphp

<div {{ $attributes->class([
    'rounded-2xl p-6 transition duration-300 hover:-translate-y-1',
    'bg-soft' => $variant === 'soft',
    'bg-accent text-white shadow-xl shadow-accent/25' => $variant === 'accent',
    'glass text-white' => $variant === 'glass',
]) }}>
    @if ($icon)
        <span @class(['mb-6 grid size-11 place-items-center rounded-full', 'bg-white text-accent' => ! $dark, 'bg-white/20' => $dark])>
            <x-icon :name="$icon" class="size-5" />
        </span>
    @endif
    <p @class(['font-display text-4xl leading-none sm:text-5xl', 'text-primary' => ! $dark]) data-count>{{ $value }}</p>
    <p @class(['mt-2 text-sm', 'text-dark/60' => ! $dark, 'text-white/80' => $dark])>{{ $label }}</p>
</div>
