@extends('layout.main_layout')
@section('title')
<title>Berita | PPATQ-RF</title>
@endsection
@section('description', "Berita dan kabar terbaru kegiatan PPATQ Raudlatul Falah, pondok pesantren anak-anak tahfidzul Qur'an di Pati.")
@section('header')
<style>
    /* Grid otomatis: jumlah kolom menyesuaikan lebar layar, jarak antar baris dan kolom selalu sama */
    .berita-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
    }
    /* Kartu mengisi tinggi baris, jadi kartu sebaris selalu sama tinggi meski isinya berbeda */
    .berita-grid .blog-item {
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    /* Gambar tampil dengan ukuran/rasio aslinya, tidak dipotong */
    .berita-grid .blog-img img {
        display: block;
        width: 100%;
        height: auto;
    }
    .berita-grid .berita-judul-kartu,
    .berita-grid .berita-ringkas {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .berita-grid .berita-judul-kartu {
        -webkit-line-clamp: 3;
    }
    .berita-grid .berita-ringkas {
        -webkit-line-clamp: 4;
    }
    /* Tautan "Baca Selengkapnya" mengikuti isi (tidak ditarik ke dasar kartu), sisa tinggi ada di bawahnya */
    .berita-grid .berita-baca {
        display: inline-block;
        margin-top: 1rem;
    }
</style>
@endsection
@section('content')
    <!-- Blog Start -->
    <div class="container-fluid py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container w-100">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h1 class="h2 fw-bold text-green text-uppercase text-green">Berita PPATQ</h1>
                <small class="mb-0">Kumpulan Berita PPATQ RAUDLATUL FALAH</small>
            </div>
            @if ($data && !$data->isEmpty())
            <div class="berita-grid">
                @foreach ($data as $berita)
                    <div class="wow slideInUp" data-wow-delay="0.3s">
                        <div class="blog-item bg-light rounded overflow-hidden">
                            <div class="blog-img position-relative overflow-hidden">
                                <div class="overflow-hidden">
                                    @php
                                        $url = str_contains($berita->thumbnail, 'http')
                                            ? $berita->thumbnail
                                            : 'https://manajemen.ppatq-rf.id/assets/img/upload/berita/thumbnail/' . $berita->thumbnail;
                                    @endphp
                                    <a class="text-decoration-none text-dark" href="{{ route('berita.detail', ['slug' => $berita->slug_publik]) }}">
                                        <img class="img-fluid rounded" src="{{ $url }}" alt="Gambar Berita"
                                            onerror="this.onerror=null; this.src='{{ asset('img/auth-cover-login-mask-light.png') }}';">
                                    </a>
                                </div>
                            </div>
                            <div class="p-4 berita-isi-kartu">
                                <div class="d-flex mb-3">
                                    <small class="me-2 fst-italic"><i class="far fa-calendar-alt text-green me-2"></i>{{ \Carbon\Carbon::parse($berita->created_at)->diffForHumans() }}</small>
                                </div>
                                <h4 class="mb-3 berita-judul-kartu"><a class="text-decoration-none text-dark" href="{{ route('berita.detail', ['slug' => $berita->slug_publik]) }}">{{$berita->judul}}</a></h4>
                                <p class="mb-0 berita-ringkas">{{ Str::limit(strip_tags($berita->isi_berita),150) }}</p>
                                <a class="text-green berita-baca" href="{{ route('berita.detail', ['slug' => $berita->slug_publik]) }}">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
                <div class="text-center">
                    <small class="text-muted border-bottom">Berita Kosong</small>
                </div>
            @endif
        </div>

        <div class="d-flex justify-content-center pagination-container mt-4">
            <!-- Pagination -->
            {{ $data->links() }}
        </div>
    </div>

@endsection


