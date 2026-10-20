<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    @yield('title')
    @include('layout.head')
    @yield('header')
    <style>
        .text-justify {
            text-align: justify;
        }
    </style>
</head>

<body class="p-2 p-md-4" style="background-color: #F3F7EC;">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>

    <div class="w-100 bg-white">
        <div class="col-lg-6 col-12 p-3 header-responsive gap-5">
            <img src="{{asset('img/cropped-header-objectpatq.png')}}" width="100" alt="">
            <div class="d-flex flex-column">
                <h2>
                    PPATQ RAUDLATUL FALAH
                </h2>
                <p class="text-secondary"> Pondok Pesantren Anak-anak Tahfidzul Qur'an Raudlatul Falah – Pati </p> 
            </div>
        </div>
    </div>
    @php
        $menuAktif = match (true) {
            request()->routeIs('HomePage', 'dakwah.*') => 'home',
            request()->routeIs('aboutPage', 'visimisi', 'sekapursirih') => 'about',
            request()->routeIs('berita', 'berita.*') => 'berita',
            request()->routeIs('agenda') => 'agenda',
            request()->routeIs('galeri-fasilitas') => 'galeri-fasilitas',
            request()->routeIs('pengasuh-staff') => 'pengasuh-staff',
            request()->routeIs('kesantrian') => 'kesantrian',
            request()->routeIs('prestasi') => 'prestasi',
            request()->routeIs('kelas-kamar', 'show-kelas', 'show-kamar') => 'kelas-kamar',
            request()->routeIs('layanan') => 'layanan',
            default => '',
        };
    @endphp
    <nav class="navbar navbar-expand-custom navbar-mainbg">
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" data-active-menu="{{ $menuAktif }}">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
                <li class="nav-item" id="home">
                    <a class="nav-link" href="{{Route('HomePage')}}" name="homePage">Home</a>
                </li>
                <li class="nav-item" id="about">
                    <a class="nav-link" href="{{Route('aboutPage')}}" name="aboutPage">Seputar PPATQ</a>
                </li>
                <li class="nav-item" id="berita">
                    <a class="nav-link" href="{{Route('berita')}}">Berita</a>
                </li>
                <li class="nav-item" id="agenda">
                    <a class="nav-link" href="{{Route('agenda')}}">Agenda</a>
                </li>
                <li class="nav-item" id="galeri-fasilitas">
                    <a class="nav-link" href="{{ Route('galeri-fasilitas') }}">Galeri & Fasilitas</a>
                </li>
                <li class="nav-item" id="pengasuh-staff">
                    <a class="nav-link" href="{{Route('pengasuh-staff')}}">Staff & Pengasuh</a>
                </li>
                <li class="nav-item" id="kesantrian">
                    <a class="nav-link" href="{{Route('kesantrian')}}">Kesantrian</a>
                </li>
                <li class="nav-item" id="prestasi">
                    <a class="nav-link" href="{{Route('prestasi')}}">Prestasi</a>
                </li>
                <li class="nav-item" id="kelas-kamar">
                    <a class="nav-link" href="{{Route('kelas-kamar')}}">Kelas & Kamar</a>
                </li>
                <li class="nav-item" id="layanan">
                    <a class="nav-link" href="{{Route('layanan')}}">Layanan</a>
                </li>
            </ul>
        </div>
    </nav>
   
    <div class="bg-light border">
        @yield('content')
        <!-- Footer Start -->
            <div class="container">
                <div class="row justify-content-end">
                        <div class="d-flex align-items-center justify-content-center p-3 text-center" >
                            <p class="text-secondary">Copyright ©2023-{{ now()->year }} PPATQ RAUDLATUL FALAH</p> 
                        </div>
                </div>
            </div>
    
            <!-- Back to Top -->
            <a href="#top" class="btn btn-lg btn-success btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>
        <!-- Footer End -->
    </div>
    

    {{-- Lightbox foto: dipakai semua gambar konten (lihat skrip zoom di bawah) --}}
    <div class="modal fade" id="zoomModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 bg-transparent" data-bs-dismiss="modal">
                <div class="modal-body text-center p-2">
                    <img id="zoomModalImage" class="img-fluid rounded" alt="">
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    
    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
    <script>
        window.debounce = function (fn, delay) {
            var timer;
            return function () {
                var context = this, args = arguments;
                clearTimeout(timer);
                timer = setTimeout(function () { fn.apply(context, args); }, delay);
            };
        };
    </script>
    <script>
        (function ($) {
            var STORAGE_KEY = 'ppatq:menu-terakhir';
            var $nav = $('#navbarSupportedContent');
            var $selector = $nav.find('.hori-selector');
            var currentId = $nav.data('active-menu');
            var $current = currentId ? $('#' + currentId) : $();

            function readLast() {
                try { return sessionStorage.getItem(STORAGE_KEY); } catch (e) { return null; }
            }

            function saveLast(id) {
                try {
                    if (id) { sessionStorage.setItem(STORAGE_KEY, id); } else { sessionStorage.removeItem(STORAGE_KEY); }
                } catch (e) {}
            }

            function setActive($item) {
                $nav.find('li.active').removeClass('active');
                $item.addClass('active');
            }

            // Geser highlight ke menu; animate=false langsung loncat tanpa transisi
            function moveTo($item, animate) {
                if (!$item.length || !$nav.is(':visible')) { return false; }

                var pos = $item.position();
                if (!animate) { $selector.css('transition', 'none'); }
                $selector.css({
                    top: pos.top + 'px',
                    left: pos.left + 'px',
                    height: $item.innerHeight() + 'px',
                    width: $item.innerWidth() + 'px'
                });
                if (!animate) {
                    $selector[0].offsetHeight; // paksa reflow sebelum transisi dinyalakan lagi
                    $selector.css('transition', '');
                }
                return true;
            }

            function init() {
                if (!$current.length) {
                    // Halaman yang tidak punya menu (cek santri, privacy policy, dll)
                    $selector.css('width', 0);
                    saveLast('');
                    return;
                }

                var lastId = readLast();
                var $last = lastId && lastId !== currentId ? $('#' + lastId) : $();

                if ($last.length && $nav.is(':visible')) {
                    // Mulai dari menu terakhir, lalu geser ke menu halaman ini
                    setActive($last);
                    moveTo($last, false);
                    requestAnimationFrame(function () {
                        requestAnimationFrame(function () {
                            setActive($current);
                            moveTo($current, true);
                        });
                    });
                } else {
                    setActive($current);
                    moveTo($current, false);
                }

                saveLast(currentId);
            }

            $('.navbar-toggler').on('click', function () {
                var $toggler = $(this);
                $nav.slideToggle(300, function () {
                    $toggler.attr('aria-expanded', $nav.is(':visible'));
                    moveTo($current, false);
                });
            });

            var resizeTimer;
            $(window).on('resize', function () {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function () { moveTo($current, false); }, 100);
            });

            // Lebar menu berubah setelah font web selesai dimuat
            $(window).on('load', function () { moveTo($current, true); });

            init();
        })(jQuery);
    </script>
    <script>
        // Zoom foto: gambar konten (di luar link, tombol, dan navbar) dibuka di #zoomModal saat diklik.
        (function ($) {
            var SKIP_SRC = /ui-avatars\.com|auth-cover-login-mask|Play_Store|histats/i;

            function canZoom(img) {
                return !img.closest('a, button, .navbar, [data-no-zoom]') && !SKIP_SRC.test(img.currentSrc || img.src);
            }

            var modal = new bootstrap.Modal(document.getElementById('zoomModal'));
            var $content = $('.bg-light.border');

            $content.on('click', 'img', function () {
                if (!canZoom(this)) return;
                $('#zoomModalImage').attr({ src: this.currentSrc || this.src, alt: this.alt });
                modal.show();
            });

            // Tandai gambar yang bisa di-zoom (termasuk yang dimuat lewat AJAX) agar kursor berubah
            function mark(root) {
                $(root).find('img').addBack('img').each(function () {
                    this.classList.toggle('zoomable', canZoom(this));
                });
            }
            mark($content);
            new MutationObserver(function (records) {
                records.forEach(function (r) { r.addedNodes.forEach(function (n) { if (n.nodeType === 1) mark(n); }); });
            }).observe($content[0], { childList: true, subtree: true });
        })(jQuery);
    </script>
    @yield('script')
</body>
</html>