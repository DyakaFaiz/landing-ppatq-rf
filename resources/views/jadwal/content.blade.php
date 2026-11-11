@php
    // [jam, kegiatan, ikon (Bootstrap Icons), jenis] -- jenis menentukan warna ikon di style.css
    $harian = [
        ['04.00 - 04.20', 'Bangun tidur langsung mandi', 'bi-droplet', 'bersih'],
        ['04.20 - 04.35', "Sholat Shubuh berjama'ah", 'bi-stars', 'ibadah'],
        ['04.35 - 06.15', 'Jam Wajib Tahfidz', 'bi-book', 'tahfidz'],
        ['06.30 - 06.50', 'Istirahat, Makan Pagi, Persiapan Sekolah MI', 'bi-cup-hot', 'istirahat'],
        ['06.50 - 09.20', 'Jam Wajib Sekolah MI', 'bi-backpack', 'sekolah'],
        ['09.20 - 10.00', 'Istirahat (Sholat Dzuha)', 'bi-stars', 'istirahat'],
        ['10.00 - 12.00', 'Jam Wajib Sekolah MI', 'bi-backpack', 'sekolah'],
        ['12.00 - 12.15', "Sholat Dzuhur berjama'ah", 'bi-stars', 'ibadah'],
        ['12.15 - 13.00', 'Istirahat dan Makan Siang', 'bi-cup-hot', 'istirahat'],
        ['13.00 - 14.30', 'Jam Wajib Tidur Siang', 'bi-moon', 'tidur'],
        ['14.30 - 15.00', 'Bangun tidur langsung mandi', 'bi-droplet', 'bersih'],
        ['15.00 - 15.30', "Sholat Ashar berjama'ah", 'bi-stars', 'ibadah'],
        ['15.30 - 17.00', 'Jam Wajib Tahfidz', 'bi-book', 'tahfidz'],
        ['17.00 - 18.00', 'Jam Istirahat, Makan Sore, Bermain', 'bi-emoji-smile', 'istirahat'],
        ['18.00 - 18.20', "Sholat Maghrib berjama'ah", 'bi-stars', 'ibadah'],
        ['18.20 - 19.00', 'Jam Wajib Tahfidz', 'bi-book', 'tahfidz'],
        ['19.00 - 19.20', "Sholat Isya' berjama'ah", 'bi-stars', 'ibadah'],
        ['19.20 - 20.15', 'Jam Wajib Tahfidz', 'bi-book', 'tahfidz'],
        ['20.15 - 21.10', 'Jam Wajib Belajar dan Ekstra', 'bi-pencil', 'belajar'],
        ['21.10 - 04.00', 'Jam Istirahat, Tidur Malam & Sholat Tahajud', 'bi-moon', 'tidur'],
    ];

    // [hari, jam, judul, keterangan]
    $mingguan = [
        ['Kamis Pagi', '06.50 - 07.35 WIB', 'Ngaji Kitab Abah Shokhib', 'Live streaming YouTube setiap hari Kamis pagi bersama seluruh santri dan asatidz.'],
        ["Jum'at Pagi", '05.45 - 06.00 WIB', "Simaan Al-Qur'an Bil-Ghoib", "Live streaming YouTube setiap hari Jum'at pagi untuk menyimak kelancaran hafalan santri."],
    ];
@endphp
<div class="container-fluid py-4 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h2 class="fw-bold text-green text-uppercase">Jadwal Kegiatan</h2>
            <small class="mb-0">Keseharian santri PPATQ RAUDLATUL FALAH</small>
        </div>

        <div class="row g-5">
            <div class="col-lg-7">
                <h4 class="fw-bold text-green mb-1">Kegiatan Harian</h4>
                <p class="jadwal-catatan mb-3">
                    Sekolah MI TQ Raudlatul Falah berlangsung pukul 06.50 - 12.00 WIB, dengan istirahat dan sholat Dzuha pukul 09.20 - 10.00.
                </p>
                <div class="bg-yellow-soft rounded px-3 py-2 mb-4 small fw-semibold">
                    <i class="bi bi-moon-stars me-2"></i>Hari Senin &amp; Kamis wajib puasa sunah
                </div>
                <div class="jadwal-list">
                    @foreach ($harian as [$jam, $kegiatan, $ikon, $jenis])
                        <div class="jadwal-row">
                            <span class="badge-seamless jadwal-jam">{{ $jam }}</span>
                            <span class="jadwal-ikon jadwal-{{ $jenis }}"><i class="bi {{ $ikon }}"></i></span>
                            <span class="jadwal-kegiatan">{{ $kegiatan }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-5">
                <h4 class="fw-bold text-green mb-1">Kegiatan Mingguan</h4>
                <p class="jadwal-catatan mb-4">Kajian kitab dan simaan Al-Qur'an yang disiarkan langsung di YouTube.</p>
                @foreach ($mingguan as [$hari, $jam, $judul, $keterangan])
                    <div class="jadwal-mingguan">
                        <span class="badge-seamless">{{ $hari }}</span>
                        <span class="jadwal-catatan ms-2"><i class="bi bi-clock me-1"></i>{{ $jam }}</span>
                        <h5 class="profil-nama fs-6 mt-2 mb-1">{{ $judul }}</h5>
                        <p class="jadwal-catatan mb-0">{{ $keterangan }}</p>
                    </div>
                @endforeach
                <a class="btn-seamless mt-3" href="https://www.youtube.com/@PPATQTV" target="_blank" rel="noopener">
                    <i class="bi bi-youtube me-1"></i> Buka YouTube PPATQ RF
                </a>
            </div>
        </div>
    </div>
</div>
