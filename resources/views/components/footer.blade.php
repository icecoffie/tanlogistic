@php
    $company = config('content.company');
    $cta = config('content.cta');
    $ui = config('content.ui');
    $socials = array_filter($company['social'], fn ($s) => filled($s['url']));
@endphp

<footer class="px-3 pb-3 md:px-4 md:pb-4">
    {{-- Deep primary background keeps the red logo emblem readable --}}
    <div class="relative overflow-hidden rounded-4xl bg-gradient-to-br from-primary-deep via-primary-deep to-primary-dark text-white">
        {{-- Watermark --}}
        <p aria-hidden="true" class="pointer-events-none absolute -top-6 left-1/2 -translate-x-1/2 font-display text-[22vw] leading-none whitespace-nowrap text-white/[0.03] select-none lg:text-[16rem]">TAN LOGISTIC</p>

        <div class="container-site relative pt-20 pb-10">
            <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-12">
                <div class="lg:col-span-3">
                    <h2 class="font-sans text-xs font-semibold tracking-[0.2em] text-white/50 uppercase">{{ $ui['footer_company'] }}</h2>
                    <ul class="mt-5 space-y-3 text-sm">
                        @foreach (config('content.nav') as $item)
                            @continue($item['route'] === 'home')
                            <li><a href="{{ route($item['route']) }}" class="text-white/80 transition hover:text-white">{{ $item['label'] }}</a></li>
                        @endforeach
                        <li>
                            <a href="{{ route('company-profile') }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-white/80 transition hover:text-white">
                                {{ config('content.company_profile.short_label') }} <span class="rounded bg-white/10 px-1.5 py-0.5 text-[0.6rem] font-semibold tracking-wide">PDF</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="lg:col-span-3">
                    <h2 class="font-sans text-xs font-semibold tracking-[0.2em] text-white/50 uppercase">{{ $ui['footer_services'] }}</h2>
                    <ul class="mt-5 space-y-3 text-sm">
                        @foreach (config('content.services') as $service)
                            <li><a href="{{ route('services') }}#{{ $service['id'] }}" class="text-white/80 transition hover:text-white">{{ $service['title'] }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="lg:col-span-4">
                    <h2 class="font-sans text-xs font-semibold tracking-[0.2em] text-white/50 uppercase">{{ $ui['footer_contact'] }}</h2>
                    <ul class="mt-5 space-y-4 text-sm text-white/80">
                        <li class="flex gap-3"><x-icon name="map-pin" class="mt-0.5 size-4 text-white/50" />{{ $company['address'] }}</li>
                        <li><a href="tel:{{ preg_replace('/[^0-9+]/', '', $company['phone']) }}" class="flex gap-3 transition hover:text-white"><x-icon name="phone" class="mt-0.5 size-4 text-white/50" />{{ $company['phone'] }}</a></li>
                        <li><a href="mailto:{{ $company['email'] }}" class="flex gap-3 transition hover:text-white"><x-icon name="mail" class="mt-0.5 size-4 text-white/50" />{{ $company['email'] }}</a></li>
                        @if (filled($company['whatsapp']['number'] ?? null))
                            <li>
                                <a href="https://wa.me/{{ $company['whatsapp']['number'] }}?text={{ rawurlencode($company['whatsapp']['message']) }}" target="_blank" rel="noopener" class="flex gap-3 transition hover:text-white">
                                    <x-icon name="whatsapp" class="mt-0.5 size-4 text-white/50" />
                                    <span>{{ $company['whatsapp']['display'] }} <span class="text-white/50">({{ $company['whatsapp']['name'] }})</span></span>
                                </a>
                            </li>
                        @endif
                        @if (filled($company['wechat'] ?? null))
                            <li x-data="{ copied: false }">
                                <button type="button" class="flex gap-3 text-left transition hover:text-white" title="{{ config('content.contact.copy') }}"
                                        @click="navigator.clipboard?.writeText(@js($company['wechat'])); copied = true; setTimeout(() => copied = false, 2000)">
                                    <x-icon name="wechat" class="mt-0.5 size-4 text-white/50" />
                                    <span>WeChat: {{ $company['wechat'] }} <span class="text-white/50" x-show="copied" x-cloak>({{ config('content.contact.copied') }})</span></span>
                                </button>
                            </li>
                        @endif
                    </ul>
                </div>

                <div class="lg:col-span-2">
                    <h2 class="font-sans text-xs font-semibold tracking-[0.2em] text-white/50 uppercase">{{ $ui['footer_social'] }}</h2>
                    <ul class="mt-5 space-y-3 text-sm">
                        @foreach ($socials as $social)
                            <li><a href="{{ $social['url'] }}" target="_blank" rel="noopener" class="text-white/80 transition hover:text-white">{{ $social['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="mt-16 flex flex-col gap-8 border-t border-white/10 py-10 md:flex-row md:items-center md:justify-between">
                <div>
                    <x-logo variant="dark" class="h-16 w-auto md:h-20" />
                    <p class="mt-4 text-sm text-white/60">{{ $company['name'] }}</p>
                </div>
                <div class="flex flex-col gap-5 sm:flex-row sm:items-center">
                    <p class="font-display text-2xl uppercase md:text-3xl">{{ $cta['title'] }}</p>
                    <x-button :href="route('contact')" class="self-start sm:self-auto">{{ $cta['button'] }}</x-button>
                </div>
            </div>

            {{-- Certifications and memberships --}}
            <div class="flex flex-col gap-4 border-b border-white/10 py-8 lg:flex-row lg:items-center lg:justify-between">
                <p class="font-sans text-xs font-semibold tracking-[0.2em] text-white/50 uppercase">{{ $ui['badges_title'] }}</p>
                @include('partials.badges')
            </div>

            <div class="flex flex-col-reverse gap-5 pt-8 text-xs text-white/50 sm:flex-row sm:items-center sm:justify-between">
                <p>&copy; {{ date('Y') }} {{ $company['name'] }}. {{ $ui['rights'] }}</p>
                <div class="flex flex-wrap items-center gap-4">
                    <span class="flex gap-2">
                        @if (filled($company['whatsapp']['number'] ?? null))
                            <a href="https://wa.me/{{ $company['whatsapp']['number'] }}?text={{ rawurlencode($company['whatsapp']['message']) }}" target="_blank" rel="noopener" aria-label="WhatsApp"
                               class="grid size-9 place-items-center rounded-full bg-white/10 text-white transition hover:scale-110 hover:bg-accent">
                                <x-icon name="whatsapp" class="size-4" />
                            </a>
                        @endif
                        @foreach ($socials as $social)
                            <a href="{{ $social['url'] }}" target="_blank" rel="noopener" aria-label="{{ $social['name'] }}"
                               class="grid size-9 place-items-center rounded-full bg-white/10 text-white transition hover:scale-110 hover:bg-accent">
                                <x-icon :name="$social['icon']" class="size-4" />
                            </a>
                        @endforeach
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>
