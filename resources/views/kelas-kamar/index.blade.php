@extends('layout.main_layout')
@section('title')
    <title>Kelas & kamar | PPATQ-RF</title>
@endsection
@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .tile-seamless {
            display: flex;
            align-items: center;
            gap: 10px;
            height: 100%;
            padding: 8px 10px;
            border-radius: 16px;
            background: transparent;
            color: #1a5632;
            font-weight: 700;
            text-decoration: none;
            transition: transform 0.3s ease;
        }
        .tile-seamless:hover {
            color: #1a5632;
            transform: translateY(-2px);
        }
        .tile-seamless .tile-icon {
            flex: 0 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 12px;
            background: linear-gradient(135deg, #f8fcf9 0%, #e8f5ed 100%);
            color: #198754;
            transition: background 0.3s ease, color 0.3s ease;
        }
        .tile-seamless:hover .tile-icon {
            background: linear-gradient(135deg, #198754, #20c997);
            color: #fff;
        }
        .tile-seamless .tile-label {
            min-width: 0;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>
@endsection

@section('content')
@php
    // Kelompokkan per tingkat (angka pada nama kelas): 1A & 1B satu baris, dst.
    $kelasPerTingkat = collect($dataKelas ?? [])
        ->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)
        ->groupBy(fn ($kelas) => preg_match('/\d+/', $kelas->name, $m) ? (int) $m[0] : $kelas->name);
@endphp
<div class="container py-3 wow fadeInUp" data-wow-delay="0.1s">
    <div class="row g-4">
        <div class="col-12 col-md-5 col-lg-4">
            <h4 class="fw-bold text-green text-uppercase text-center mb-3">Kelas Santri</h4>
            @forelse ($kelasPerTingkat as $daftarKelas)
                <div class="row g-2 mb-1">
                    @foreach ($daftarKelas as $kelas)
                        <div class="col-6">
                            <a href="{{ route('show-kelas', $kelas->id_kelas) }}" class="tile-seamless" title="{{ $kelas->name }}">
                                <span class="tile-icon"><i class="bi bi-house"></i></span>
                                <span class="tile-label">{{ $kelas->name }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            @empty
                <div class="text-center">
                    <small class="text-muted border-bottom">Kelas Kosong</small>
                </div>
            @endforelse
        </div>
        <div class="col-12 col-md-7 col-lg-8" id="kamar-container">
            <h4 class="fw-bold text-green text-uppercase text-center mb-3">Kamar Santri</h4>
            <div class="row g-2">
                @forelse ($dataKamar ?? [] as $kamar)
                    <div class="col-6 col-lg-4">
                        <a href="{{ route('show-kamar', $kamar->id) }}" class="tile-seamless" title="{{ $kamar->guru_murroby }}">
                            <span class="tile-icon"><i class="bi bi-people"></i></span>
                            <span class="tile-label">{{ $kamar->guru_murroby }}</span>
                        </a>
                    </div>
                @empty
                    <div class="text-center">
                        <small class="text-muted border-bottom">Kamar Kosong</small>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
