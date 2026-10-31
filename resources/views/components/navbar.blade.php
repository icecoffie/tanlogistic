{{-- Sticky navbar: white floating pill, gains a shadow once the page scrolls --}}
@php $ui = config('content.ui'); @endphp

<header x-data="{ scrolled: false, open: false }"
        x-init="scrolled = window.scrollY > 24"
        @scroll.window="scrolled = window.scrollY > 24"
        @keydown.escape.window="open = false"
        class="fixed inset-x-0 top-0 z-50 px-3 pt-3 md:px-4 md:pt-4">
    <nav class="mx-auto flex max-w-7xl items-center justify-between rounded-full bg-white/95 py-2.5 pr-2.5 pl-5 text-dark shadow-sm backdrop-blur-md transition duration-300 md:pl-6"
         :class="(scrolled || open) && 'shadow-lg shadow-primary/10'"
         aria-label="{{ $ui['main_navigation'] }}">
        <a href="{{ route('home') }}" class="transition hover:opacity-80">
            <x-logo class="h-9 w-auto md:h-10" />
        </a>

        <ul class="hidden items-center gap-1 lg:flex">
            @foreach (config('content.nav') as $item)
                @php $active = request()->routeIs($item['route']); @endphp
                <li>
                    <a href="{{ route($item['route']) }}"
                       @class(['relative block rounded-full px-4 py-2 text-sm font-medium transition hover:text-accent', 'text-accent font-semibold' => $active, 'text-dark/70' => ! $active])
                       @if ($active) aria-current="page" @endif>
                        {{ $item['label'] }}
                        @if ($active)<span class="absolute bottom-0.5 left-1/2 h-0.5 w-4 -translate-x-1/2 rounded-full bg-accent"></span>@endif
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="flex items-center gap-2">
            <div class="hidden sm:block"><x-button :href="route('contact')">{{ $ui['contact_cta'] }}</x-button></div>
            <button type="button" class="grid size-11 place-items-center rounded-full bg-soft lg:hidden"
                    @click="open = !open" :aria-expanded="open.toString()" aria-controls="mobile-menu" aria-label="{{ $ui['open_menu'] }}">
                <x-icon name="menu" class="size-5" x-show="!open" />
                <x-icon name="x" class="size-5" x-show="open" x-cloak />
            </button>
        </div>
    </nav>

    {{-- Mobile menu --}}
    <div id="mobile-menu" x-show="open" x-cloak x-transition.opacity.origin.top @click.outside="open = false"
         class="mx-auto mt-2 max-w-7xl rounded-2xl bg-white p-3 shadow-xl shadow-primary/10 lg:hidden">
        <ul>
            @foreach (config('content.nav') as $item)
                <li>
                    <a href="{{ route($item['route']) }}"
                       @class(['flex items-center justify-between rounded-xl px-4 py-3 text-base font-medium transition hover:bg-soft', 'text-accent bg-accent-soft/50' => request()->routeIs($item['route']), 'text-dark' => ! request()->routeIs($item['route'])])>
                        {{ $item['label'] }}
                        <x-icon name="arrow-up-right" class="size-4 opacity-40" />
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="mt-2 sm:hidden"><x-button :href="route('contact')" class="w-full justify-between">{{ $ui['contact_cta'] }}</x-button></div>
    </div>
</header>
