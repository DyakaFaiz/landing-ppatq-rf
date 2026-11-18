{{-- Tab 1: Visi & Misi (termasuk Sekapur Sirih dan Temukan Kami) --}}

<!-- Tentang Pesantren & Video -->
<div class="container py-4">
    <div class="row g-5 align-items-center">
        <div class="col-lg-6">
            <div class="section-title position-relative pb-3 mb-4">
                <h2 class="h3 fw-bold text-green text-uppercase">Tentang Pesantren</h2>
                <small class="text-muted">PPATQ RAUDLATUL FALAH - PATI</small>
            </div>
            <div class="text-justify lh-base fs-6 text-secondary">
                {!! $about->tentang !!}
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="ratio ratio-16x9 rounded-4 shadow-sm overflow-hidden border">
                <iframe loading="lazy" src="https://www.youtube.com/embed/ZRjG7ofmnnA?si=vKlnkISWsWXa4_vx" title="Profil Video PPATQ Raudlatul Falah" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<hr class="my-4 border-success opacity-10">

<!-- Visi dan Misi -->
<div class="container py-4">
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
        <h2 class="fw-bold text-green text-uppercase">Visi Dan Misi</h2>
        <small class="text-muted">Arah, Cita-cita & Komitmen Luhur PPATQ RAUDLATUL FALAH</small>
    </div>

    <!-- Visi -->
    <div class="row g-4 align-items-center py-3">
        <div class="col-12 col-md-5 text-center">
            <div class="overflow-hidden rounded-4 shadow-sm border">
                <img class="w-100 img-fluid hover-zoom" src="{{ asset('img/visi.jpg') }}" alt="Visi PPATQ" style="transition: transform 0.4s ease;">
            </div>
        </div>
        <div class="col-12 col-md-7 ps-md-4">
            <div class="p-4 rounded-4 bg-white shadow-sm border-start border-4 border-success">
                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-success-subtle text-green px-3 py-2 rounded-pill fw-bold fs-6">
                        <i class="bi bi-eye me-2"></i>VISI PESANTREN
                    </span>
                </div>
                <div class="text-justify text-dark fs-6 lh-lg">
                    {!! $about->visi !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Misi -->
    <div class="row g-4 align-items-center py-4">
        <div class="col-12 col-md-5 order-md-2 text-center">
            <div class="overflow-hidden rounded-4 shadow-sm border">
                <img class="w-100 img-fluid hover-zoom" src="{{ asset('img/misi.jpg') }}" alt="Misi PPATQ" style="transition: transform 0.4s ease;">
            </div>
        </div>
        <div class="col-12 col-md-7 order-md-1 pe-md-4">
            <div class="p-4 rounded-4 bg-white shadow-sm border-start border-4 border-success">
                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-success-subtle text-green px-3 py-2 rounded-pill fw-bold fs-6">
                        <i class="bi bi-bullseye me-2"></i>MISI PESANTREN
                    </span>
                </div>
                <div class="text-justify text-dark fs-6 lh-lg">
                    {!! $about->misi !!}
                </div>
            </div>
        </div>
    </div>
</div>

<hr class="my-4 border-success opacity-10">

<!-- Sekapur Sirih -->
<div class="container py-4">
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
        <h2 class="fw-bold text-green text-uppercase">Sekapur Sirih</h2>
        <small class="text-muted">Sambutan & Pesan Pembina Yayasan serta Pengasuh PPATQ</small>
    </div>

    <div class="row g-4">
        <!-- Sambutan Ketua Pembina -->
        <div class="col-lg-6">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white position-relative">
                <div class="text-center mb-4">
                    <img src="{{ asset('img/KH.-Djaelani.png') }}" class="img-fluid mb-3 rounded-circle shadow-sm p-1 border border-2 border-success" style="width: 140px; height: 140px; object-fit: cover;" alt="KH. Ahmad Djaelani">
                    <span class="badge bg-success-subtle text-green mb-2 px-3 py-1 rounded-pill">DEWAN PEMBINA</span>
                    <h5 class="fw-bold text-green mb-1">KH. Ahmad Djaelani, AH, S.Pd.I</h5>
                    <small class="text-muted">Ketua Dewan Pembina Yayasan Raudlatul Falah</small>
                </div>
                <div class="text-center text-arabic mb-3 fs-5" style="font-family: 'Amiri', serif; color: #1a5632;">
                    السلام عليكم ورحمة الله وبركاته<br>
                    <small class="fs-6">الحمد لله رب العالمين والصلاة والسلام علي اشرف الانبياء والمر سلين وعلي اله وصحبه اجمعين . اما بعد</small>
                </div>
                <div class="text-justify text-secondary fs-6 lh-base">
                    <p>Seorang seniman terkenal mengatakan bahwa anak adalah harta yang berharga, begitu juga dalam puisi Khalil Gibran, anak merupakan putra putri yang hidup yang rindu pada diri sendiri, yang jiwanya adalah penghuni rumah masa depan, yang kehidupannya terus berlangsung tiada henti.</p>
                    <p>Pohon yang baik dikenal lewat buahnya yang baik. Anak yang sholeh melambangkan sosok orang tua yang sholeh.</p>
                    <p>Oleh karena itu mempersiapkan kehidupan anak dengan sebaik-baiknya merupakan tugas mulia bagi orang tua dan Yayasan Raudlatul Falah lewat Pondok Pesantren Anak-Anak Tahfidzul Qur’an siap mewujudkan, ikut mempersiapkan, mendorong dan menjadikan generasi yang sholeh, generasi qur’ani, santun, maju dan kreatif.</p>
                    <p class="mb-0">Akhir kata selaku Ketua Dewan Pembina kami ucapkan banyak terima kasih pada semua pihak yang terlibat dan membantu kemajuan pondok ini.</p>
                </div>
                <div class="text-center text-arabic mt-4 pt-3 border-top" style="font-family: 'Amiri', serif; color: #1a5632;">
                    والسلام عليكم ورحمة الله وبركاته
                </div>
            </div>
        </div>

        <!-- Sambutan Pengasuh -->
        <div class="col-lg-6">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white position-relative">
                <div class="text-center mb-4">
                    <img loading="lazy" src="{{ asset('img/abah-sohib2.jpeg') }}" class="img-fluid mb-3 rounded-circle shadow-sm p-1 border border-2 border-success" style="width: 140px; height: 140px; object-fit: cover;" alt="Ust. Nor Shohib">
                    <span class="badge bg-success-subtle text-green mb-2 px-3 py-1 rounded-pill">PENGASUH PPATQ</span>
                    <h5 class="fw-bold text-green mb-1">Ust. Nor Shohib, AH, S.Pd.I</h5>
                    <small class="text-muted">Pengasuh Pondok Pesantren Anak-Anak Tahfidzul Qur'an</small>
                </div>
                <div class="text-center text-arabic mb-3 fs-5" style="font-family: 'Amiri', serif; color: #1a5632;">
                    السلام عليكم ورحمة الله وبركاته<br>
                    <small class="fs-6">الحمد لله رب العالمين والصلاة والسلام علي اشرف الانبياء والمر سلين وعلي اله وصحبه اجمعين . اما بعد</small>
                </div>
                <div class="text-justify text-secondary fs-6 lh-base">
                    <p>Anak merupakan amanat Allah SWT yang dititipkan kepada orang tuanya. Kalbu yang sangat bersih merupakan permata yang sangat berharga. Jika ia dibiasakan untuk melakukan kebaikan, niscaya dia akan tumbuh menjadi baik dan menjadi orang yang bahagia dunia akhirat.</p>
                    <p>Demikian pula sebaliknya, jika ia dibiasakan melakukan keburukan serta dilestarikan maka niscaya ia akan menjadi orang yang celaka dunia akhirat. Keadaan fitrahnya akan senantiasa siap untuk menerima yang baik atau buruk dari orang tuanya atau pendidikannya.</p>
                    <p>Untuk mencapai kesuksesan dunia akhirat, maka pendidikan sebaiknya dimulai dari usia dini melalui pendidikan yang bersumber dari nilai-nilai Islam.</p>
                    <p class="mb-0">Untuk itu Pondok Pesantren Anak-Anak Tahfidzul Qur’an Raudlatul Falah menyelenggarakan pendidikan anak usia dini yang hafal Al-Qur’an serta memiliki nilai-nilai Qur’ani dan belajar pendidikan formal yang diselenggarakan dalam satu lingkungan sehingga menghasilkan generasi yang hafal Al-Qur’an yang teguh imannya, mulia akhlaknya, cerdas pemikirannya, dan patuh agama demi kebahagiaan dunia akhirat dengan ridho Allah SWT.</p>
                </div>
                <div class="text-center text-arabic mt-4 pt-3 border-top" style="font-family: 'Amiri', serif; color: #1a5632;">
                    والسلام عليكم ورحمة الله وبركاته
                </div>
            </div>
        </div>
    </div>
</div>

<hr class="my-4 border-success opacity-10">

<!-- Temukan Kami -->
<div class="container py-4">
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
        <h2 class="fw-bold text-green text-uppercase">Temukan Kami</h2>
        <small class="text-muted">Informasi Kontak, Legalitas & Lokasi Pesantren</small>
    </div>

    <div class="row g-4 align-items-stretch">
        <div class="col-lg-5">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white d-flex flex-column justify-content-between">
                <div>
                    <h5 class="fw-bold text-green mb-4 pb-2 border-bottom border-2 border-success-subtle">
                        <i class="bi bi-geo-alt-fill me-2 text-success"></i>Informasi Lembaga
                    </h5>
                    <div class="d-flex align-items-start mb-3">
                        <div class="icon-circle me-3 bg-success-subtle text-green p-2 rounded-3">
                            <i class="bi bi-pin-map-fill fs-5"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block fw-semibold">Alamat</small>
                            <span class="text-dark">{{ $about->alamat ?? 'Jl. KH. Abdullah Km. 02, Kec. Gembong, Kabupaten Pati, Jawa Tengah 59162' }}</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-3">
                        <div class="icon-circle me-3 bg-success-subtle text-green p-2 rounded-3">
                            <i class="bi bi-building fs-5"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block fw-semibold">Satuan Pendidikan</small>
                            <span class="text-dark">{{ $about->sekolah ?? 'MI Tahfidzul Qur’an Raudlatul Falah' }}</span>
                        </div>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <div class="p-3 bg-light rounded-3 border">
                                <small class="text-muted d-block fw-semibold">NSM</small>
                                <strong class="text-green">{{ $about->nsm ?? '111233180196' }}</strong>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 bg-light rounded-3 border">
                                <small class="text-muted d-block fw-semibold">NPSN</small>
                                <strong class="text-green">{{ $about->npsn ?? '69727500' }}</strong>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-3">
                        <div class="icon-circle me-3 bg-success-subtle text-green p-2 rounded-3">
                            <i class="bi bi-person-lines-fill fs-5"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block fw-semibold">Nara Hubung</small>
                            <span class="text-dark fw-bold">{{ $about->nara_hubung ?? 'Ust Muslim, AH' }}</span>
                        </div>
                    </div>
                </div>

                <div class="pt-3 border-top">
                    <a href="https://maps.app.goo.gl/wY3vX6n89cMhKzL58" target="_blank" rel="noopener" class="btn btn-success w-100 rounded-pill py-2 shadow-sm">
                        <i class="bi bi-box-arrow-up-right me-2"></i>Buka Rute di Google Maps
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="min-height: 400px;">
                <iframe loading="lazy" title="Peta Lokasi PPATQ Raudlatul Falah" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.3901543170664!2d110.94519457295992!3d-6.7221556932737885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d0d8f54eaf87%3A0x2e013b91de6e90fe!2sPondok%20Pesantren%20PPRTQ%20Raudhatul%20Falah%20Bermi!5e0!3m2!1sen!2sid!4v1738514991001!5m2!1sen!2sid" width="100%" height="100%" style="border:0; min-height: 400px;" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
