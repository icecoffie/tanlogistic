@php $faq = config('content.faq'); @endphp

<section class="section">
    <div class="container-site grid gap-12 lg:grid-cols-12">
        <div class="lg:col-span-4">
            <x-section-heading :eyebrow="$faq['eyebrow']" :title="$faq['title']" />
            <p class="mt-6 max-w-sm text-dark/65" data-reveal="up" data-delay="0.1">{{ $faq['description'] }}</p>
            <x-button :href="route('contact')" class="mt-8">{{ config('content.ui.contact_cta') }}</x-button>
        </div>

        <div class="border-t border-dark/10 lg:col-span-8" x-data="{ open: 0 }" data-stagger="0.1">
            @foreach ($faq['items'] as $i => $item)
                <x-faq-item :index="$i" :question="$item['question']">{{ $item['answer'] }}</x-faq-item>
            @endforeach
        </div>
    </div>
</section>
