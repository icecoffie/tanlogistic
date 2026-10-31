{{-- $limit (optional): number of logos to show --}}
@php
    $clients = config('content.clients');
    $shown = isset($limit) ? array_slice($clients, 0, $limit) : $clients;
@endphp

<div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-6" data-stagger="0.04" data-reveal-children="scale">
    @foreach ($shown as $client)
        <x-client-logo :name="$client['name']" :logo="$client['logo']" />
    @endforeach
</div>
