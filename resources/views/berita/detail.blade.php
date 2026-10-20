@extends('layout.main_layout')
@section('title')
<title>{{ $berita->judul }} | PPATQ-RF</title>
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
    .berita-hero {
        width: 100%;
        border-radius: 24px;
        background: linear-gradient(135deg, #f8fcf9 0%, #e8f5ed 100%);
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
                        @if ($berita->nama_kategori)
                            <span class="badge-seamless mb-3">{{ $berita->nama_kategori }}</span>
                        @endif
                        <h1 class="berita-judul mb-3">{{ $berita->judul }}</h1>

                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
                            <div class="berita-meta">
                                <span class="me-3"><i class="far fa-user text-green me-2"></i>{{ $berita->nama_user ?: 'Anonim' }}</span>
                                <span><i class="far fa-calendar-alt text-green me-2"></i>{{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}</span>
                            </div>
                            <a target="_blank" rel="noopener" class="share-seamless" title="Bagikan ke Facebook"
                                href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}">
                                <i class="bi bi-facebook"></i>
                            </a>
                        </div>

                        <img class="berita-hero mb-4" src="{{ $urlThumbnail($berita->thumbnail) }}" alt="{{ $berita->judul }}"
                            onerror="this.onerror=null; this.src='{{ $fotoKosong }}';">

                        <div class="berita-isi">{!! $berita->isi_berita !!}</div>
                    </article>
                </div>

                <aside class="col-lg-4">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h3 class="mb-0 text-green">Berita Terbaru</h3>
                    </div>
                    @foreach ($dataList as $row)
                        <a href="{{ route('berita.detail', ['id_berita' => $row->id]) }}" class="terbaru-item">
                            <img loading="lazy" src="{{ $urlThumbnail($row->thumbnail) }}" alt="{{ $row->judul }}"
                                onerror="this.onerror=null; this.src='{{ $fotoKosong }}';">
                            <div>
                                <div class="terbaru-judul">{{ $row->judul }}</div>
                                <div class="terbaru-ringkas">{{ Str::limit(strip_tags($row->isi_berita), 50) }}</div>
                            </div>
                        </a>
                    @endforeach
                </aside>
            </div>
        </div>
    </div>
@endsection
