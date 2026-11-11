@extends('layout.main_layout')
@section('title')
<title>Aplikasi Wali Santri | PPATQ-RF</title>
@endsection
@section('description', "Aplikasi Mobile Wali Santri PPATQ Raudlatul Falah untuk memantau akademik, ketahfidzan, dan kesehatan santri.")
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
</style>
@endsection
@section('content')
<div class="container-fluid wow py-4 fadeInUp" data-wow-delay="0.3s">
    <div class="container py-4">
        <div class="row g-5">
            <div class="col-12">
                <div class="section-title position-relative pb-3 mb-5">
                    <h1 class="h2 fw-bold text-green  text-uppercase">Aplikasi Mobile Wali Santri - PPATQ-RF</h1>
                    <small>
                        PPATQ RAUDLATUL FALAH - PATI
                    </small>
                </div>
                <span class="text-justify">    
                    <div>[ PPATQ-RF ku ]<br><br>Assalamu’alaikum warahmatullahi wabarakatuh.<br><br>Alhamdulillah, dengan izin Allah, saat ini Pondok Pesantren Anak Tahfidzul Qur’an Raudlatul Falah tengah mengembangkan aplikasi pendamping bernama PPATQ-RF ku.<br><br>Aplikasi ini dirancang khusus sebagai sarana bagi Bapak/Ibu wali santri untuk memantau perkembangan dan progres putra/putrinya selama di pondok, serta sebagai penguat komunikasi dan sinergi antara wali santri dan pihak pesantren.<br><br>Saat ini aplikasi masih dalam tahap penyempurnaan, dan kami sangat mengharapkan partisipasi serta masukan dari Bapak/Ibu dalam proses uji coba ini.<br><br>Cara login sementara:<br>Gunakan Nama Santri + Kelas + Tanggal Lahir<br><br>Contoh:&nbsp;<br>Nama santri : Ahmad Zaid (bisa diketik 3 huruf karena auto complate)<br>Kelas : 2a&nbsp; (dipilih)<br>Tanggal lahir : 21 Januari 2011&nbsp; ( seleksi pada board sesuai tanggal lahirnya)<br><br>Beberapa data sudah kami isikan berdasarkan database yang ada. Kami mohon maaf apabila masih ada kekurangan, dan insyaAllah akan kami sempurnakan secara bertahap.<br><br>
                    Aplikasi dapat didownload pada tombol berikut 
                    <a href="https://play.google.com/store/apps/details?id=com.ppatq.walsan&pcampaignid=web_share" target="_blank" style="display:inline-flex;align-items:center;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play Store" style="height:32px;margin-right:8px;">
                    </a>
                    <br><br>
                    Kami mohon kesediaan Bapak/Ibu untuk mencoba aplikasi ini dan memberikan kritik serta saran yang membangun, agar aplikasi ini benar-benar bermanfaat dan sesuai dengan kebutuhan bersama.<br><br>Terima kasih atas perhatian dan kerja samanya.<br>Wassalamu’alaikum warahmatullahi wabarakatuh.<br><br>Salam hormat,<br>Tim IT &amp; Admin PPATQ Raudlatul Falah<br><br>[masukan dan hal lain seputar aplikasi dapat hubungi lewat WA 0818.24.0102]</div>
                </span>
            </div>
        </div>
    </div>
</div>
@endsection