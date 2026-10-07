<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($staticUrls as $url)
    <url>
        <loc>{{ $url }}</loc>
        <lastmod>{{ date('Y-m-d') }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>{{ $url === url('/') ? '1.0' : '0.8' }}</priority>
    </url>
@endforeach

@foreach($vehicles as $vehicle)
    <url>
        <loc>{{ route('vehicles.show', $vehicle->slug) }}</loc>
        <lastmod>{{ $vehicle->updated_at->format('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
@endforeach

@foreach($seoPages as $page)
    <url>
        <loc>{{ url('/' . $page->slug) }}</loc>
        <lastmod>{{ $page->updated_at->format('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
@endforeach
</urlset>
