@extends('layout.main_layout')
@section('title')
<title>Beranda | PPATQ-RF</title>
@endsection

@section('header')
<style>
    .iframe-container {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
        height: auto;
        overflow: hidden;
    }

    .iframe-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .video-hero {
        display: block;
        aspect-ratio: 16 / 9;
        max-height: 600px;
        height: auto;
        margin-top: 0;
    }

    .carousel-small {
        max-width: 100%; /* Batasi lebar maksimal carousel */
        margin: 0 auto;   /* Pusatkan carousel */
    }

    .carousel-small .item img {
        width: 100%;     /* Gambar menyesuaikan lebar item */
        height: 200px;   /* Atur tinggi gambar */
        object-fit: cover; /* Gambar menyesuaikan tanpa terdistorsi */
        border-radius: 8px; /* Tambahkan border radius */
    }

    .iframe-container {
        max-width: 400px; /* Ukuran maksimal masing-masing iframe */
        width: 100%; /* Membuat iframe responsif */
        aspect-ratio: 16 / 9; /* Rasio aspek untuk video */
        position: relative;
    }

    .iframe-container iframe {
        width: 100%; /* Sesuaikan lebar iframe dengan container */
        height: 100%; /* Sesuaikan tinggi iframe dengan container */
        border-radius: 8px; /* Tambahkan border radius */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambahkan efek bayangan */
    
    }

    .sosmed-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        border: 2px solid #d1e2d7;
        border-radius: 16px;
        background: transparent;
        color: #1a5632;
        font-weight: 700;
        text-decoration: none;
        transition: transform 0.3s ease, border-color 0.3s ease;
    }
    .sosmed-link i {
        font-size: 1.4rem;
    }
    .sosmed-link:hover {
        color: #1a5632;
        border-color: #20c997;
        transform: translateY(-3px);
    }
    .sosmed-link.facebook i { color: #1877f2; }
    .sosmed-link.youtube i { color: #ff0000; }
    .sosmed-link.instagram-link i { color: #e4405f; }
    .sosmed-link.tiktok-link i { color: #000; }

    .sosmed-panel {
        border-top: 3px solid #20c997;
        padding: 16px 4px 0;
        margin-bottom: 24px;
    }
    .sosmed-foto {
        border-radius: 16px;
    }
    .sosmed-nama {
        color: #1a5632;
        font-weight: 800;
    }
    .sosmed-stat {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 8px 0;
        border-bottom: 1px dashed #d1e2d7;
        color: #5c8c6d;
    }
    .sosmed-stat:last-child {
        border-bottom: 0;
    }
    .sosmed-stat strong {
        color: #1a5632;
    }

    .bg-yellow-soft {
        background-color: #fff3cd; /* Bootstrap alert-warning background */
        color: #856404; /* Sesuai teks pada alert warning */
    }

    .blink {
        animation: blink 0.6s infinite;
    }

    @keyframes blink {
        0%   { opacity: 1; }
        50%  { opacity: 0; }
        100% { opacity: 1; }
    }

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
@endsection

@section('content')
<div class="div">
    <iframe loading="lazy" src="https://www.youtube.com/embed/i362ZGnlCQs?si=A1ogGaLnHYI1puw8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen="true" class="video-hero w-100"></iframe>
</div>
@php
    use Carbon\Carbon;
    Carbon::setLocale('id');
@endphp
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container w-100">
        <div class="row text-center">
            <h6 class="py-2 bg-yellow-soft rounded">
                Dapatkan Aplikasi Mobile Wali Santri 
                <a class="fst-italic fs-5 fw-semibold text-decoration-underline text-dark blink" target="_blank" href="{{ route('app-wali-santri') }}">
                    Disini!!!
                </a>
            </h6>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-sm-9">
                <div class="row">
                    <div class="col-12 py-4 d-flex align-items-center gap-4">
                        <div class="col-sm-2 col">
                            <div class="section-title position-relative" style="max-width: 600px;">
                                <h2 class="fw-bold text-green text-uppercase text-green py-2">Berita</h2>
                            </div>
                        </div>
                        <div class="col">
                            <a href="{{ route('berita') }}" class="fst-italic text-gray text-all-news">|  Semua Berita</a>
                        </div>
                    </div>
                    @if ($beritas && !$beritas->isEmpty())                        
                    @foreach ($beritas as $berita)
                        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                            <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <div class="overflow-hidden">
                                    @php
                                    if (strpos($berita->thumbnail, 'http') !== false) {
                                        $url = $berita->thumbnail;
                                    } else {
                                        $url = "https://manajemen.ppatq-rf.id/assets/img/upload/berita/thumbnail/" . $berita->thumbnail;
                                    }

                                    //if ($url && filter_var($url, FILTER_VALIDATE_URL)) {
                                    
                                    if (!empty($url)) {
                                        $headers = @get_headers($url);
                                        //$exists = $headers && strpos($headers[0], '200') !== false;
                                        $exists = true;
                                    } else {
                                        $exists = false;
                                    }
                                    @endphp
                                    @if ($exists !== false)
                                    <a class="text-decoration-none text-dark" href="{{ route('berita.detail', ['id_berita' => $berita->id]) }}">
                                        <img loading="lazy" class="img-fluid rounded" src="{{$url}}"  alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    </a>
                                    @else
                                    <a class="text-decoration-none text-dark" href="{{ route('berita.detail', ['id_berita' => $berita->id]) }}">
                                        <img loading="lazy" class="img-fluid rounded" src="{{asset('img/auth-cover-login-mask-light.png')}}"   alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    </a>
                                    @endif
                                    </div>
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-2 fst-italic">
                                            <i class="far fa-calendar-alt text-green me-2"></i>
                                            {{ \Carbon\Carbon::parse($berita->created_at)->diffForHumans(now(), false, false, 2) }}
                                        </small>
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
                            <small class="text-muted  border-bottom">Berita Kosong</small>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col mt-5 mt-sm-0">
                <div class="col py-4 d-flex align-items-center gap-4">
                    <div class="col">
                        <div class="section-title position-relative" style="max-width: 600px;">
                            <h4 class="fw-bold text-green text-uppercase text-green py-2">Agenda</h4>
                        </div>
                    </div>
                    <div class="col">
                        <a href="{{ route("agenda") }}" class="fst-italic text-gray text-all-news">|  Semua Agenda</a>
                    </div>
                </div>
                
                <div class="col mt-2 px-2">
                    @if($agendas && !$agendas->isEmpty())
                    @foreach ($agendas as $agenda)
                    <div class="row mb-4 border-bottom py-2">
                        <div class="col-3 d-flex flex-column align-items-center text-white fw-bold">
                            <span class="text-green px-2">{{ Carbon::parse($agenda->tanggal_mulai)->translatedFormat('j')}}</span>
                            <span class="text-green px-2">{{ Carbon::parse($agenda->tanggal_mulai)->translatedFormat('F')}}</span>
                        </div>
                        <div class="col">
                            <h6 class="mb-0">{{ $agenda->judul }}</h6>
                            <small>{{ Str::limit(strip_tags($agenda->isi),45) }}</small>
                            <p class="fst-italic bg-green text-white px-1 rounded text-center">{{ Carbon::parse($agenda->tanggal_mulai)->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="text-center">
                        <small class="text-muted  border-bottom">Agenda Kosong</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row wow slideInUp d-flex justify-content-center" data-wow-delay="0.3s">
            <div class="row mb-3">
                <div class="section-title position-relative" style="max-width: 600px;">
                    <h4 class="fw-bold text-green text-uppercase text-green py-2">Sosial Media</h4>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-sm-9">
                    <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
                        <a href="https://www.facebook.com/pprtq.r.falah" target="_blank" rel="noopener" class="sosmed-link facebook">
                            <i class="bi bi-facebook"></i> Facebook
                        </a>
                        <a href="https://www.youtube.com/@PPATQTV" target="_blank" rel="noopener" class="sosmed-link youtube">
                            <i class="bi bi-youtube"></i> YouTube
                        </a>
                        <a href="https://www.instagram.com/ppatq_raudlatulfalah/" target="_blank" rel="noopener" class="sosmed-link instagram-link">
                            <i class="bi bi-instagram"></i> Instagram
                        </a>
                        <a href="https://www.tiktok.com/@ppatq.raudlatulfalah?lang=en" target="_blank" rel="noopener" class="sosmed-link tiktok-link">
                            <i class="bi bi-tiktok"></i> TikTok
                        </a>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <div id="youtube-iframe" class="iframe-container"></div>
                        <div id="facebook-iframe" class="iframe-container"></div>
                    </div>
                    {{-- <div id="tiktok-iframe"></div> --}}
                </div>
                <div class="col mt-5 mt-sm-0">
                    <div class="sosmed-panel">
                        <div id="santri-random" class="row mb-4 pb-3 d-flex justify-content-center"></div>
                        <div id="pegawai-random" class="row d-flex justify-content-center"></div>
                    </div>
                    <div class="sosmed-panel">
                        <div class="sosmed-stat"><span><i class="bi bi-person-workspace"></i> Guru</span> <strong>{{ $jumlahGuru }}</strong></div>
                        <div class="sosmed-stat"><span><i class="bi bi-person-fill"></i> Murroby</span> <strong>{{ $jumlahMurroby }}</strong></div>
                        <div class="sosmed-stat"><span><i class="bi bi-person-standing"></i> Santri Putra</span> <strong>{{ $jumlahSiswaLaki }}</strong></div>
                        <div class="sosmed-stat"><span><i class="bi bi-person-standing-dress"></i> Santri Putri</span> <strong>{{ $jumlahSiswaPerempuan }}</strong></div>
                    </div>
                    <div class="sosmed-panel">
                        <!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
                        <!-- Histats.com  START  (aync)-->
                        <script type="text/javascript">var _Hasync= _Hasync|| [];
                        _Hasync.push(['Histats.start', '1,4895326,4,401,118,80,00011011']);
                        _Hasync.push(['Histats.fasi', '1']);
                        _Hasync.push(['Histats.track_hits', '']);
                        (function() {
                        var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
                        hs.src = ('//s10.histats.com/js15_as.js');
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
                        })();</script>
                        <noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4895326&101" alt="" border="0"></a></noscript>
                        <!-- Histats.com  END  -->
                    </div>
                </div>

                <div class="row mt-5">
                    <!-- Fasilitas Section -->
                    <div class="row">
                        <div class="section-title position-relative" style="max-width: 600px;">
                            <h4 class="fw-bold text-green text-uppercase text-green py-2">Fasilitas</h4>
                        </div>
                        <p class="py-2">Berbagai fasilitas yang dirancang untuk menunjang aktivitas dan kenyamanan.</p>
                    </div>
                    <div class="owl-carousel owl-theme rounded p-3 carousel-small">
                        @forelse ($fasilitas as $row)
                            <div class="item"><img loading="lazy" src="https://manajemen.ppatq-rf.id/assets/img/upload/foto_fasilitas/{{ $row->foto }}" alt="{{ $row->nama }}"></div>
                        @empty
                            <p class="fst-italic text-muted">Foto fasilitas tidak ada</p>
                        @endforelse
                    </div>
                </div>
                
                <div class="row mt-5">
                    <!-- Galeri Section -->
                    <div class="row">
                        <div class="section-title position-relative" style="max-width: 600px;">
                            <h4 class="fw-bold text-green text-uppercase text-green py-2">Galeri</h4>
                        </div>
                        <p class="py-2">Rangkaian dokumentasi dari berbagai kegiatan santri yang mencerminkan suasana belajar, beribadah, dan berkegiatan di pondok pesantren.</p>
                    </div>
                    <div class="owl-carousel owl-theme rounded p-3 carousel-small">
                        @forelse ($galeri as $row)
                            <div class="item"><img src="https://manajemen.ppatq-rf.id/assets/img/upload/foto_galeri/{{ $row->foto }}" loading="lazy" alt="{{ $row->nama }}"></div>
                        @empty
                            <p class="fst-italic text-muted">Foto galeri tidak ada</p>
                        @endforelse
                    </div>
                </div>

                <div class="row mt-5">
                     <div class="section-title position-relative" style="max-width: 600px;">
                        <h4 class="fw-bold text-green text-uppercase text-green py-2">Dakwah</h4>
                    </div>
                    <div class="row">
                        @foreach ($dakwah as $row)
                            <div class="col-12 col-sm-3 mt-2">
                                {{-- <h4 class="mb-3"><a class="text-decoration-none text-dark" href="{{ route('berita.detail', ['id_berita' => $berita->id]) }}">{{$berita->judul}}</a></h4> --}}
                                {{-- <h5 class="mb-1"><a class="text-decoration-none text-dark" href="#">{{$row->judul}}</a></h5> --}}
                                <a href="{{ route('dakwah.detail', ['idDakwah' => $row->idEnkripsi]) }}" class="text-decoration-none"><p class="mb-0 py-2 text-body"><span class="fw-bolder fs-6 text-dark">{{$row->judul}}: </span>{{ Str::limit(strip_tags($row->isi_dakwah),150) }}</p></a>
                            </div>
                        @endforeach
                    </div>

                    <div class="row mt-5">
                        <div class="col-12 col-sm-9 px-4">
                            <div class="d-flex flex-column flex-md-row p-4 gap-5">
                                <img loading="lazy" src="https://ppatq-rf.sch.id/wp-content/uploads/2013/04/abah-sohib.png"
                                class="rounded-circle img-fluid mb-lg-0" alt="foto abah" width="100" height="200">
                                <figure>
                                    <blockquote class="blockquote">
                                        <p>
                                            <i class="fas fa-quote-left fa-lg text-success me-2"></i>
                                            <span class="font-italic">Pantang Boyong Sebelum Glondong</span>
                                        </p>
                                    </blockquote>
                                    <figcaption class="blockquote-footer">
                                        Ust. Noor Shokhib, AH, M.PD.I
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" ></script>
<script>
        function fetchDataRandom() {
            $.ajax({
                url: '/santri-random',
                method: 'GET',
                success: function(data) {
                    displaySantriData(data);
                },
                error: function(error) {
                    console.error('Error fetching santri data:', error);
                }
            });

            $.ajax({
                url: '/pegawai-random',
                method: 'GET',
                success: function(data) {
                    displayPegawaiData(data);
                },
                error: function(error) {
                    console.error('Error fetching santri data:', error);
                }
            });
        }

        function displaySantriData(santri) {
            if (!santri) { return; }
            $('#santri-random').html(`
                        <div class="col-6 d-flex flex-column align-items-center">
                            <img loading="lazy" src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/${ santri.photo }"
                                    class="img-fluid sosmed-foto" alt="foto ${ santri.nama }"
                                    onerror="this.onerror=null; this.src='{{ asset('img/avatar-siluet.svg') }}';">
                        </div>
                        <div class="col">
                            <p class="sosmed-nama text-uppercase mb-0">${ santri.nama }</p>
                            <p class="mb-0">Kelas : <span class="text-uppercase">${ santri.kelas }</span></p>
                        </div>
            `);
        }

        function displayPegawaiData(pegawai) {
            if (!pegawai) { return; }
            $('#pegawai-random').html(`
                <div class="col-5 d-flex flex-column align-items-center">
                    <img loading="lazy" src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/${ pegawai.photo }"
                        class="img-fluid sosmed-foto" alt="foto ${ pegawai.nama }"
                        onerror="this.onerror=null; this.src='{{ asset('img/avatar-siluet.svg') }}';">
                </div>
                <div class="col">
                    <p class="sosmed-nama text-uppercase mb-0">${ pegawai.nama }</p>
                    <p class="mb-0">Sebagai : ${ pegawai.jabatan }</p>
                </div>
            `);
        }

       $(document).ready(function() {
            fetchDataRandom();
            $('.owl-carousel').owlCarousel({
                loop:false,
                margin:10,
                nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:4
                    }
                }
                })
            
            setInterval(fetchDataRandom, 60000);

            $('.carousel-item').eq(0).addClass('active');

            // YouTube URLs
            const youtube = [
                "https://www.youtube.com/embed/C43F23OSsCs",
                "https://www.youtube.com/embed/Awcz08n2fb0",
                "https://www.youtube.com/embed/p92g775Bdbw",
                "https://www.youtube.com/embed/Y7y75CnyoYU",
                "https://www.youtube.com/embed/pyNP5Sg2o7A",
            ];
            const randomVideo = youtube[Math.floor(Math.random() * youtube.length)];
            $('#youtube-iframe').html(`
                <iframe class="rounded" src="${randomVideo}" 
                    frameborder="0" allowfullscreen style="border: none; overflow: hidden;"></iframe>
            `);

            // Facebook URLs
            const facebook = [
                "https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpprtq.r.falah%2Fposts%2Fpfbid02JZmMjPK31F1Nq2J3a5ZWzd8BZePKmk11ByAYFAhSHLAbGNPkH8Nn9FJNwvxmpPXwl&show_text=true&width=500",
                "https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpprtq.r.falah%2Fposts%2Fpfbid028zm2KRkP2aNiAxgeuFkM5ombivrd8gnDSaYC27fEnkoURaQkwqWmJKafR7GZJUu6l&show_text=true&width=500",
                "https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpprtq.r.falah%2Fposts%2Fpfbid022R53R6x4NxSVEciNKK4Cp5oUN9gjj2w5ACBxHFf5C5ypqfMm5ggGqTc2zm7RXcuJl&show_text=true&width=500",
                "https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpprtq.r.falah%2Fposts%2Fpfbid02XjUM7sp6w28xCcQfPTxDwHgSq41aJ47HhjkJm37nVFm85NjCmKYb28FsYDuQX4dml&show_text=true&width=500",
                "https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fmitq.raudlatulfalah%2Fposts%2Fpfbid0rUsx3XtRpRJdTTWdQZnJNX9REjRLYHRpAWyVxjmCMBhDRr2sYQgnQ1wn2ti4f1UJl&show_text=true&width=500"
            ];
            const randomFacebook = facebook[Math.floor(Math.random() * facebook.length)];
            $('#facebook-iframe').html(`
                <iframe class="rounded" width="100%" height="auto" style="border:none;overflow:hidden" 
                    scrolling="no" frameborder="0" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" 
                    src="${randomFacebook}">
                </iframe>
            `);

            const tiktok = [
                '<blockquote class="tiktok-embed" cite="https://www.tiktok.com/@ppatq.raudlatulfalah/video/7416542071596600581" data-video-id="7416542071596600581" style="width:100%;height:100%;"></blockquote>',
                '<blockquote class="tiktok-embed" cite="https://www.tiktok.com/@ppatq.raudlatulfalah/video/7457791362243546373" data-video-id="7457791362243546373" style="width:100%;height:100%;"></blockquote>',
                '<blockquote class="tiktok-embed" cite="https://www.tiktok.com/@ppatq.raudlatulfalah/video/7457427007459052806" data-video-id="7457427007459052806" style="width:100%;height:100%;"></blockquote>',
                '<blockquote class="tiktok-embed" cite="https://www.tiktok.com/@ppatq.raudlatulfalah/video/7457048509703785733" data-video-id="7457048509703785733" style="width:100%;height:100%;"></blockquote>'
            ];
            const randomTiktok = tiktok[Math.floor(Math.random() * tiktok.length)];
            $('#tiktok-iframe').html(randomTiktok);

        });
</script>
@endsection