@php
    $company = config('content.company');
    $seo = $seo ?? config('content.seo.home');
    $ogImage = asset($seo['image'] ?? config('content.seo.default_image'));
    $canonical = url()->current();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- SEO --}}
    <title>{{ $seo['title'] }}</title>
    <meta name="description" content="{{ $seo['description'] }}">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1">
    <link rel="canonical" href="{{ $canonical }}">
    <meta name="author" content="{{ $company['name'] }}">
    <meta name="theme-color" content="#8B1212">
    <meta name="format-detection" content="telephone=no">
    @if (filled(config('services.google.site_verification')))
        <meta name="google-site-verification" content="{{ config('services.google.site_verification') }}">
    @endif
    @if (filled(config('services.bing.site_verification')))
        <meta name="msvalidate.01" content="{{ config('services.bing.site_verification') }}">
    @endif

    {{-- Open Graph / Social --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ config('content.seo.site_name') }}">
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="{{ $seo['title'] }}">
    <meta property="og:description" content="{{ $seo['description'] }}">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:image:alt" content="{{ $company['brand'] }}, {{ $company['name'] }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seo['title'] }}">
    <meta name="twitter:description" content="{{ $seo['description'] }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="32x32">
    <link rel="icon" href="{{ asset('favicon-192.png') }}" type="image/png" sizes="192x192">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="sitemap" type="application/xml" href="{{ route('sitemap') }}">

    {{-- Fonts: Anton (heading) + Inter (body) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    {{-- Hide animated elements until Motion is ready; show everything if JS fails to load --}}
    <script>
        document.documentElement.classList.add('js-motion');
        setTimeout(function () { if (!window.__motionReady) document.documentElement.classList.remove('js-motion'); }, 2500);
    </script>

    @stack('head')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @include('partials.seo-schema')
</head>
<body>
    <a href="#main" class="sr-only z-[60] rounded-full bg-accent px-4 py-2 text-white focus:not-sr-only focus:fixed focus:top-4 focus:left-4">{{ config('content.ui.skip_to_content') }}</a>

    <x-navbar />

    <main id="main">
        @yield('content')
    </main>

    <x-footer />
</body>
</html>
