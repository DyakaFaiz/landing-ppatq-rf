<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($halaman as [$nama, $frekuensi, $prioritas])
    <url>
        <loc>{{ route($nama) }}</loc>
        <changefreq>{{ $frekuensi }}</changefreq>
        <priority>{{ $prioritas }}</priority>
    </url>
@endforeach
@foreach ($berita as $item)
    <url>
        <loc>{{ route('berita.detail', ['slug' => $item->slug]) }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse($item->diubah)->toDateString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
@endforeach
</urlset>
