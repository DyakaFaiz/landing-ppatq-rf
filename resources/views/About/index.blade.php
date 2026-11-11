@extends('layout.main_layout')
@section('title')
<title>Tentang Pesantren | PPATQ-RF</title>
@endsection
@section('description', "Profil PPATQ Raudlatul Falah: visi dan misi, sambutan pengasuh, metode hafalan Al-Qur'an, jadwal kegiatan harian santri, dan lokasi pondok pesantren di Gembong, Pati.")

@section('content')
@include('About.content')
<div class="p-4 wow fadeInUp" data-wow-delay="0.1s">
    <div class="row">
        <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h2 class="fw-bold text-green text-uppercase text-green">Visi Dan Misi</h2>
            <small>
                PPATQ RAUDLATUL FALAH - PATI
            </small>
        </div>
    </div>
    <div class="row py-5">
        <div class="col-12 col-sm-6 text-center">
            <img class="w-100 rounded img" src="{{asset('img/visi.jpg')}}" alt="Visi Image">
        </div>
        <div class="col-12 col-sm-6 mt-4 d-flex flex-column justify-content-center">
            <h4 class="fw-bold text-green text-uppercase text-green text-center fs-3 mb-4 mt-4">Visi</h4>
            <span class="text-justify">
                {!! $about->visi !!}
            </span>
        </div>
    </div>
    <div class="row py-5">
        <div class="col-12 col-sm-6 order-sm-2 order-1 text-center">
            <img class="w-100 rounded img" src="{{asset('img/misi.jpg')}}" alt="Visi Image">
        </div>
        <div class="col-12 col-sm-6 order-sm-1 order-2 d-flex flex-column justify-content-center">
            <h4 class="fw-bold text-green text-uppercase text-green text-center fs-3 mb-4 mt-4">Misi</h4>
            <span class="text-justify">
                {!! $about->misi !!}
            </span>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="row">
        <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h2 class="fw-bold text-green text-uppercase text-green">Sekapur Sirih</h2>
            <small>
                PPATQ RAUDLATUL FALAH - PATI
            </small>
        </div>
    </div>
    <div class="col-lg-6 p-5">
        <div class="text-center">
            <img src="{{asset('img/KH.-Djaelani.png')}}" class="img-fluid mb-4" style="max-width: 200px;">
            <h5 class="mb-3">SAMBUTAN KETUA DEWAN PEMBINA YAYASAN RAUDLATUL FALAH</h5>
            <h4 class="mb-4">
                السلام عليكم ورحمة الله وبركاته

                        الحمد لله رب العالمين والصلاة والسلام علي اشرف الانبياء والمر سلين وعلي اله وصحبه اجمعين . اما بعد
            </h4>
            <p class="text-justify">
                Seorang seniman terkenal mengatakan bahwa anak adalah harta yang berharga, begitu juga dalam puisi Khalil Gibran, anak merupakan putra putri yang hidup yang rindu pada diri sendiri, yang jiwanya adalah penghuni rumah masa depan, yang kehidupannya terus berlangsung tiada henti.

                Pohon yang baik dikenal lewat buahnya yang baik. Anak yang sholeh melambangkan sosok orang tua yang sholeh. 
            </p>
            <p class="text-justify">
                Oleh karena itu mempersiapkan kehidupan anak dengan sebaik-baiknya merupakan tugas mulia bagi orang tua dan Yayasan Raudlatul Falah lewat Pondok Pesantren Anak-Anak Tahfidzul Qur’an siap mewujudkan, ikut mempersiapkan, mendorong dan menjadikan generasi generasi yang sholeh, generasi qur’ani, santun, maju dan kreatif.

                Akhir kata selaku Ketua Dewan Pembina kami ucapkan banyak terima kasih pada semua pihak yang terlibat dan membantu kemajuan pondok ini.
            </p>
            <h5 class="mt-4">والسلام عليكم ورحمة الله وبركاته<br><br>Ketua Dewan Pembina Yayasan Raudlatul Falah<br><span class="fs-4">
                    KH. Ahmad Djaelani, AH, S.Pd.I
                </span>
            </h5>
        </div>
    </div>
    <div class="col-lg-6 p-5">
        <div class="text-center">
            <img loading="lazy" src="{{asset('img/abah-sohib2.jpeg')}}" class="rounded-circle img-fluid mb-4" style="max-width: 200px;" alt="foto Pengasuh">
            <h5 class="mb-3">SAMBUTAN PENGASUH PONDOK PESANTREN
                ANAK-ANAK TAHFIDZUL QUR’AN
                RAUDLATUL FALAH</h5>
            <h4 class="mb-4">السلام عليكم ورحمة الله وبركاته

                الحمد لله رب العالمين والصلاة والسلام علي اشرف الانبياء والمر سلين وعلي اله وصحبه اجمعين . اما بعد</h4>
            <p class="text-justify">
                Anak merupakan amanat Allah SWT yang dititipkan kepada orang tuanya. Kalbu yang sangat bersih merupakan permata yang sangat berharga. Jika ia dibiasakan untuk melakukan kebaikan, niscaya dia akan tumbuh menjadi baik dan menjadi orang yang bahagia dunia akhirat. Demikian pula sebaliknya, jika ia dibiasakan melakukan keburukan serta dilestarikan maka niscaya ia akan menjadi orang yang celaka dunia akhirat. Keadaan fitrahnya akan senantiasa siap untuk menerima yang baik atau buruk dari orang tuanya atau pendidikannya.

            </p>
            <p class="text-justify">
                Untuk mencapai kesuksesan dunia akhirat, maka pendidikan sebaiknya dimulai dari usia dini melaui pendidikan yang bersumber dari nilai nilai islam.
                
                Untuk itu Pondok Pesantren Anak Anak Tahfidzul Qur’an Raudlatul Falah menyelenggarakan pendidikan anak usia dini yang hafal Alqur’qn serta memiliki nilai nilai Qur’ani dan belajar pendidikan formal yang diselenggarakan dalam satu lingkungan sehingga akan menghasilkan generasi yang hafal al Qur’an yang teguh imannya, mulia ahlaqnya, cerdas pemikirannya, yang patuh agama untuk menuju kebahagian dunia dan akhirat dengan ridlo Allah SWT.
                Amin…
            </p>
            <h5 class="mt-4">والسلام عليكم ورحمة الله وبركاته
                <br><br>Pengasuh PPATQ RF

                <br><span class="fs-4">
                    Ust. Nor Shohib, AH, S.Pd.I
                </span>
            </h5>
        </div>
    </div>
</div>
@include('metode.content')
@include('jadwal.content')
@include('laporan.content')
<div class="container py-4">
    <div class="row g-5">
        <div class="col-lg-6">
            <div class="section-title position-relative pb-3 mb-5">
                <h2 class="fw-bold text-green  text-uppercase">Temukan Kami</h2>
                <small>
                    Pondok Pesantren Tahfidzul Quran Raudlatul Falah
                </small>
            </div>

            <p class="mb-2">
                Alamat : {{ $about->alamat }}
            </p>
            <p class="mb-2">
                Sekolah : {{ $about->sekolah }}
            </p>
            <p class="mb-2">
                NSM : {{ $about->nsm }}
            </p>
            <p class="mb-2">
                NPSN : {{ $about->npsn }}
            </p>
            <p class="mb-2">
                Nara hubung : {{ $about->nara_hubung }}
            </p>
        </div>
        <div class="col-lg-6 col-12 d-flex align-items-center justify-content-center">
            <div class="position-relative h-100" style="overflow: hidden;">
                <iframe loading="lazy" title="Lokasi Pondok Pesantren Anak Tafidzul Quran Raudlatul Falah" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.3901543170664!2d110.94519457295992!3d-6.7221556932737885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d0d8f54eaf87%3A0x2e013b91de6e90fe!2sPondok%20Pesantren%20PPRTQ%20Raudhatul%20Falah%20Bermi!5e0!3m2!1sen!2sid!4v1738514991001!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection

