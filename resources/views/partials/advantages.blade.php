@php $advantages = config('content.advantages'); @endphp

<section class="section bg-soft">
    <div class="container-site">
        <div class="flex flex-col gap-8 md:flex-row md:items-end md:justify-between">
            <x-section-heading :eyebrow="$advantages['eyebrow']" :title="$advantages['title']" />
            <div class="max-w-sm" data-reveal="up" data-delay="0.15">
                <p class="text-dark/65">{{ $advantages['description'] }}</p>
                @unless (request()->routeIs('about'))
                    <x-button :href="route('about')" variant="outline" class="mt-5">{{ config('content.ui.about_us') }}</x-button>
                @endunless
            </div>
        </div>

        <div class="mt-14 grid gap-4 md:grid-cols-3 md:gap-0" data-stagger="0.15">
            @foreach ($advantages['items'] as $i => $item)
                <article @class([
                    'flex flex-col rounded-2xl p-8 md:min-h-[380px] lg:p-10',
                    'bg-primary text-white md:rounded-r-none' => $i === 0,
                    'relative z-10 bg-accent text-white shadow-2xl shadow-accent/30 md:-my-4 md:py-12' => $i === 1,
                    'bg-white text-dark md:rounded-l-none' => $i === 2,
                ])>
                    <span @class(['font-display text-6xl leading-none lg:text-7xl', 'text-white/30' => $i < 2, 'text-accent/25' => $i === 2])>{{ $item['number'] }}</span>
                    <h3 @class(['mt-8 text-3xl lg:text-4xl', 'text-primary' => $i === 2])>{{ $item['title'] }}</h3>
                    <p @class(['mt-4 text-sm leading-relaxed', 'text-white/80' => $i < 2, 'text-dark/65' => $i === 2])>{{ $item['text'] }}</p>

                    @if ($item['points'])
                        <ul class="mt-6 grid gap-2.5 text-sm">
                            @foreach ($item['points'] as $point)
                                <li class="flex items-center gap-2.5">
                                    <span class="grid size-5 place-items-center rounded-full bg-white/20"><x-icon name="check" class="size-3" stroke="2.5" /></span>
                                    {{ $point }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </article>
            @endforeach
        </div>
    </div>
</section>
