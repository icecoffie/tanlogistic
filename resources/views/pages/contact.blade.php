@extends('layouts.app')

@php
    $company = config('content.company');
    $contact = config('content.contact');
    $form = $contact['form'];
    $tel = fn ($phone) => 'tel:'.preg_replace('/[^0-9+]/', '', $phone);
    $field = 'w-full rounded-xl border border-dark/10 bg-white px-4 py-3 text-sm transition outline-none placeholder:text-dark/35 focus:border-accent focus:ring-4 focus:ring-accent/10';
    $wa = $company['whatsapp'];
    $hasWa = filled($wa['number'] ?? null);
    $waLink = $hasWa ? 'https://wa.me/'.$wa['number'].'?text='.rawurlencode($wa['message']) : null;
    $mailConfig = ['email' => $company['email'], 'whatsapp' => $wa['number'] ?? '', 'subject' => $form['mail_subject'], 'labels' => $form['mail_labels'], 'prefill' => $form['prefill']];
@endphp

@section('content')

<x-page-header :eyebrow="$contact['eyebrow']" :title="$contact['header_title']" :subtitle="$contact['header_subtitle']" :image="$contact['image']" />

<section class="section">
    <div class="container-site grid gap-6 lg:grid-cols-12">
        {{-- Mailto form (no backend) --}}
        <div class="rounded-4xl bg-soft p-6 sm:p-10 lg:col-span-7" data-reveal="up">
            <x-section-heading :eyebrow="$contact['eyebrow']" :title="$contact['title']" />

            <form x-data="contactForm(@js($mailConfig))" @submit.prevent="send"
                  action="mailto:{{ $company['email'] }}" method="post" enctype="text/plain"
                  class="mt-10 grid gap-4 sm:grid-cols-2">
                <label class="grid gap-2 text-sm font-medium">{{ $form['name'] }} *
                    <input x-model="form.name" name="name" type="text" required autocomplete="name" placeholder="{{ $form['name_placeholder'] }}" class="{{ $field }}">
                </label>
                <label class="grid gap-2 text-sm font-medium">{{ $form['company'] }}
                    <input x-model="form.company" name="company" type="text" autocomplete="organization" placeholder="{{ $form['company_placeholder'] }}" class="{{ $field }}">
                </label>
                <label class="grid gap-2 text-sm font-medium">{{ $form['email'] }} *
                    <input x-model="form.email" name="email" type="email" required autocomplete="email" placeholder="{{ $form['email_placeholder'] }}" class="{{ $field }}">
                </label>
                <label class="grid gap-2 text-sm font-medium">{{ $form['phone'] }}
                    <input x-model="form.phone" name="phone" type="tel" autocomplete="tel" placeholder="{{ $form['phone_placeholder'] }}" class="{{ $field }}">
                </label>
                <label class="grid gap-2 text-sm font-medium sm:col-span-2">{{ $form['service'] }}
                    <select x-model="form.service" name="service" class="{{ $field }}">
                        <option value="">{{ $form['service_placeholder'] }}</option>
                        @foreach (config('content.services') as $service)
                            <option>{{ $service['title'] }}</option>
                        @endforeach
                        <option>{{ $form['service_other'] }}</option>
                    </select>
                </label>
                <label class="grid gap-2 text-sm font-medium sm:col-span-2">{{ $form['message'] }} *
                    <textarea x-model="form.message" name="message" rows="5" required placeholder="{{ $form['message_placeholder'] }}" class="{{ $field }} resize-y"></textarea>
                </label>

                <div class="flex flex-col gap-3 sm:col-span-2">
                    <div class="flex flex-wrap gap-2">
                        <button type="submit" @click="via = 'email'" class="group inline-flex items-center gap-2 rounded-full bg-accent py-2 pr-2 pl-6 text-sm font-semibold text-white shadow-lg shadow-accent/25 transition hover:bg-primary">
                            {{ $form['submit'] }}
                            <span class="grid size-8 place-items-center rounded-full bg-white/20 transition group-hover:translate-x-0.5"><x-icon name="send" class="size-4" /></span>
                        </button>
                    </div>
                    <p class="text-xs text-dark/50">{{ $form['note'] }}</p>
                </div>

                <p x-show="sent" x-cloak x-transition class="flex flex-wrap items-center gap-x-2 rounded-xl bg-white p-4 text-sm text-dark/70 sm:col-span-2" role="status">
                    <x-icon name="check" class="size-4 text-accent" />
                    {{ $form['sent'] }}
                    <a href="mailto:{{ $company['email'] }}" class="font-semibold text-accent">{{ $company['email'] }}</a>
                </p>
            </form>
        </div>

        {{-- Contact details --}}
        <aside class="flex flex-col gap-4 lg:col-span-5" data-reveal="up" data-delay="0.15">
            <div class="relative flex-1 overflow-hidden rounded-4xl bg-primary p-8 text-white sm:p-10">
                <x-icon name="globe" class="absolute -right-10 -bottom-10 size-56 text-white/5" stroke="1" />
                <h2 class="text-4xl">{{ $contact['direct_title'] }}</h2>
                <p class="mt-3 text-sm text-white/70">{{ $company['name'] }}</p>

                <ul class="relative mt-10 space-y-3">
                    @if ($hasWa)
                        <li>
                            <a href="{{ $waLink }}" target="_blank" rel="noopener" class="glass flex items-center gap-4 rounded-2xl p-4 transition hover:bg-white/20">
                                <span class="grid size-11 shrink-0 place-items-center rounded-full bg-accent"><x-icon name="whatsapp" class="size-5" /></span>
                                <span class="min-w-0 flex-1">
                                    <span class="block text-xs text-white/60">{{ $contact['whatsapp_label'] }} · {{ $wa['name'] }}, {{ $wa['title'] }}</span>
                                    <span class="font-semibold">{{ $wa['display'] }}</span>
                                </span>
                            </a>
                        </li>
                    @endif
                    @if (filled($company['wechat'] ?? null))
                        <li x-data="{ copied: false }">
                            <button type="button" class="glass flex w-full items-center gap-4 rounded-2xl p-4 text-left transition hover:bg-white/20"
                                    @click="navigator.clipboard?.writeText(@js($company['wechat'])); copied = true; setTimeout(() => copied = false, 2000)">
                                <span class="grid size-11 shrink-0 place-items-center rounded-full bg-accent"><x-icon name="wechat" class="size-5" /></span>
                                <span class="min-w-0 flex-1"><span class="block text-xs text-white/60">{{ $contact['wechat_label'] }}</span><span class="font-semibold">{{ $company['wechat'] }}</span></span>
                                <span class="flex items-center gap-1.5 rounded-full bg-white/15 px-3 py-1 text-xs font-medium">
                                    <x-icon name="copy" class="size-3.5" x-show="!copied" />
                                    <x-icon name="check" class="size-3.5" x-show="copied" x-cloak />
                                    <span x-text="copied ? @js($contact['copied']) : @js($contact['copy'])">{{ $contact['copy'] }}</span>
                                </span>
                            </button>
                        </li>
                    @endif
                    @foreach ([
                        ['href' => 'mailto:'.$company['email'], 'icon' => 'mail', 'label' => $contact['email_label'], 'value' => $company['email']],
                        ['href' => $tel($company['phone']), 'icon' => 'phone', 'label' => $contact['phone_label'], 'value' => $company['phone']],
                        ['href' => 'https://'.$company['website'], 'icon' => 'globe', 'label' => $contact['website_label'], 'value' => $company['website']],
                    ] as $item)
                        <li>
                            <a href="{{ $item['href'] }}" class="glass flex items-center gap-4 rounded-2xl p-4 transition hover:bg-white/20">
                                <span class="grid size-11 shrink-0 place-items-center rounded-full bg-accent"><x-icon :name="$item['icon']" class="size-5" /></span>
                                <span><span class="block text-xs text-white/60">{{ $item['label'] }}</span><span class="font-semibold">{{ $item['value'] }}</span></span>
                            </a>
                        </li>
                    @endforeach
                </ul>

            </div>
        </aside>
    </div>
</section>

{{-- Offices --}}
<section class="pb-20 md:pb-28">
    <div class="container-site">
        <x-section-heading :eyebrow="$contact['offices_eyebrow']" :title="$contact['offices_title']" class="mb-12" />

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3" data-stagger="0.1">
            @foreach (config('content.offices') as $office)
                <article @class([
                    'flex flex-col rounded-2xl p-7 transition duration-300 hover:-translate-y-1',
                    'bg-accent text-white shadow-xl shadow-accent/25' => $office['head'],
                    'bg-soft hover:bg-white hover:shadow-lg hover:shadow-primary/5' => ! $office['head'],
                ])>
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h3 @class(['text-3xl', 'text-primary' => ! $office['head']])>{{ $office['name'] }}</h3>
                            <p @class(['mt-1 text-xs font-medium tracking-wider uppercase', 'text-white/70' => $office['head'], 'text-dark/45' => ! $office['head']])>{{ $office['city'] }}</p>
                        </div>
                        <span @class(['grid size-11 shrink-0 place-items-center rounded-full', 'bg-white/20' => $office['head'], 'bg-white text-accent' => ! $office['head']])>
                            <x-icon :name="$office['head'] ? 'building' : 'map-pin'" class="size-5" />
                        </span>
                    </div>

                    <p @class(['mt-6 flex-1 text-sm leading-relaxed', 'text-white/85' => $office['head'], 'text-dark/65' => ! $office['head']])>{{ $office['address'] }}</p>

                    <div @class(['mt-6 flex flex-wrap items-center justify-between gap-3 border-t pt-5 text-sm font-medium', 'border-white/20' => $office['head'], 'border-dark/10' => ! $office['head']])>
                        <a href="{{ $tel($office['phone']) }}" class="flex items-center gap-2 transition hover:opacity-70">
                            <x-icon name="phone" class="size-4" />{{ $office['phone'] }}
                        </a>
                        <a href="https://www.google.com/maps/search/?api=1&query={{ rawurlencode($office['address']) }}" target="_blank" rel="noopener"
                           @class(['flex items-center gap-1 transition hover:opacity-70', 'text-accent' => ! $office['head']])>
                            {{ config('content.ui.maps') }} <x-icon name="arrow-up-right" class="size-4" />
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

@include('partials.faq')

@endsection
