@extends('layout.main_layout')
@section('title')
<title>Berita | PPATQ-RF</title>
@endsection
@section('header')
@endsection
@section('content')
    <!-- Blog Start -->
    <div class="container-fluid py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container w-100">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h2 class="fw-bold text-green text-uppercase text-green">Berita PPATQ</h2>
                <small class="mb-0">Kumpulan Berita PPATQ RAUDLATUL FALAH</small>
            </div>
            <div class="row">
                @if ($data && !$data->isEmpty())
                @foreach ($data as $berita)
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                        <div class="blog-item bg-light rounded overflow-hidden">
                            <div class="blog-img position-relative overflow-hidden">
                                <div class="overflow-hidden">
                                    @php
                                        $url = str_contains($berita->thumbnail, 'http')
                                            ? $berita->thumbnail
                                            : 'https://manajemen.ppatq-rf.id/assets/img/upload/berita/thumbnail/' . $berita->thumbnail;
                                    @endphp
                                    <a class="text-decoration-none text-dark" href="{{ route('berita.detail', ['id_berita' => $berita->id]) }}">
                                        <img class="img-fluid rounded" src="{{ $url }}" alt="Gambar Berita"
                                            onerror="this.onerror=null; this.src='{{ asset('img/auth-cover-login-mask-light.png') }}';">
                                    </a>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="d-flex mb-3">
                                    <small class="me-2 fst-italic"><i class="far fa-calendar-alt text-green me-2"></i>{{ \Carbon\Carbon::parse($berita->created_at)->diffForHumans() }}</small>
                                </div>
                                <h4 class="mb-3"><a class="text-decoration-none text-dark" href="{{ route('berita.detail', ['id_berita' => $berita->id]) }}">{{$berita->judul}}</a></h4>
                                <p class="mb-0">{{ Str::limit(strip_tags($berita->isi_berita),150) }}</p>
                                <a class="text-green" href="{{ route('berita.detail', ['id_berita' => $berita->id]) }}">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <div class="text-center">
                    <small class="text-muted border-bottom">Berita Kosong</small>
                </div>
                @endif
            </div>
        </div>

        <div class="d-flex justify-content-center pagination-container">
            <!-- Pagination -->
            {{ $data->links() }}
        </div>
    </div>

@endsection


