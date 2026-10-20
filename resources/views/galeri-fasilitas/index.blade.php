@extends('layout.main_layout')
@section('title')
<title>Galeri | PPATQ-RF</title>
@endsection
@section('header')
<style>
    .foto-seamless {
        display: block;
        overflow: hidden;
        border-radius: 20px;
        background: linear-gradient(135deg, #f8fcf9 0%, #e8f5ed 100%);
    }
    .foto-seamless img {
        display: block;
        width: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .foto-seamless:hover img {
        transform: scale(1.06);
    }
    .galeri-masonry {
        column-count: 2;
        column-gap: 1rem;
    }
    .galeri-masonry .foto-galeri {
        break-inside: avoid;
        margin-bottom: 1rem;
    }
    .foto-fasilitas img {
        aspect-ratio: 4 / 3;
    }
    .fasilitas-seamless .nama {
        margin-top: 12px;
        margin-bottom: 4px;
        color: #1a5632;
        font-weight: 800;
        font-size: 0.95rem;
    }
    .fasilitas-seamless .deskripsi {
        color: #5c8c6d;
        font-size: 0.85rem;
        line-height: 1.4;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
@endsection

@section('content')
    @php
        $urlGaleri = 'https://manajemen.ppatq-rf.id/assets/img/upload/foto_galeri/';
        $urlFasilitas = 'https://manajemen.ppatq-rf.id/assets/img/upload/foto_fasilitas/';
        $fotoKosong = asset('img/auth-cover-login-mask-light.png');
        // Rasio foto galeri diacak per foto (berdasarkan nama file, supaya tidak berubah tiap refresh)
        $rasioGaleri = ['1 / 1', '3 / 4', '4 / 3', '4 / 5', '16 / 10', '2 / 3'];
    @endphp
    <div class="container py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row g-5">
            <div class="col-12 col-md-6">
                <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                    <h2 class="fw-bold text-green text-uppercase">Galeri PPATQ</h2>
                    <small class="mb-0">Kumpulan foto di PPATQ RAUDLATUL FALAH</small>
                </div>
                @if (!empty($galeri) && count($galeri))
                    <div class="galeri-masonry">
                        @foreach ($galeri as $row)
                            <a href="{{ $urlGaleri . $row->foto }}" class="foto-seamless foto-galeri popup-btn d-block" title="{{ $row->nama }}">
                                <img loading="lazy" src="{{ $urlGaleri . $row->foto }}" alt="{{ $row->nama }}"
                                    style="aspect-ratio: {{ $rasioGaleri[crc32($row->foto) % count($rasioGaleri)] }};"
                                    onerror="this.onerror=null; this.src='{{ $fotoKosong }}';">
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="text-center">
                        <small class="text-muted border-bottom">Galeri Kosong</small>
                    </div>
                @endif
            </div>
            <div class="col-12 col-md-6">
                <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                    <h2 class="fw-bold text-green text-uppercase">Fasilitas PPATQ</h2>
                    <small class="mb-0">Kumpulan fasilitas di PPATQ RAUDLATUL FALAH</small>
                </div>
                <div class="row g-3">
                    @forelse ($fasilitas ?? [] as $row)
                        <div class="col-6">
                            <div class="fasilitas-seamless text-center">
                                <a href="{{ $urlFasilitas . $row->foto }}" class="foto-seamless foto-fasilitas popup-btn" title="{{ $row->nama }}">
                                    <img loading="lazy" src="{{ $urlFasilitas . $row->foto }}" alt="{{ $row->nama }}"
                                        onerror="this.onerror=null; this.src='{{ $fotoKosong }}';">
                                </a>
                                <h6 class="nama">{{ $row->nama }}</h6>
                                @if ($row->deskripsi)
                                    <p class="deskripsi mb-0">{{ $row->deskripsi }}</p>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-center">
                            <small class="text-muted border-bottom">Fasilitas Kosong</small>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script>
    $(document).ready(function() {
        $('.popup-btn').magnificPopup({
            type: 'image',
            gallery: { enabled: true }
        });
    });
</script>
@endsection
