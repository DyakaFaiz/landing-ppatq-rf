@extends('layout.main_layout')
@section('title')
<title>{{ $data->judul }} | PPATQ-RF</title>
@endsection
@php
    $ringkasDakwah = Str::limit(trim(preg_replace('/\s+/u', ' ', html_entity_decode(strip_tags($data->isi_dakwah), ENT_QUOTES))), 155);
@endphp
@section('description', $ringkasDakwah)
@section('og_type', 'article')
@section('jsonld')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => Str::limit($data->judul, 110, ''),
    'description' => $ringkasDakwah,
    'datePublished' => \Carbon\Carbon::parse($data->created_at)->toIso8601String(),
    'author' => ['@type' => 'Organization', 'name' => 'PPATQ Raudlatul Falah'],
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'PPATQ Raudlatul Falah',
        'logo' => ['@type' => 'ImageObject', 'url' => asset('img/cropped-header-objectpatq.png')],
    ],
    'mainEntityOfPage' => url()->current(),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}
</script>
@endsection


@section('header')
@endsection
@section('content')
    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-4">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <h1 class="mb-4">{{$data->judul}}</h1>
                        <div class="d-flex justify-content-end mt-5">
                            <div class="col col-sm-7">
                                <a target="_blank" class="fs-4" href="https://www.facebook.com/sharer/sharer.php?u={{ route('dakwah.detail', ['idDakwah' => $data->idEnkripsi]) }}"><i class="bi bi-facebook"></i></a>
                            </div>
                            <div class="col col-sm-5 d-sm-flex">
                                <p>
                                    <small class="me-2"><i class="far fa-user text-green me-2"></i>{{ isset($data->namaUser) && $data->namaUser != '' ? $data->namaUser : 'Tidak ditemukan' }}</small>
                                </p>
                                <p>
                                    <small class="me-2"><i class="far fa-calendar-alt text-green me-2"></i>{{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</small>
                                </p>
                            </div>
                        </div>
                        <p>{!! $data->isi_dakwah !!}</p>
                    </div>
                    <!-- Blog Detail End -->
                   
                </div>
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Recent Post Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Dakwah Terbaru</h3>
                        </div>
                        @forelse ($dataList as $row)
                            <div class="d-flex flex-column px-3">
                                <a href="{{ route('dakwah.detail', ['idDakwah' => $row->idEnkripsi]) }}" class="fw-semi-bold d-flex align-items-center bg-light mb-0 text-decoration-none text-dark">
                                    {{ $row->judul }}
                                </a>
                                <p>{{ Str::limit(strip_tags($row->isi_dakwah), 50) }}</p>
                            </div>
                        @empty
                            <small class="px-3 py-2 text-muted">
                                Tidak ada data.
                            </small>
                        @endforelse

                    </div>
                    <!-- Recent Post End -->
    
    
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->

    

@endsection


