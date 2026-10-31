{{--
    Opens the Company Profile PDF in a new tab (viewed in the browser, not downloaded).
    variant: accent (on dark/photo backgrounds) | light (on red backgrounds) | outline (on white)
--}}
@props(['variant' => 'accent'])

@php
    $profile = config('content.company_profile');
    $styles = [
        'accent' => ['wrap' => 'bg-accent text-white shadow-lg shadow-accent/30 hover:bg-white hover:text-primary', 'icon' => 'bg-white text-accent group-hover:bg-accent group-hover:text-white', 'meta' => 'text-white/70 group-hover:text-primary/60'],
        'light' => ['wrap' => 'bg-white text-primary hover:bg-accent-soft', 'icon' => 'bg-accent text-white', 'meta' => 'text-primary/60'],
        'outline' => ['wrap' => 'border border-dark/15 bg-white text-dark hover:border-accent', 'icon' => 'bg-accent-soft text-accent group-hover:bg-accent group-hover:text-white', 'meta' => 'text-dark/50'],
    ][$variant];
@endphp

<a href="{{ route('company-profile') }}" target="_blank" rel="noopener"
   {{ $attributes->merge(['class' => 'group inline-flex items-center gap-3 rounded-full py-2 pr-5 pl-2 transition duration-300 '.$styles['wrap']]) }}>
    <span class="grid size-10 shrink-0 place-items-center rounded-full transition duration-300 {{ $styles['icon'] }}">
        <x-icon name="file-text" class="size-[1.15rem]" />
    </span>
    <span class="flex flex-col text-left leading-tight">
        <span class="text-sm font-semibold">{{ $profile['label'] }}</span>
        <span class="text-[0.7rem] font-medium transition {{ $styles['meta'] }}">{{ $profile['meta'] }}</span>
    </span>
    <x-icon name="external" class="ml-1 size-4 opacity-70 transition duration-300 group-hover:translate-x-0.5 group-hover:-translate-y-0.5" />
    <span class="sr-only">(opens in a new tab)</span>
</a>
