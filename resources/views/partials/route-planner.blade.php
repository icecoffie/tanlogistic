{{-- Interactive route card (home, End to End section). Options live in content.end_to_end.mockup --}}
@php
    $m = config('content.end_to_end.mockup');
    $serviceTitles = collect(config('content.services'))->pluck('title', 'id');
    $planner = [
        'origins' => $m['origins'],
        'destinations' => $m['destinations'],
        'modes' => $m['modes'],
        'contactUrl' => route('contact'),
        'services' => ['international' => $serviceTitles['export-import'], 'domestic' => $serviceTitles['domestic']],
    ];
    $trigger = 'mt-1.5 flex w-full items-center gap-3 rounded-xl border border-dark/10 bg-white px-3.5 py-3 text-left transition hover:border-accent/40 focus-visible:border-accent focus-visible:ring-4 focus-visible:ring-accent/10 focus-visible:outline-none';
    $list = 'absolute inset-x-0 top-full z-30 mt-1.5 max-h-56 overflow-auto rounded-xl border border-dark/5 bg-white p-1.5 shadow-2xl shadow-primary/15';
    $option = 'flex w-full items-center justify-between gap-3 rounded-lg px-3 py-2.5 text-left text-sm transition hover:bg-soft';
@endphp

<div x-data="routePlanner(@js($planner))" @keydown.escape="openList = null" @click.outside="openList = null"
     class="relative m-5 rounded-2xl bg-white/95 p-5 shadow-2xl backdrop-blur md:m-7"
     data-reveal="up" data-delay="0.2">
    <p class="mb-4 flex items-center gap-2 text-sm font-semibold text-dark">
        <span class="size-2 rounded-full bg-accent"></span>{{ $m['title'] }}
    </p>

    {{-- Origin --}}
    <p class="text-[0.65rem] font-semibold tracking-wider text-dark/45 uppercase" id="origin-label">{{ $m['from_label'] }}</p>
    <div class="relative" :class="openList === 'origin' && 'z-40'">
        <button type="button" class="{{ $trigger }}" @click="toggle('origin')"
                :aria-expanded="(openList === 'origin').toString()" aria-haspopup="listbox" aria-labelledby="origin-label">
            <x-icon name="map-pin" class="size-4 text-accent" />
            <span class="flex-1 text-sm font-medium" x-text="origin">{{ $m['origins'][0] }}</span>
            <x-icon name="chevron-down" class="size-4 text-dark/40 transition duration-300" ::class="openList === 'origin' && 'rotate-180'" />
        </button>
        <ul x-show="openList === 'origin'" x-cloak x-transition.origin.top class="{{ $list }}" role="listbox" aria-labelledby="origin-label">
            <template x-for="item in origins" :key="item">
                <li>
                    <button type="button" role="option" :aria-selected="(item === origin).toString()" @click="choose('origin', item)"
                            class="{{ $option }}" :class="item === origin && 'bg-accent-soft/60 font-semibold text-accent'">
                        <span x-text="item"></span>
                        <x-icon name="check" class="size-4" x-show="item === origin" />
                    </button>
                </li>
            </template>
        </ul>
    </div>

    {{-- Destination --}}
    <p class="mt-4 text-[0.65rem] font-semibold tracking-wider text-dark/45 uppercase" id="destination-label">{{ $m['to_label'] }}</p>
    <div class="relative" :class="openList === 'destination' && 'z-40'">
        <button type="button" class="{{ $trigger }}" @click="toggle('destination')"
                :aria-expanded="(openList === 'destination').toString()" aria-haspopup="listbox" aria-labelledby="destination-label">
            <x-icon name="anchor" class="size-4 text-accent" />
            <span class="flex-1 text-sm font-medium" x-text="destination.name">{{ $m['destinations'][0]['name'] }}</span>
            <x-icon name="chevron-down" class="size-4 text-dark/40 transition duration-300" ::class="openList === 'destination' && 'rotate-180'" />
        </button>
        <ul x-show="openList === 'destination'" x-cloak x-transition.origin.top class="{{ $list }}" role="listbox" aria-labelledby="destination-label">
            <template x-for="item in destinations" :key="item.name">
                <li>
                    <button type="button" role="option" :aria-selected="(item.name === destination.name).toString()" @click="choose('destination', item)"
                            class="{{ $option }}" :class="item.name === destination.name && 'bg-accent-soft/60 font-semibold text-accent'">
                        <span x-text="item.name"></span>
                        <span class="flex items-center gap-2">
                            <span x-show="item.domestic" class="rounded-full bg-soft px-2 py-0.5 text-[0.6rem] font-semibold tracking-wide text-dark/50 uppercase">Domestic</span>
                            <x-icon name="check" class="size-4" x-show="item.name === destination.name" />
                        </span>
                    </button>
                </li>
            </template>
        </ul>
    </div>

    {{-- Mode --}}
    <p class="mt-4 text-[0.65rem] font-semibold tracking-wider text-dark/45 uppercase">{{ $m['mode_label'] }}</p>
    <div class="mt-1.5 grid gap-1 rounded-xl bg-soft p-1" :class="modes.length === 3 ? 'grid-cols-3' : 'grid-cols-2'" role="radiogroup" aria-label="{{ $m['mode_label'] }}">
        <template x-for="item in modes" :key="item.label">
            <button type="button" role="radio" :aria-checked="(item.label === mode.label).toString()" @click="setMode(item)"
                    class="rounded-lg px-2 py-2 text-xs font-semibold transition"
                    :class="item.label === mode.label ? 'bg-white text-accent shadow-sm' : 'text-dark/55 hover:text-dark'"
                    x-text="item.label"></button>
        </template>
    </div>

    {{-- Route line --}}
    <div x-ref="summary" class="mt-5 flex items-center gap-3 text-[0.7rem] font-semibold text-dark/60">
        <span class="max-w-[38%] truncate" x-text="origin.split(',')[0]"></span>
        <span class="relative h-px flex-1 border-t border-dashed border-dark/25">
            <span x-ref="traveller" class="absolute top-1/2 left-1/2 grid size-7 -translate-x-1/2 -translate-y-1/2 place-items-center rounded-full bg-accent text-white shadow-lg shadow-accent/30">
                <x-icon name="ship" class="size-3.5" x-show="modeIcon === 'ship'" />
                <x-icon name="plane" class="size-3.5" x-show="modeIcon === 'plane'" x-cloak />
                <x-icon name="truck" class="size-3.5" x-show="modeIcon === 'truck'" x-cloak />
            </span>
        </span>
        <span class="max-w-[38%] truncate text-right" x-text="destination.name.split(',')[0]"></span>
    </div>

    <a :href="quoteUrl" href="{{ route('contact') }}"
       class="group mt-5 flex items-center justify-between rounded-xl bg-primary px-3.5 py-3 text-sm font-medium text-white transition hover:bg-accent">
        <span>{{ $m['cta'] }}</span>
        <x-icon name="arrow-right" class="size-4 transition group-hover:translate-x-1" />
    </a>
</div>
