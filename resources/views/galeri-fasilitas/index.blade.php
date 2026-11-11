@extends('layout.main_layout')
@section('title')
<title>Galeri & Fasilitas | PPATQ-RF</title>
@endsection
@section('description', "Galeri foto kegiatan dan fasilitas PPATQ Raudlatul Falah: asrama, madrasah, masjid, makan 3x sehari, laundry, serta kebutuhan santri baru.")
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
    /* Foto galeri tampil dengan rasio aslinya (tidak dipotong); tinggi sementara saat belum termuat */
    .galeri-masonry .foto-galeri img {
        height: auto;
        min-height: 120px;
    }
    .item-tersembunyi {
        display: none !important;
    }
    /* Item yang baru ditampilkan muncul perlahan dari bawah, berurutan */
    .item-muncul {
        animation: item-muncul 0.5s ease both;
    }
    @keyframes item-muncul {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    @media (prefers-reduced-motion: reduce) {
        .item-muncul { animation: none; }
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
        $galeriAwal = 8;    // jumlah foto galeri yang tampil sebelum "Lihat Lebih Banyak"
        $fasilitasAwal = 6; // jumlah fasilitas yang tampil sebelum "Lihat Lebih Banyak"
    @endphp
    <div class="container py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row g-5">
            <div class="col-12 col-md-6">
                <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                    <h1 class="h2 fw-bold text-green text-uppercase">Galeri PPATQ</h1>
                    <small class="mb-0">Kumpulan foto di PPATQ RAUDLATUL FALAH</small>
                </div>
                @if (!empty($galeri) && count($galeri))
                    <div class="galeri-masonry" id="galeri-grid">
                        @foreach ($galeri as $row)
                            <a href="{{ $urlGaleri . $row->foto }}" class="foto-seamless foto-galeri popup-btn {{ $loop->index >= $galeriAwal ? 'item-tersembunyi' : '' }}" title="{{ $row->nama }}">
                                <img loading="lazy" src="{{ $urlGaleri . $row->foto }}" alt="{{ $row->nama }}"
                                    onerror="this.onerror=null; this.src='{{ $fotoKosong }}';">
                            </a>
                        @endforeach
                    </div>
                    @if (count($galeri) > $galeriAwal)
                        <div class="text-center mt-2">
                            <button type="button" class="btn-seamless btn-lebih" data-target="#galeri-grid" data-per-klik="8">
                                Lihat Lebih Banyak (<span class="lebih-sisa">{{ count($galeri) - $galeriAwal }}</span>) <i class="bi bi-chevron-down ms-1"></i>
                            </button>
                        </div>
                    @endif
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
                <div class="row g-3" id="fasilitas-grid">
                    @forelse ($fasilitas ?? [] as $row)
                        <div class="col-6 fasilitas-col {{ $loop->index >= $fasilitasAwal ? 'item-tersembunyi' : '' }}">
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
                @if (count($fasilitas ?? []) > $fasilitasAwal)
                    <div class="text-center mt-3">
                        <button type="button" class="btn-seamless btn-lebih" data-target="#fasilitas-grid" data-per-klik="6">
                            Lihat Lebih Banyak (<span class="lebih-sisa">{{ count($fasilitas) - $fasilitasAwal }}</span>) <i class="bi bi-chevron-down ms-1"></i>
                        </button>
                    </div>
                @endif
            </div>
        </div>
        @include('fasilitas.content')
    </div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script>
    $(document).ready(function() {
        // Item yang masih tersembunyi tidak ikut dalam geser popup
        $('#galeri-grid').magnificPopup({
            delegate: 'a.foto-galeri:not(.item-tersembunyi)',
            type: 'image',
            gallery: { enabled: true }
        });
        $('#fasilitas-grid').magnificPopup({
            delegate: '.fasilitas-col:not(.item-tersembunyi) .foto-fasilitas',
            type: 'image',
            gallery: { enabled: true }
        });

        // Tampilkan item bertahap (galeri dan fasilitas) agar halaman tidak terlalu panjang
        $('.btn-lebih').on('click', function() {
            var $tombol = $(this);
            var $grid = $($tombol.data('target'));
            var perKlik = parseInt($tombol.data('per-klik'), 10);

            $grid.find('.item-tersembunyi').slice(0, perKlik).each(function(i) {
                $(this)
                    .css('animation-delay', (i * 70) + 'ms')
                    .removeClass('item-tersembunyi')
                    .addClass('item-muncul')
                    .one('animationend', function() {
                        $(this).removeClass('item-muncul').css('animation-delay', '');
                    });
            });

            var sisa = $grid.find('.item-tersembunyi').length;
            $tombol.find('.lebih-sisa').text(sisa);
            if (sisa === 0) {
                $tombol.hide();
            }
        });
    });
</script>
@endsection
