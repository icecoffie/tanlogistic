@extends('layouts.app')

@php $section = config('content.clients_section'); @endphp

@section('content')

<x-page-header :eyebrow="$section['eyebrow']" :title="$section['header_title']" :subtitle="$section['header_subtitle']" :image="$section['image']" />

<section class="section">
    <div class="container-site">
        <div class="mb-12 flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
            <x-section-heading :eyebrow="$section['eyebrow']" :title="$section['title']" />
            <p class="max-w-sm text-dark/65" data-reveal="up" data-delay="0.1">{{ $section['description'] }}</p>
        </div>
        @include('partials.clients-grid')
    </div>
</section>

<section class="pb-20 md:pb-28">
    <div class="container-site">
        <div class="rounded-4xl bg-soft p-8 md:p-12" data-reveal="up">
            <div class="mb-10 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <x-section-heading :eyebrow="config('content.ui.certifications_eyebrow')" :title="config('content.ui.certifications_title')" />
                <p class="max-w-sm text-sm text-dark/65">{{ config('content.ui.certifications_text') }}</p>
            </div>
            @include('partials.certifications')
        </div>

        <div class="mt-4 grid grid-cols-2 gap-3 md:gap-4 lg:grid-cols-4" data-stagger>
            @foreach (config('content.stats') as $stat)
                <x-stat-card :value="$stat['value']" :label="$stat['label']" :icon="$stat['icon']" :variant="$loop->index === 1 ? 'accent' : 'soft'" />
            @endforeach
        </div>
    </div>
</section>

@include('partials.cta')

@endsection
