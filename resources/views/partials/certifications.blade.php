<div class="grid gap-4 md:grid-cols-2" data-stagger="0.12">
    @foreach (config('content.certifications') as $cert)
        @php $images = array_filter($cert['images'] ?? [], fn ($img) => file_exists(public_path($img))); @endphp
        <div class="flex flex-col rounded-2xl border border-dark/5 bg-white p-6 transition duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-primary/5">
            <div class="flex h-28 items-center justify-center gap-4 rounded-xl bg-soft/60 p-3">
                @forelse ($images as $img)
                    <img src="{{ asset($img) }}" alt="{{ $cert['title'] }} badge" loading="lazy" decoding="async" class="h-20 w-auto max-w-[30%] object-contain">
                @empty
                    <x-icon :name="$cert['icon']" class="size-10 text-accent" />
                @endforelse
            </div>
            <p class="mt-5 font-display text-2xl text-primary uppercase">{{ $cert['title'] }}</p>
            <p class="mt-1 text-sm text-dark/60">{{ $cert['text'] }}</p>
        </div>
    @endforeach
</div>
