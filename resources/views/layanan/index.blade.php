@extends('layout.main_layout')
@section('title')
<title>Layanan | PPATQ-RF</title>
@endsection
@section('header')
<style>
    #services .services-list {
        padding-top: 50px;
    }
    .services-list .service-block {
        margin-bottom: 25px;
    }
    .services-list .service-block .ico {
        font-size: 38px;
        float: left;
    }
    .services-list .service-block .text-block {
        margin-left: 58px;
    }
    .services-list .service-block .text-block .name {
        font-size: 20px;
        font-weight: 900;
        margin-bottom: 5px;
    }
    .services-list .service-block .text-block .info {
        font-size: 16px;
        font-weight: 300;
        margin-bottom: 10px;
    }
    .services-list .service-block .text-block .text {
        font-size: 12px;
        line-height: normal;
        font-weight: 300;
    }
    .highlight {
        color: #2ac5ed;
        font-weight:bold;
    }
    .sosmed-link i {
        display: inline-block;
        transition: color 0.3s ease, transform 0.3s ease;
    }
    .sosmed-link:hover i {
        transform: translateY(-3px) scale(1.1);
    }
    .sosmed-tiktok:hover i { color: #000000; }
    .sosmed-facebook:hover i { color: #1877f2; }
    .sosmed-youtube:hover i { color: #ff0000; }
    .sosmed-instagram:hover i {
        color: #e1306c; /* cadangan jika background-clip tidak didukung */
        background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>
@endsection
@section('content')
    <!-- Blog Start -->
    <div class="container bootstrap snippets bootdey">
        <section id="services" class="current">
            <div class="services-top">
                <div class="container bootstrap snippets bootdey">
                    <div class="row text-center">
                        <div class="section-title text-center position-relative py-4 mb-4 mx-auto" style="max-width: 600px;">
                            <h2 class="fw-bold text-green text-uppercase text-green">Layanan PPATQ</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-1 col-sm-12 col-md-12 col-md-10">
                            <div class="services-list">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4 col-md-4">
                                        <div class="service-block" style="visibility: visible;">
                                            <div class="ico bi bi-person-add highlight text-success"></div>
                                            <div class="text-block">
                                                <div class="name">PSB</div>
                                                <div class="text text-justify">Pendaftaran dan seleksi calon santri baru, mulai dari administrasi, tes akademik, hingga wawancara. <a class="fs-6 fw-bold fst-italic" href="https://psb.ppatq-rf.id/">Disini</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-md-4">
                                        <div class="service-block" style="visibility: visible;">
                                            <div class="ico bi bi-wallet-fill highlight text-success"></div>
                                            <div class="text-block">
                                                <div class="name">Payment</div>
                                                <div class="text text-justify">Pembayaran biaya pendidikan, asrama, dan administrasi dengan mudah dan aman lewat berbagai metode pembayaran. <a class="fs-6 fw-bold fst-italic" href="https://payment.ppatq-rf.id/">Disini</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-md-4">
                                        <div class="service-block" style="visibility: visible;">
                                            <div class="ico bi bi-envelope-arrow-up highlight text-success"></div>
                                            <div class="text-block">
                                                <div class="name">Sambung Rasa</div>
                                                <div class="text text-justify">Layanan komunikasi dan konsultasi bagi wali santri untuk menyampaikan aspirasi atau menanyakan perkembangan santri. <a class="fs-6 fw-bold fst-italic" href="https://payment.ppatq-rf.id/index.php/keluhan">Disini</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-md-4">
                                        <div class="service-block" style="visibility: visible;">
                                            <div class="ico bi bi-cast highlight text-success"></div>
                                            <div class="text-block">
                                                <div class="name">Sosial Media</div>
                                                <div class="text text-justify">Kanal resmi pondok untuk berita, kegiatan, dan pengumuman penting bagi santri, wali santri, dan masyarakat.</div>
                                                <div class="text fs-3 mt-2">
                                                    <span>
                                                        <a href="https://www.tiktok.com/@ppatq.raudlatulfalah?lang=en" class="text-decoration-none sosmed-link sosmed-tiktok" aria-label="Tiktok">
                                                            <i class="bi bi-tiktok"></i>
                                                        </a>
                                                    </span>
                                                    <span>
                                                        <a href="https://www.facebook.com/pprtq.r.falah" class="text-decoration-none sosmed-link sosmed-facebook" aria-label="Facebook">
                                                            <i class="bi bi-facebook"></i>
                                                        </a>
                                                    </span>
                                                    <span>
                                                        <a href="https://www.youtube.com/@PPATQTV" class="text-decoration-none sosmed-link sosmed-youtube" aria-label="Youtube">
                                                            <i class="bi bi-youtube"></i>
                                                        </a>
                                                    </span>
                                                    <span>
                                                        <a href="https://www.instagram.com/ppatq_raudlatulfalah/" class="text-decoration-none sosmed-link sosmed-instagram" aria-label="Instagram">
                                                            <i class="bi bi-instagram"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
@endsection


