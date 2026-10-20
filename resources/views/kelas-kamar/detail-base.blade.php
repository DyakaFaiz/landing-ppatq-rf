{{-- Kerangka halaman detail kelas/kamar. Data: $judul, $peran, $jumlahIsi, $pembimbingNama, $pembimbingFoto --}}
@extends('layout.main_layout')
@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .kembali-seamless {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #198754;
            font-weight: 600;
            text-decoration: none;
        }
        .kembali-seamless:hover {
            color: #1a5632;
        }
        .pembimbing-seamless {
            text-align: center;
        }
        .pembimbing-seamless img {
            width: 160px;
            height: 200px;
            max-width: 100%;
            object-fit: cover;
            border-radius: 24px;
            background: linear-gradient(135deg, #f8fcf9 0%, #e8f5ed 100%);
        }
        .pembimbing-seamless .peran {
            display: block;
            margin-top: 16px;
            color: #5c8c6d;
            font-size: 0.85rem;
        }
        .badge-seamless {
            display: inline-block;
            background: #e6f4ea;
            color: #198754;
            padding: 6px 14px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 0.85rem;
        }
        .profil-card {
            background: transparent;
            transition: transform 0.3s ease;
        }
        .profil-card:hover {
            transform: translateY(-4px);
        }
        .profil-card .foto-profil {
            border-radius: 24px;
            background: linear-gradient(135deg, #f8fcf9 0%, #e8f5ed 100%);
        }
        .profil-nama {
            color: #1a5632;
            font-weight: 800;
        }
        .profil-info p {
            color: #5c8c6d;
        }
    </style>
@endsection

@section('content')
    @php $fotoKosong = asset('img/avatar-siluet.svg'); @endphp
    <div class="container py-4 wow fadeInUp" data-wow-delay="0.1s">
        <a href="{{ url()->previous() }}" class="kembali-seamless mb-4">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h2 class="fw-bold text-green text-uppercase">{{ $judul }}</h2>
            <span class="badge-seamless mt-2">{{ $jumlahIsi }} santri</span>
        </div>

        <div class="pembimbing-seamless mb-5">
            <img src="{{ $pembimbingFoto ? 'https://manajemen.ppatq-rf.id/assets/img/upload/photo/' . $pembimbingFoto : $fotoKosong }}"
                alt="foto {{ $pembimbingNama }}"
                onerror="this.onerror=null; this.src='{{ $fotoKosong }}';">
            <h5 class="profil-nama fs-6 mt-3 mb-0 text-uppercase">{{ $pembimbingNama ?? '-' }}</h5>
            <span class="peran">{{ $peran }}</span>
        </div>

        <div class="row g-4 justify-content-center">
            @yield('santri')
        </div>
    </div>

@endsection
