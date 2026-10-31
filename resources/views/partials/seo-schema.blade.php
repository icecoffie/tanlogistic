{{--
    Structured data (JSON-LD) for Google: Organization with all six offices,
    WebSite, WebPage, breadcrumbs, FAQ and services. Built from config/content.php.
--}}
@php
    $c = config('content.company');
    $home = route('home');
    $orgId = $home.'#organization';
    $current = url()->current();
    $sameAs = array_values(array_filter(array_column($c['social'], 'url'), fn ($u) => filled($u) && $u !== '#'));

    $postal = fn (array $o) => array_filter([
        '@type' => 'PostalAddress',
        'streetAddress' => $o['address'],
        'addressLocality' => $o['city'],
        'addressRegion' => $o['region'],
        'postalCode' => $o['postal_code'] ?? null,
        'addressCountry' => 'ID',
    ]);

    $organization = array_filter([
        '@type' => 'Organization',
        '@id' => $orgId,
        'name' => $c['brand'],
        'legalName' => $c['name'],
        'alternateName' => ['TAN LOGISTIC', 'PT Tetuko Anugerah Nusantara', 'Tetuko Anugerah Nusantara'],
        'url' => $home,
        'logo' => ['@type' => 'ImageObject', 'url' => asset($c['logo']), 'width' => getimagesize(public_path($c['logo']))[0] ?? null, 'height' => getimagesize(public_path($c['logo']))[1] ?? null],
        'image' => asset(config('content.seo.default_image')),
        'description' => config('content.seo.home.description'),
        'email' => $c['email'],
        'telephone' => $c['phone'],
        'address' => $postal(['address' => $c['street'], 'city' => $c['city'], 'region' => $c['region'], 'postal_code' => $c['postal_code']]),
        'areaServed' => ['@type' => 'Country', 'name' => 'Indonesia'],
        'contactPoint' => [[
            '@type' => 'ContactPoint',
            'contactType' => 'customer service',
            'telephone' => $c['phone'],
            'email' => $c['email'],
            'areaServed' => 'ID',
            'availableLanguage' => ['English', 'Indonesian'],
        ], ...(filled($c['whatsapp']['number'] ?? null) ? [[
            '@type' => 'ContactPoint',
            'contactType' => 'sales',
            'name' => $c['whatsapp']['name'].', '.$c['whatsapp']['title'],
            'telephone' => $c['whatsapp']['display'],
            'url' => 'https://wa.me/'.$c['whatsapp']['number'],
            'areaServed' => 'ID',
            'availableLanguage' => ['English', 'Indonesian'],
        ]] : [])],
        'memberOf' => ['@type' => 'Organization', 'name' => 'JCTrans Global Logistics Network'],
        'knowsAbout' => ['Freight forwarding', 'Ocean freight FCL and LCL', 'Air freight', 'Customs clearance', 'Export and import', 'Domestic trucking', 'Inter island freight', 'Project cargo', 'Warehousing', 'Cross docking'],
        'sameAs' => $sameAs ?: null,
        'department' => collect(config('content.offices'))->reject(fn ($o) => $o['head'])->map(fn ($o) => [
            '@type' => 'LocalBusiness',
            'name' => $c['brand'].' '.$o['name'],
            'telephone' => $o['phone'],
            'email' => $c['email'],
            'address' => $postal($o),
            'image' => asset(config('content.seo.default_image')),
            'parentOrganization' => ['@id' => $orgId],
        ])->values()->all(),
    ]);

    $graph = [
        $organization,
        [
            '@type' => 'WebSite',
            '@id' => $home.'#website',
            'url' => $home,
            'name' => $c['brand'],
            'alternateName' => $c['name'],
            'inLanguage' => 'en',
            'publisher' => ['@id' => $orgId],
        ],
        [
            '@type' => 'WebPage',
            '@id' => $current.'#webpage',
            'url' => $current,
            'name' => $seo['title'],
            'description' => $seo['description'],
            'inLanguage' => 'en',
            'isPartOf' => ['@id' => $home.'#website'],
            'about' => ['@id' => $orgId],
            'primaryImageOfPage' => ['@type' => 'ImageObject', 'url' => $ogImage],
        ],
    ];

    if (! in_array($page ?? 'home', ['home', '404'], true)) {
        $graph[] = [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $home],
                ['@type' => 'ListItem', 'position' => 2, 'name' => \Illuminate\Support\Str::of($seo['title'])->before(' |')->toString(), 'item' => $current],
            ],
        ];
    }

    if (in_array($page ?? null, ['home', 'contact'], true)) {
        $graph[] = [
            '@type' => 'FAQPage',
            'mainEntity' => collect(config('content.faq.items'))->map(fn ($f) => [
                '@type' => 'Question',
                'name' => $f['question'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['answer']],
            ])->all(),
        ];
    }

    if (($page ?? null) === 'services') {
        $graph[] = [
            '@type' => 'ItemList',
            'name' => config('content.services_page.title'),
            'itemListElement' => collect(config('content.services'))->values()->map(fn ($s, $i) => [
                '@type' => 'ListItem',
                'position' => $i + 1,
                'item' => [
                    '@type' => 'Service',
                    'name' => $s['title'],
                    'serviceType' => $s['subtitle'],
                    'description' => $s['description'],
                    'url' => route('services').'#'.$s['id'],
                    'image' => asset($s['image']),
                    'provider' => ['@id' => $orgId],
                    'areaServed' => ['@type' => 'Country', 'name' => 'Indonesia'],
                ],
            ])->all(),
        ];
    }

    $schema = json_encode(['@context' => 'https://schema.org', '@graph' => $graph], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG);
@endphp
<script type="application/ld+json">{!! $schema !!}</script>
