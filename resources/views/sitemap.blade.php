{!! '<'.'?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($pages as $page)
    <url>
        <loc>{{ route($page) }}</loc>
        <lastmod>{{ $lastModified }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>{{ $page === 'home' ? '1.0' : '0.8' }}</priority>
    </url>
@endforeach
    <url>
        <loc>{{ route('company-profile') }}</loc>
        <lastmod>{{ date('Y-m-d', filemtime(storage_path(config('content.company_profile.path')))) }}</lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.6</priority>
    </url>
</urlset>
