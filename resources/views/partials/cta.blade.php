@php $cta = config('content.cta'); @endphp

<section class="pb-20 md:pb-28">
    <div class="container-site">
        <div data-reveal="scale" class="relative overflow-hidden rounded-4xl bg-accent px-8 py-14 text-white md:px-14 md:py-16">
            <img src="{{ asset('images/hero.jpg') }}" alt="" loading="lazy" class="absolute inset-0 size-full object-cover opacity-15 mix-blend-luminosity">
            <div class="relative flex flex-col gap-8 md:flex-row md:items-center md:justify-between">
                <div class="max-w-xl">
                    <h2 class="text-4xl md:text-5xl">{{ $cta['title'] }}</h2>
                    <p class="mt-4 text-white/85">{{ $cta['text'] }}</p>
                </div>
                <x-button :href="route('contact')" variant="light" class="self-start md:self-auto">{{ $cta['button'] }}</x-button>
            </div>
        </div>
    </div>
</section>
