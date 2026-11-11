@extends('layout.main_layout')
@section('title')
<title>{{ $berita->judul }} | PPATQ-RF</title>
@endsection
@php
    $thumbBerita = !$berita->thumbnail ? asset('img/cropped-header-objectpatq.png')
        : (str_contains($berita->thumbnail, 'http') ? $berita->thumbnail : 'https://manajemen.ppatq-rf.id/assets/img/upload/berita/thumbnail/' . $berita->thumbnail);
    $ringkasBerita = Str::limit(trim(preg_replace('/\s+/u', ' ', html_entity_decode(strip_tags($berita->isi_berita), ENT_QUOTES))), 155);
@endphp
@section('description', $ringkasBerita)
@section('og_type', 'article')
@section('og_image', $thumbBerita)
@section('jsonld')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'NewsArticle',
    'headline' => Str::limit($berita->judul, 110, ''),
    'description' => $ringkasBerita,
    'image' => [$thumbBerita],
    'datePublished' => \Carbon\Carbon::parse($berita->created_at)->toIso8601String(),
    'author' => ['@type' => 'Person', 'name' => $berita->nama_user ?: 'PPATQ Raudlatul Falah'],
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'PPATQ Raudlatul Falah',
        'logo' => ['@type' => 'ImageObject', 'url' => asset('img/cropped-header-objectpatq.png')],
    ],
    'mainEntityOfPage' => url()->current(),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Beranda', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Berita', 'item' => route('berita')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => $berita->judul],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}
</script>
@endsection

@section('header')
<style>
    .badge-seamless {
        display: inline-block;
        background: #e6f4ea;
        color: #198754;
        padding: 6px 14px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 0.85rem;
    }
    .berita-judul {
        color: #1a5632;
        font-weight: 800;
    }
    .berita-meta {
        color: #5c8c6d;
        font-size: 0.9rem;
    }
    /* Gambar utama dibuat lebih kecil dan tidak dipotong */
    .berita-hero {
        display: block;
        width: auto;
        max-width: 100%;
        max-height: 340px;
        margin-left: auto;
        margin-right: auto;
        border-radius: 20px;
        background: linear-gradient(135deg, #f8fcf9 0%, #e8f5ed 100%);
    }
    .berita-breadcrumb {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        margin-bottom: 16px;
        font-size: 0.85rem;
        color: #5c8c6d;
    }
    .berita-breadcrumb a {
        color: #198754;
        text-decoration: none;
    }
    .berita-breadcrumb a:hover {
        text-decoration: underline;
    }
    .berita-breadcrumb .terakhir {
        flex: 1 1 100%;
        max-width: 100%;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
    .berbagi-bar {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 8px;
        padding: 12px 0;
    }
    .berbagi-bar .label {
        margin-right: 4px;
        color: #5c8c6d;
        font-size: 0.85rem;
        font-weight: 600;
    }
    .berbagi-tombol {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border: 0;
        border-radius: 16px;
        background: linear-gradient(135deg, #f8fcf9 0%, #e8f5ed 100%);
        color: #1a5632;
        font-size: 0.85rem;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        transition: transform 0.3s ease, background 0.3s ease;
    }
    .berbagi-tombol:hover {
        color: #1a5632;
        background: #e6f4ea;
        transform: translateY(-2px);
    }
    .berbagi-tombol.facebook i { color: #1877f2; }
    .berbagi-tombol.whatsapp i { color: #25d366; }
    .navigasi-berita {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        margin-top: 32px;
    }
    .navigasi-berita a {
        flex: 1 1 260px;
        padding: 12px 16px;
        border-radius: 20px;
        background: linear-gradient(135deg, #f8fcf9 0%, #e8f5ed 100%);
        color: #1a5632;
        text-decoration: none;
        transition: transform 0.3s ease, background 0.3s ease;
    }
    .navigasi-berita a:hover {
        background: #e6f4ea;
        transform: translateY(-3px);
    }
    .navigasi-berita small {
        display: block;
        color: #5c8c6d;
        font-weight: 600;
    }
    .navigasi-berita strong {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.3;
    }
    .navigasi-berita .berikutnya {
        text-align: right;
    }
    .terkait-kartu {
        display: block;
        text-decoration: none;
        transition: transform 0.3s ease;
    }
    .terkait-kartu:hover {
        transform: translateY(-3px);
    }
    .terkait-kartu img {
        width: 100%;
        height: 140px;
        object-fit: cover;
        border-radius: 16px;
        background: linear-gradient(135deg, #f8fcf9 0%, #e8f5ed 100%);
    }
    .terkait-kartu .judul {
        margin-top: 8px;
        color: #1a5632;
        font-weight: 700;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .terkait-kartu small {
        color: #5c8c6d;
    }
    @media (min-width: 992px) {
        .sidebar-lengket {
            position: sticky;
            top: 16px;
        }
    }
    .berita-isi {
        overflow-wrap: break-word;
    }
    .berita-isi img,
    .berita-isi iframe,
    .berita-isi table {
        max-width: 100% !important;
        height: auto;
    }
    .berita-isi img {
        border-radius: 16px;
    }
    .share-seamless {
        color: #198754;
        font-size: 1.5rem;
        transition: color 0.3s ease;
    }
    .share-seamless:hover {
        color: #1a5632;
    }
    .terbaru-item {
        display: flex;
        gap: 14px;
        margin-bottom: 20px;
        text-decoration: none;
        transition: transform 0.3s ease;
    }
    .terbaru-item:hover {
        transform: translateY(-3px);
    }
    .terbaru-item img {
        flex: 0 0 auto;
        width: 90px;
        height: 90px;
        object-fit: cover;
        border-radius: 16px;
        background: linear-gradient(135deg, #f8fcf9 0%, #e8f5ed 100%);
    }
    .terbaru-judul {
        color: #1a5632;
        font-weight: 700;
        line-height: 1.3;
    }
    .terbaru-ringkas {
        color: #5c8c6d;
        font-size: 0.85rem;
        line-height: 1.4;
    }
</style>
@endsection

@section('content')
    @php
        Carbon\Carbon::setLocale('id');
        // Perkiraan waktu baca: ~200 kata per menit
        $menitBaca = max(1, (int) ceil(str_word_count(strip_tags($berita->isi_berita ?? '')) / 200));
        $fotoKosong = asset('img/auth-cover-login-mask-light.png');
        // Thumbnail bisa berupa URL penuh atau nama file di penyimpanan manajemen
        $urlThumbnail = fn ($thumbnail) => !$thumbnail ? $fotoKosong
            : (str_contains($thumbnail, 'http') ? $thumbnail : 'https://manajemen.ppatq-rf.id/assets/img/upload/berita/thumbnail/' . $thumbnail);
    @endphp
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-4">
            <div class="row g-5">
                <div class="col-lg-8">
                    <article class="mb-5">
                        <nav class="berita-breadcrumb" aria-label="Breadcrumb">
                            <a href="{{ route('HomePage') }}">Beranda</a> <span>/</span>
                            <a href="{{ route('berita') }}">Berita</a> <span>/</span>
                            <span class="terakhir">{{ $berita->judul }}</span>
                        </nav>

                        @if ($berita->nama_kategori)
                            <span class="badge-seamless mb-3">{{ $berita->nama_kategori }}</span>
                        @endif
                        <h1 class="berita-judul mb-3">{{ $berita->judul }}</h1>

                        <div class="berita-meta mb-3">
                            <span class="me-3"><i class="far fa-user text-green me-2"></i>{{ $berita->nama_user ?: 'Anonim' }}</span>
                            <span class="me-3"><i class="far fa-calendar-alt text-green me-2"></i>{{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}</span>
                            <span><i class="bi bi-clock text-green me-2"></i>{{ $menitBaca }} menit baca</span>
                        </div>

                        <img class="berita-hero mb-4" src="{{ $urlThumbnail($berita->thumbnail) }}" alt="{{ $berita->judul }}"
                            onerror="this.onerror=null; this.src='{{ $fotoKosong }}';">

                        <div class="berita-isi">{!! $berita->isi_berita !!}</div>

                        <div class="berbagi-bar mt-4">
                            <span class="label">Bagikan:</span>
                            <a target="_blank" rel="noopener" class="berbagi-tombol facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}">
                                <i class="bi bi-facebook"></i> Facebook
                            </a>
                            <a target="_blank" rel="noopener" class="berbagi-tombol whatsapp" href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . url()->current()) }}">
                                <i class="bi bi-whatsapp"></i> WhatsApp
                            </a>
                            <button type="button" class="berbagi-tombol" id="salin-tautan" data-tautan="{{ url()->current() }}">
                                <i class="bi bi-link-45deg"></i> <span>Salin tautan</span>
                            </button>
                        </div>

                        @if ($sebelumnya || $berikutnya)
                            <div class="navigasi-berita">
                                @if ($sebelumnya)
                                    <a href="{{ route('berita.detail', ['slug' => $sebelumnya->slug_publik]) }}">
                                        <small><i class="bi bi-arrow-left"></i> Sebelumnya</small>
                                        <strong>{{ $sebelumnya->judul }}</strong>
                                    </a>
                                @endif
                                @if ($berikutnya)
                                    <a class="berikutnya" href="{{ route('berita.detail', ['slug' => $berikutnya->slug_publik]) }}">
                                        <small>Berikutnya <i class="bi bi-arrow-right"></i></small>
                                        <strong>{{ $berikutnya->judul }}</strong>
                                    </a>
                                @endif
                            </div>
                        @endif
                    </article>

                    @if ($terkait->isNotEmpty())
                        <section class="mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h2 class="h3 mb-0 text-green">Berita Terkait</h2>
                            </div>
                            <div class="row g-4">
                                @foreach ($terkait as $row)
                                    <div class="col-12 col-sm-4">
                                        <a class="terkait-kartu" href="{{ route('berita.detail', ['slug' => $row->slug_publik]) }}">
                                            <img loading="lazy" src="{{ $urlThumbnail($row->thumbnail) }}" alt="{{ $row->judul }}"
                                                onerror="this.onerror=null; this.src='{{ $fotoKosong }}';">
                                            <div class="judul">{{ $row->judul }}</div>
                                            <small>{{ \Carbon\Carbon::parse($row->created_at)->translatedFormat('d F Y') }}</small>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif
                </div>

                <aside class="col-lg-4">
                  <div class="sidebar-lengket">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h2 class="h3 mb-0 text-green">Berita Terbaru</h2>
                    </div>
                    @foreach ($dataList as $row)
                        <a href="{{ route('berita.detail', ['slug' => $row->slug_publik]) }}" class="terbaru-item">
                            <img loading="lazy" src="{{ $urlThumbnail($row->thumbnail) }}" alt="{{ $row->judul }}"
                                onerror="this.onerror=null; this.src='{{ $fotoKosong }}';">
                            <div>
                                <div class="terbaru-judul">{{ $row->judul }}</div>
                                <div class="terbaru-ringkas">{{ Str::limit(strip_tags($row->isi_berita), 50) }}</div>
                            </div>
                        </a>
                    @endforeach
                    <a class="btn-seamless" href="{{ route('berita') }}">Semua Berita <i class="bi bi-arrow-right ms-1"></i></a>
                  </div>
                </aside>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $('#salin-tautan').on('click', function() {
        var tombol = $(this);
        var tautan = tombol.data('tautan');
        var selesai = function() {
            tombol.find('span').text('Tersalin!');
            setTimeout(function() { tombol.find('span').text('Salin tautan'); }, 2000);
        };
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(tautan).then(selesai);
        } else {
            var sementara = $('<input>').val(tautan).appendTo('body').select();
            document.execCommand('copy');
            sementara.remove();
            selesai();
        }
    });
</script>
@endsection
