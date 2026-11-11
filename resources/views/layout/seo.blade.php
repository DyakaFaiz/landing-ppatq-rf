{{-- Meta SEO. Halaman mengisi lewat @section: title, description, robots, og_image, og_type, jsonld --}}
@php
    $namaSitus = 'PPATQ Raudlatul Falah';
    $judul = trim(html_entity_decode(strip_tags($__env->yieldContent('title')), ENT_QUOTES)) ?: $namaSitus;
    $deskripsi = trim(html_entity_decode($__env->yieldContent('description'), ENT_QUOTES))
        ?: "Pondok pesantren anak-anak tahfidzul Qur'an di Gembong, Pati. Hafalan Al-Qur'an terpadu pendidikan formal MI, pendaftaran santri baru, berita, dan agenda.";
    $robots = trim($__env->yieldContent('robots')) ?: 'index,follow,max-image-preview:large';
    $gambar = trim(html_entity_decode($__env->yieldContent('og_image'), ENT_QUOTES)) ?: asset('img/cropped-header-objectpatq.png');
    $tipe = trim($__env->yieldContent('og_type')) ?: 'website';
    $halaman = (int) request()->query('page', 1);
    $kanonik = url()->current() . ($halaman > 1 ? '?page=' . $halaman : '');
@endphp
<meta name="description" content="{{ $deskripsi }}">
<meta name="robots" content="{{ $robots }}">
<link rel="canonical" href="{{ $kanonik }}">

<meta property="og:locale" content="id_ID">
<meta property="og:site_name" content="{{ $namaSitus }}">
<meta property="og:type" content="{{ $tipe }}">
<meta property="og:title" content="{{ $judul }}">
<meta property="og:description" content="{{ $deskripsi }}">
<meta property="og:url" content="{{ $kanonik }}">
<meta property="og:image" content="{{ $gambar }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $judul }}">
<meta name="twitter:description" content="{{ $deskripsi }}">
<meta name="twitter:image" content="{{ $gambar }}">

@if (request()->routeIs('HomePage'))
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'EducationalOrganization',
    'name' => $namaSitus,
    'alternateName' => "Pondok Pesantren Anak-anak Tahfidzul Qur'an Raudlatul Falah",
    'url' => url('/'),
    'logo' => asset('img/cropped-header-objectpatq.png'),
    'description' => $deskripsi,
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => 'Jl. KH. Abdullah Km. 02',
        'addressLocality' => 'Gembong, Kabupaten Pati',
        'addressRegion' => 'Jawa Tengah',
        'postalCode' => '59162',
        'addressCountry' => 'ID',
    ],
    'sameAs' => [
        'https://www.facebook.com/pprtq.r.falah',
        'https://www.youtube.com/@PPATQTV',
        'https://www.instagram.com/ppatq_raudlatulfalah/',
        'https://www.tiktok.com/@ppatq.raudlatulfalah',
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}
</script>
@endif
@yield('jsonld')
