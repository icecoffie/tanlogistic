{{-- Inner page header (About, Services, Clients, Contact) --}}
@props(['eyebrow', 'title', 'subtitle' => null, 'image'])

@push('head')
    <link rel="preload" as="image" href="{{ asset($image) }}" fetchpriority="high">
@endpush

<section class="px-3 pt-3 md:px-4 md:pt-4">
    <div class="relative overflow-hidden rounded-4xl bg-primary">
        <div class="absolute inset-x-0 -top-16 bottom-0" data-parallax="60">
            <img src="{{ asset($image) }}" alt="" class="size-full object-cover" fetchpriority="high" data-zoom-in>
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-primary via-primary/85 to-primary/40"></div>

        <div class="container-site relative pt-40 pb-16 md:pt-48 md:pb-20">
            <nav aria-label="Breadcrumb" data-reveal="fade" class="mb-6 flex items-center gap-2 text-xs font-medium text-white/60">
                <a href="{{ route('home') }}" class="transition hover:text-white">{{ config('content.ui.home_label') }}</a>
                <span>/</span>
                <span class="text-white">{{ $eyebrow }}</span>
            </nav>
            <h1 class="max-w-4xl text-5xl text-white sm:text-6xl lg:text-7xl" data-reveal="up" data-delay="0.1">{{ $title }}</h1>
            @if ($subtitle)
                <p class="mt-6 max-w-xl text-base font-light text-white/80 md:text-lg" data-reveal="up" data-delay="0.25">{{ $subtitle }}</p>
            @endif
        </div>
    </div>
</section>
