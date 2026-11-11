@extends('layout.main_layout')
@section('title')
<title>Visi Misi | PPATQ-RF</title>
@endsection
@section('description', "Visi dan misi PPATQ Raudlatul Falah, pondok pesantren anak-anak tahfidzul Qur'an di Pati.")
@section('content')
<div class="p-4 wow fadeInUp" data-wow-delay="0.1s">
    <div class="row">
        <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h1 class="h2 fw-bold text-green text-uppercase text-green">Visi Dan Misi</h1>
            <small class="mb-0">PPATQ RAUDLATUL FALAH</small>
        </div>
    </div>
    <div class="row py-5">
        <div class="col-12 col-sm-6 text-center">
            <img class="w-100 rounded img" src="{{asset('img/visi1.jpg')}}" alt="Visi Image">
        </div>
        <div class="col-12 col-sm-6 mt-4 d-flex flex-column justify-content-center">
            <h4 class="fw-bold text-green text-uppercase text-green text-center fs-3 mb-4 mt-4">Visi</h4>
            <p>"Bersama QU", Komitmen untuk membangun sebuah komunitas yang dijiwai oleh nilai-nilai keimanan dan keislaman yang kokoh. Visi ini mencerminkan tekad untuk bersama-sama menjalani kehidupan dengan bertaqwa kepada Allah, menjunjung tinggi nilai-nilai kesantunan dalam berinteraksi, berjuang untuk kemajuan yang berkelanjutan, dan menghidupkan Al-Qur'an sebagai pedoman utama dalam segala aspek kehidupan.</p>
        </div>
    </div>
    <div class="row py-5">
        <div class="col-12 col-sm-6 order-sm-2 order-1 text-center">
            <img class="w-100 rounded img" src="{{asset('img/misi1.jpg')}}" alt="Visi Image">
        </div>
        <div class="col-12 col-sm-6 order-sm-1 order-2 d-flex flex-column justify-content-center">
            <h4 class="fw-bold text-green text-uppercase text-green text-center fs-3 mb-4 mt-4">Misi</h4>
            <p>"Misi kami adalah menghasilkan generasi yang hafal Al-Qur'an dengan mutu yang unggul, bukan hanya sekedar dalam hafalan, tetapi juga dalam pemahaman dan aplikasi nilai-nilai Al-Qur'an dalam kehidupan sehari-hari. Kami berkomitmen untuk mencetak generasi yang tidak hanya cemerlang dalam akademik, tetapi juga memiliki karakter yang terkait erat dengan ajaran Al-Qur'an. Kami bertekad untuk meningkatkan mutu imtaq (keimanan) dan iptek (ilmu pengetahuan dan teknologi) dalam pendidikan, serta menegakkan ahlakul karimah sebagai landasan moral dan etika dalam bermasyarakat."</p>
        </div>
    </div>
</div>

@endsection


