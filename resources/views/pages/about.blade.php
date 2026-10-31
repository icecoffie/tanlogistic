@extends('layouts.app')

@php $about = config('content.about'); @endphp

@section('content')

<x-page-header :eyebrow="$about['eyebrow']" :title="$about['header_title']" :subtitle="$about['header_subtitle']" :image="$about['image']" />

{{-- Profile --}}
<section class="section">
    <div class="container-site grid items-center gap-14 lg:grid-cols-2">
        <div>
            <x-section-heading :eyebrow="$about['eyebrow']" :title="$about['title']" />
            @foreach ($about['paragraphs'] as $paragraph)
                <p class="mt-6 leading-relaxed text-dark/70" data-reveal="up" data-delay="{{ 0.1 * $loop->iteration }}">{{ $paragraph }}</p>
            @endforeach

            <div class="mt-10 flex flex-col gap-4 rounded-2xl border border-dark/5 bg-soft p-5 sm:flex-row sm:items-center sm:justify-between" data-reveal="up" data-delay="0.3">
                <div>
                    <p class="text-sm font-semibold text-dark">{{ $about['profile_title'] }}</p>
                    <p class="mt-1 max-w-sm text-xs leading-relaxed text-dark/60">{{ $about['profile_text'] }}</p>
                </div>
                <x-profile-button class="shrink-0 self-start sm:self-auto" />
            </div>
        </div>

        <div class="relative" data-reveal="right">
            <img src="{{ asset($about['image']) }}" alt="{{ $about['image_alt'] }}" loading="lazy" class="aspect-[4/5] w-full rounded-2xl object-cover sm:w-4/5">
            <img src="{{ asset($about['image_secondary']) }}" alt="{{ $about['image_secondary_alt'] }}" loading="lazy"
                 class="absolute right-0 bottom-0 hidden aspect-square w-1/2 rounded-2xl border-8 border-white object-cover shadow-2xl sm:block">
            <div class="glass absolute top-6 left-6 rounded-2xl !bg-primary/80 px-5 py-4 text-white" data-float>
                <p class="font-display text-4xl leading-none" data-count>{{ $about['badge_value'] }}</p>
                <p class="mt-1 text-xs text-white/80">{{ $about['badge_text'] }}</p>
            </div>
        </div>
    </div>

    <div class="container-site mt-20 grid grid-cols-2 gap-3 md:gap-4 lg:grid-cols-4" data-stagger>
        @foreach (config('content.stats') as $stat)
            <x-stat-card :value="$stat['value']" :label="$stat['label']" :icon="$stat['icon']" />
        @endforeach
    </div>
</section>

{{-- Vision & Mission --}}
<section class="pb-20 md:pb-28">
    <div class="container-site grid gap-4 lg:grid-cols-12">
        <div class="relative overflow-hidden rounded-2xl bg-primary p-8 text-white md:p-12 lg:col-span-5" data-reveal="left">
            <x-icon name="eye" class="absolute -right-8 -bottom-8 size-48 text-white/5" stroke="1" />
            <p class="eyebrow !text-white/60"><span class="h-px w-6 bg-current"></span>{{ $about['vision_eyebrow'] }}</p>
            <h2 class="mt-4 text-5xl md:text-6xl">{{ $about['vision_title'] }}</h2>
            <p class="relative mt-8 text-lg leading-relaxed font-light text-white/90 md:text-xl">“{{ $about['vision'] }}”</p>
        </div>

        <div class="rounded-2xl bg-soft p-8 md:p-12 lg:col-span-7" data-reveal="right" data-delay="0.1">
            <p class="eyebrow"><span class="h-px w-6 bg-current"></span>{{ $about['mission_eyebrow'] }}</p>
            <h2 class="mt-4 text-5xl text-primary md:text-6xl">{{ $about['mission_title'] }}</h2>
            <p class="mt-4 text-dark/65">{{ $about['mission_intro'] }}</p>
            <ul class="mt-8 grid gap-6 sm:grid-cols-2">
                @foreach ($about['mission'] as $i => $mission)
                    <li @class(['flex gap-4', 'sm:col-span-2' => $loop->last])>
                        <span class="grid size-12 shrink-0 place-items-center rounded-full bg-white text-accent">
                            <x-icon :name="$mission['icon']" class="size-5" />
                        </span>
                        <div>
                            <h3 class="font-sans text-base font-semibold tracking-normal normal-case">{{ $mission['title'] }}</h3>
                            <p class="mt-1 text-sm text-dark/60">{{ $mission['text'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

@include('partials.advantages')

<section class="section">
    <div class="container-site">
        <x-section-heading :eyebrow="config('content.ui.certifications_eyebrow')" :title="config('content.ui.certifications_title')" class="mb-12" />
        @include('partials.certifications')
    </div>
</section>

@include('partials.cta')

@endsection
