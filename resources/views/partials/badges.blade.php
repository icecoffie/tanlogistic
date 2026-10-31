{{-- Certification and membership badges on white chips (readable on any background) --}}
<ul class="flex flex-wrap items-center gap-2.5">
    @foreach (config('content.badges') as $badge)
        <li class="grid h-20 place-items-center rounded-xl bg-white px-4 py-2.5 shadow-sm transition duration-300 hover:-translate-y-0.5">
            <img src="{{ asset($badge['image']) }}" alt="{{ $badge['alt'] }}" title="{{ $badge['alt'] }}" loading="lazy" decoding="async" class="h-[3.75rem] w-auto max-w-[10rem] object-contain">
        </li>
    @endforeach
</ul>
