{{-- Kartu layanan: thumbnail foto + tag kecil + ikon panah pojok --}}
@props(['title', 'image', 'tag' => null, 'description' => null, 'href' => '#'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'group block']) }}>
    <div class="relative aspect-[4/3] overflow-hidden rounded-2xl bg-soft">
        <img src="{{ asset($image) }}" alt="{{ $title }}" loading="lazy"
             class="size-full object-cover transition duration-700 group-hover:scale-105">
        <div class="absolute inset-0 bg-gradient-to-t from-primary-deep/50 via-transparent to-transparent"></div>

        <span class="absolute top-4 right-4 grid size-10 place-items-center rounded-full bg-white/90 text-primary backdrop-blur transition duration-300 group-hover:rotate-45 group-hover:bg-accent group-hover:text-white">
            <x-icon name="arrow-up-right" class="size-4" />
        </span>

        @if ($tag)
            <span class="glass absolute bottom-4 left-4 rounded-full px-3 py-1 text-xs font-semibold text-white">{{ $tag }}</span>
        @endif
    </div>

    <h3 class="mt-5 text-2xl text-primary transition group-hover:text-accent">{{ $title }}</h3>
    @if ($description)
        <p class="mt-2 text-sm leading-relaxed text-dark/60">{{ $description }}</p>
    @endif
</a>
