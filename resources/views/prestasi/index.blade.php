@extends('layout.main_layout')
@section('title')
<title>Prestasi | PPATQ-RF</title>
@endsection
@section('description', "Prestasi santri PPATQ Raudlatul Falah di berbagai bidang dan tingkat lomba.")
@section('header')
<style>
    .prestasi-card {
        background: transparent;
        transition: transform 0.3s ease;
    }
    .prestasi-card:hover {
        transform: translateY(-4px);
    }
    .prestasi-img {
        width: 100%;
        aspect-ratio: 4 / 3;
        object-fit: cover;
        border-radius: 24px;
        background: linear-gradient(135deg, #f8fcf9 0%, #e8f5ed 100%);
    }
    .prestasi-title {
        color: #1a5632;
        font-weight: 800;
    }
    .prestasi-desc {
        color: #5c8c6d;
    }
    .badge-seamless {
        background: #e6f4ea;
        color: #198754;
        padding: 6px 14px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 0.85rem;
    }
    .badge-seamless.alt {
        background: #f4f8f5;
        color: #5c8c6d;
    }
    .prestasi-santri {
        padding-top: 12px;
        border-top: 1px dashed #d1e2d7;
        color: #2c3e50;
        font-weight: 600;
    }
    .prestasi-santri i {
        color: #20c997;
    }
</style>
@endsection
@section('content')
    <!-- Prestasi Start -->
    <div class="container-fluid py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h1 class="h2 fw-bold text-green text-uppercase text-green">Prestasi PPATQ</h1>
            <small class="mb-0">Kumpulan Prestasi PPATQ RAUDLATUL FALAH</small>
        </div>

        <div class="container">
            <div class="row g-4">
                @forelse ($prestasi as $row)
                    @php
                        $fallback = 'https://ui-avatars.com/api/?size=400&name=' . urlencode($row->namaSantri ?? $row->prestasi_text);
                        $foto = !empty($row->foto)
                            ? 'https://manajemen.ppatq-rf.id/assets/img/upload/foto_fasilitas/' . $row->foto
                            : $fallback;
                    @endphp
                    <div class="col-12 col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="prestasi-card h-100 d-flex flex-column">
                            <img class="prestasi-img" loading="lazy" src="{{ $foto }}"
                                alt="Foto prestasi {{ $row->namaSantri }}"
                                onerror="this.onerror=null; this.src='{{ $fallback }}';">
                            <div class="d-flex flex-column flex-grow-1 px-2 pt-3">
                                <h5 class="prestasi-title mb-3">{{ $row->prestasi_text }}</h5>
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <span class="badge-seamless">{{ $row->jenis_text }}</span>
                                    <span class="badge-seamless alt">{{ $row->tingkat_text }}</span>
                                </div>
                                <p class="prestasi-desc mb-3 flex-grow-1">{{ $row->deskripsi }}</p>
                                @if (!blank($row->namaSantri))
                                    <div class="prestasi-santri">
                                        <i class="bi bi-person-fill"></i> {{ $row->namaSantri }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        <small class="text-muted border-bottom">Prestasi Kosong</small>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

@endsection
