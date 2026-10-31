@extends('layouts.app')

@php
    $hero = config('content.hero');
    $services = config('content.home_services');
    $e2e = config('content.end_to_end');
    $transport = config('content.transport');
    $global = config('content.global');
    $clients = config('content.clients_section');

    // Network node positions (percent) around the central hub
    $nodePositions = [[50, 13], [79, 24], [89, 50], [79, 76], [50, 87], [21, 76], [11, 50], [21, 24]];
@endphp

@push('head')
    <link rel="preload" as="image" href="{{ asset($hero['image']) }}" fetchpriority="high">
@endpush

@section('content')

{{-- ============ 2. HERO ============ --}}
<section class="px-3 pt-3 md:px-4 md:pt-4">
    <div class="relative overflow-hidden rounded-4xl bg-primary">
        <div class="absolute inset-x-0 -top-20 bottom-0" data-parallax="80">
            <img src="{{ asset($hero['image']) }}" alt="{{ $hero['image_alt'] }}" class="size-full object-cover" fetchpriority="high" data-zoom-in>
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-primary via-primary/80 to-primary/10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-primary-deep/70 via-transparent to-primary-deep/30"></div>

        <div class="container-site relative flex min-h-[680px] flex-col justify-end pt-36 pb-10 md:min-h-[760px] md:pb-14">
            <p class="eyebrow mb-6 !text-white/75" data-reveal="up"><span class="h-px w-6 bg-current"></span>{{ $hero['eyebrow'] }}</p>
            <h1 class="max-w-4xl text-[2.9rem] text-white sm:text-7xl lg:text-[6.5rem]" data-reveal="up" data-delay="0.1">{{ $hero['title'] }}</h1>
            <p class="mt-6 max-w-xl text-base leading-relaxed font-light text-white/80 md:text-lg" data-reveal="up" data-delay="0.25">{{ $hero['subtitle'] }}</p>

            <div class="mt-8 flex flex-wrap items-center gap-3" data-reveal="up" data-delay="0.4">
                <x-profile-button />
                <x-button :href="route($hero['cta_secondary']['route'])" variant="ghost">{{ $hero['cta_secondary']['label'] }}</x-button>
            </div>

            {{-- Floating card, left --}}
            <div class="glass mt-10 hidden w-fit items-center gap-4 rounded-2xl p-2.5 pr-6 text-white sm:flex" data-reveal="up" data-delay="0.55" data-float>
                <img src="{{ asset($hero['card_left']['image']) }}" alt="" class="h-16 w-24 rounded-xl object-cover">
                <div>
                    <p class="text-sm font-semibold">{{ $hero['card_left']['label'] }}</p>
                    <p class="mt-0.5 text-xs text-white/70">{{ $hero['card_left']['text'] }}</p>
                </div>
                <span class="ml-2 grid size-9 place-items-center rounded-full bg-white/15"><x-icon name="ship" class="size-4" /></span>
            </div>

            {{-- Floating card, right --}}
            <div class="glass absolute right-8 bottom-14 hidden w-72 rounded-2xl p-5 text-white lg:block" data-reveal="right" data-delay="0.7" data-float>
                <div class="flex items-center justify-between">
                    <p class="text-xs font-medium tracking-wider text-white/70 uppercase">{{ $hero['card_right']['label'] }}</p>
                    <span class="grid size-8 place-items-center rounded-full bg-accent"><x-icon name="globe" class="size-4" /></span>
                </div>
                <p class="mt-4 font-display text-5xl leading-none" data-count>{{ $hero['card_right']['value'] }}</p>
                <p class="mt-1 text-sm text-white/75">{{ $hero['card_right']['text'] }}</p>
                <div class="mt-5 flex items-center gap-3 text-xs font-medium">
                    <span>{{ $hero['card_right']['from'] }}</span>
                    <span class="relative h-px flex-1 border-t border-dashed border-white/40">
                        <x-icon name="plane" class="absolute -top-2 left-1/2 size-4 -translate-x-1/2 rotate-45" />
                    </span>
                    <span>{{ $hero['card_right']['to'] }}</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============ 3. OUR SERVICES ============ --}}
<section class="section">
    <div class="container-site">
        <x-section-heading :eyebrow="$services['eyebrow']" :title="$services['title']" align="center" />

        <div class="mt-14 grid gap-10 sm:grid-cols-2 md:gap-6 lg:grid-cols-3" data-stagger="0.12">
            @foreach ($services['items'] as $i => $item)
                <x-service-card
                    :title="$item['title']" :image="$item['image']" :tag="$item['tag']" :description="$item['description']"
                    :href="route('services').'#'.$item['anchor']"
                    @class(['lg:mt-16' => $i === 1]) />
            @endforeach
        </div>

        <p class="mx-auto mt-20 max-w-2xl text-center text-lg leading-relaxed text-dark/70 md:text-xl" data-reveal="up">{{ $services['summary'] }}</p>

        <div class="mt-12 grid grid-cols-2 gap-3 md:gap-4 lg:grid-cols-4" data-stagger>
            @foreach (config('content.stats') as $stat)
                <x-stat-card :value="$stat['value']" :label="$stat['label']" :icon="$stat['icon']" />
            @endforeach
        </div>
    </div>
</section>

{{-- ============ 4. END-TO-END ============ --}}
<section class="pb-20 md:pb-28">
    <div class="container-site grid items-stretch gap-10 lg:grid-cols-12 lg:gap-12">
        <div class="flex flex-col lg:col-span-7">
            <x-section-heading :eyebrow="$e2e['eyebrow']" :title="$e2e['title']" />
            <p class="mt-6 max-w-lg text-dark/65" data-reveal="up" data-delay="0.1">{{ $e2e['description'] }}</p>

            <div class="mt-10 grid flex-1 gap-4 sm:grid-cols-2" data-stagger="0.15">
                @foreach ($e2e['cards'] as $card)
                    <div @class([
                        'flex flex-col rounded-2xl p-7 transition duration-300 hover:-translate-y-1',
                        'bg-accent text-white shadow-xl shadow-accent/25' => $card['highlight'],
                        'bg-soft text-dark' => ! $card['highlight'],
                    ])>
                        <span @class(['grid size-14 place-items-center rounded-full border', 'border-white/30' => $card['highlight'], 'border-dark/15 text-accent' => ! $card['highlight']])>
                            <x-icon :name="$card['icon']" class="size-6" />
                        </span>
                        <p @class(['mt-10 flex-1 text-sm leading-relaxed', 'text-white/85' => $card['highlight'], 'text-dark/70' => ! $card['highlight']])>{{ $card['text'] }}</p>
                        <div class="mt-6 flex flex-wrap gap-2">
                            @foreach ($card['tags'] as $tag)
                                <span @class(['rounded-full border px-3 py-1 text-xs font-medium', 'border-white/40' => $card['highlight'], 'border-dark/20' => ! $card['highlight']])>{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Photo with route mockup --}}
        <div class="relative min-h-[460px] rounded-2xl lg:col-span-5" data-reveal="fade">
            <div class="absolute inset-0 overflow-hidden rounded-2xl">
                <img src="{{ asset($e2e['image']) }}" alt="{{ $e2e['image_alt'] }}" loading="lazy" class="size-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-b from-primary-deep/40 to-transparent"></div>
            </div>

            @include('partials.route-planner')
        </div>
    </div>
</section>

{{-- ============ 5. GLOBAL NETWORK ============ --}}
<section class="pb-20 md:pb-28">
    <div class="container-site">
        <div class="mx-auto mb-12 max-w-2xl text-center" data-reveal="up">
            <h2 class="text-4xl text-primary sm:text-5xl">{{ $transport['title'] }}</h2>
            <p class="mt-4 text-dark/65">{{ $transport['description'] }}</p>
            <x-button :href="route($transport['cta']['route'])" variant="outline" class="mt-6">{{ $transport['cta']['label'] }}</x-button>
        </div>

        <div class="grid overflow-hidden rounded-4xl bg-soft lg:grid-cols-12" data-reveal="scale">
            {{-- Map illustration with network --}}
            <div class="relative aspect-square overflow-hidden bg-primary-deep sm:aspect-[4/3] lg:col-span-7 lg:aspect-auto lg:min-h-[480px]">
                <img src="{{ asset($global['image']) }}" alt="{{ $global['image_alt'] }}" loading="lazy" class="absolute inset-0 size-full object-cover opacity-70">
                <div class="absolute inset-0 bg-gradient-to-br from-primary/80 via-primary-deep/50 to-primary/70"></div>

                <svg class="absolute inset-0 size-full" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                    @foreach ($nodePositions as [$x, $y])
                        <line x1="50" y1="50" x2="{{ $x }}" y2="{{ $y }}" stroke="white" stroke-opacity=".55" stroke-width="1.25" vector-effect="non-scaling-stroke" class="network-line" />
                    @endforeach
                    <circle cx="50" cy="50" r="28" fill="none" stroke="white" stroke-opacity=".12" vector-effect="non-scaling-stroke" />
                </svg>

                {{-- Hub --}}
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" data-reveal="scale" data-delay="0.3">
                    <span class="absolute inset-0 animate-ping rounded-3xl bg-accent/40 motion-reduce:hidden"></span>
                    <span class="relative grid size-20 place-items-center rounded-3xl bg-white p-3 shadow-2xl shadow-black/30 md:size-28 md:p-4">
                        <img src="{{ asset(config('content.company.emblem')) }}" alt="{{ config('content.company.brand') }}" class="w-full">
                    </span>
                </div>

                {{-- Nodes --}}
                @foreach ($global['nodes'] as $i => $icon)
                    <span class="glass absolute grid size-11 -translate-x-1/2 -translate-y-1/2 place-items-center rounded-full text-white transition hover:scale-110 hover:bg-white/25 md:size-14"
                          style="left: {{ $nodePositions[$i][0] }}%; top: {{ $nodePositions[$i][1] }}%"
                          data-reveal="scale" data-delay="{{ 0.45 + $i * 0.07 }}">
                        <x-icon :name="$icon" class="size-5 md:size-6" />
                    </span>
                @endforeach
            </div>

            {{-- Text --}}
            <div class="flex flex-col justify-center p-8 md:p-12 lg:col-span-5" data-reveal="right" data-delay="0.2">
                <p class="eyebrow"><span class="h-px w-6 bg-current"></span>{{ $global['eyebrow'] }}</p>
                <h3 class="mt-4 text-4xl text-primary md:text-5xl">{{ $global['title'] }}</h3>
                <p class="mt-5 text-dark/65">{{ $global['description'] }}</p>
                <ul class="mt-8 grid gap-3 sm:grid-cols-2 lg:grid-cols-1">
                    @foreach ($global['points'] as $point)
                        <li class="flex items-center gap-3 text-sm font-medium">
                            <span class="grid size-6 place-items-center rounded-full bg-accent text-white"><x-icon name="check" class="size-3.5" stroke="2.5" /></span>
                            {{ $point }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- ============ 6. CLIENTS ============ --}}
<section class="pb-20 md:pb-28">
    <div class="container-site">
        <div class="mb-12 flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
            <x-section-heading :eyebrow="$clients['eyebrow']" :title="$clients['title']" />
            <x-button :href="route('clients')" variant="outline" class="self-start md:self-auto">{{ config('content.ui.all_clients') }}</x-button>
        </div>
        @include('partials.clients-grid', ['limit' => $clients['home_limit']])
    </div>
</section>

{{-- ============ 7. STRATEGIC ADVANTAGES ============ --}}
@include('partials.advantages')

{{-- ============ 8. FAQ ============ --}}
@include('partials.faq')

@endsection
