@extends('layouts.app', ['seo' => ['title' => config('content.ui.not_found_title').' | TAN Logistic', 'description' => config('content.ui.not_found_text')], 'page' => '404'])

@push('head')
    <meta name="robots" content="noindex">
@endpush

@section('content')
<section class="px-3 pt-3 md:px-4 md:pt-4">
    <div class="relative overflow-hidden rounded-4xl bg-primary">
        <img src="{{ asset('images/port.jpg') }}" alt="" class="absolute inset-0 size-full object-cover opacity-30">
        <div class="container-site relative flex min-h-[70vh] flex-col items-start justify-center pt-32 pb-16 text-white">
            <p class="font-display text-[8rem] leading-none text-white/20 md:text-[12rem]">404</p>
            <h1 class="text-5xl md:text-6xl">{{ config('content.ui.not_found_title') }}</h1>
            <p class="mt-4 max-w-md text-white/80">{{ config('content.ui.not_found_text') }}</p>
            <x-button :href="route('home')" variant="light" class="mt-8">{{ config('content.ui.back_home') }}</x-button>
        </div>
    </div>
</section>
@endsection
