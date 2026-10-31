@extends('layouts.app')

@php $page = config('content.services_page'); @endphp

@section('content')

<x-page-header :eyebrow="$page['eyebrow']" :title="$page['title']" :subtitle="$page['header_subtitle']" :image="$page['image']" />

{{-- Quick navigation --}}
<section class="pt-16">
    <div class="container-site grid grid-cols-2 gap-3 lg:grid-cols-4" data-stagger>
        @foreach (config('content.services') as $i => $service)
            <a href="#{{ $service['id'] }}" class="group flex items-center gap-3 rounded-2xl bg-soft p-4 transition hover:bg-accent hover:text-white">
                <span class="grid size-11 shrink-0 place-items-center rounded-full bg-white text-accent transition group-hover:bg-white/20 group-hover:text-white">
                    <x-icon :name="$service['icon']" class="size-5" />
                </span>
                <span class="text-sm leading-snug font-semibold">{{ $service['title'] }}</span>
            </a>
        @endforeach
    </div>
</section>

{{-- Service details --}}
<div class="section space-y-24 md:space-y-32">
    @foreach (config('content.services') as $i => $service)
        <section id="{{ $service['id'] }}" class="container-site scroll-mt-28 grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
            <div @class(['relative', 'lg:order-2' => $i % 2 === 1]) data-reveal="{{ $i % 2 === 1 ? 'right' : 'left' }}">
                <img src="{{ asset($service['image']) }}" alt="{{ $service['title'] }}" loading="lazy" class="aspect-[4/3] w-full rounded-2xl object-cover">
                <span class="absolute top-5 left-5 font-display text-7xl leading-none text-white/90 drop-shadow-lg">0{{ $i + 1 }}</span>
                <span class="glass absolute bottom-5 left-5 flex items-center gap-2 rounded-full !bg-primary/70 px-4 py-2 text-xs font-semibold text-white">
                    <x-icon :name="$service['icon']" class="size-4" />{{ $service['subtitle'] }}
                </span>
            </div>

            <div>
                <p class="eyebrow"><span class="h-px w-6 bg-current"></span>{{ $service['subtitle'] }}</p>
                <h2 class="mt-4 text-4xl text-primary sm:text-5xl">{{ $service['title'] }}</h2>
                <p class="mt-5 leading-relaxed text-dark/70">{{ $service['description'] }}</p>

                <ul class="mt-8 grid gap-3 sm:grid-cols-2" data-stagger>
                    @foreach ($service['features'] as $feature)
                        <li @class([
                            'rounded-2xl border border-dark/5 bg-soft p-5 transition duration-300 hover:-translate-y-0.5 hover:border-accent/20 hover:bg-white hover:shadow-lg hover:shadow-primary/5',
                            'sm:col-span-2' => $loop->last && $loop->count % 2 === 1,
                        ])>
                            <span class="grid size-10 place-items-center rounded-full bg-white text-accent"><x-icon :name="$feature['icon']" class="size-5" /></span>
                            <h3 class="mt-4 font-sans text-sm font-semibold tracking-normal normal-case">{{ $feature['title'] }}</h3>
                            <p class="mt-1 text-sm leading-relaxed text-dark/60">{{ $feature['text'] }}</p>
                        </li>
                    @endforeach
                </ul>

                <x-button :href="route('contact')" class="mt-8">{{ config('content.ui.request_quote') }}</x-button>
            </div>
        </section>
    @endforeach
</div>

{{-- Process --}}
<section class="px-3 md:px-4">
    <div class="rounded-4xl bg-primary py-20 text-white md:py-24">
        <div class="container-site">
            <x-section-heading :eyebrow="$page['process_eyebrow']" :title="$page['process_title']" align="center" light />
            <ol class="mt-14 grid gap-4 sm:grid-cols-2 lg:grid-cols-4" data-stagger="0.12">
                @foreach ($page['process'] as $i => $step)
                    <li @class(['relative rounded-2xl p-7', 'bg-accent shadow-xl shadow-black/20' => $i === 1, 'glass' => $i !== 1])>
                        <span class="font-display text-5xl leading-none text-white/30">0{{ $i + 1 }}</span>
                        <span class="mt-8 grid size-12 place-items-center rounded-full border border-white/30"><x-icon :name="$step['icon']" class="size-5" /></span>
                        <h3 class="mt-5 text-2xl">{{ $step['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-white/75">{{ $step['text'] }}</p>
                        @unless ($loop->last)
                            <x-icon name="arrow-right" class="absolute top-8 right-7 hidden size-5 text-white/40 lg:block" />
                        @endunless
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
</section>

<div class="pt-20 md:pt-28">
    @include('partials.cta')
</div>

@endsection
