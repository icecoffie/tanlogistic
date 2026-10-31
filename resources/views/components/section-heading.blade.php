@props(['eyebrow' => null, 'title', 'align' => 'left', 'light' => false])

<div {{ $attributes->class(['max-w-3xl', 'mx-auto text-center' => $align === 'center'])->merge(['data-reveal' => 'up']) }}>
    @if ($eyebrow)
        <p @class(['eyebrow mb-4', 'justify-center' => $align === 'center', '!text-white/70' => $light])>
            <span class="h-px w-6 bg-current"></span>{{ $eyebrow }}
        </p>
    @endif
    <h2 @class(['text-4xl sm:text-5xl lg:text-6xl', 'text-white' => $light, 'text-primary' => ! $light])>{{ $title }}</h2>
</div>
