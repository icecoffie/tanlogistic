{{-- Item accordion. Harus berada di dalam parent x-data="{ open: ... }" --}}
@props(['index', 'question'])

<div class="border-b border-dark/10">
    <h3 class="font-sans normal-case tracking-normal">
        <button type="button"
                class="flex w-full items-center justify-between gap-6 py-6 text-left text-base font-semibold text-dark transition hover:text-accent md:text-lg"
                @click="open = open === {{ $index }} ? null : {{ $index }}"
                :aria-expanded="(open === {{ $index }}).toString()"
                aria-controls="faq-{{ $index }}">
            <span>{{ $question }}</span>
            <span class="grid size-9 shrink-0 place-items-center rounded-full border border-dark/10 transition"
                  :class="open === {{ $index }} ? 'bg-accent border-accent text-white' : 'text-dark'">
                <x-icon name="plus" class="size-4" x-show="open !== {{ $index }}" />
                <x-icon name="minus" class="size-4" x-show="open === {{ $index }}" x-cloak />
            </span>
        </button>
    </h3>
    <div id="faq-{{ $index }}" x-show="open === {{ $index }}" x-collapse @if ($index !== 0) x-cloak @endif>
        <p class="max-w-2xl pb-6 text-sm leading-relaxed text-dark/65 md:text-base">{{ $slot }}</p>
    </div>
</div>
