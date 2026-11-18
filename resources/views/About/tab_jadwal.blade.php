{{-- Tab 3: Jadwal Kegiatan --}}
@php
    $harian = [
        ['04.00 - 04.20', 'Bangun tidur langsung mandi', 'bi-droplet-fill', 'bersih'],
        ['04.20 - 04.35', "Sholat Shubuh berjama'ah", 'bi-stars', 'ibadah'],
        ['04.35 - 06.15', 'Jam Wajib Tahfidz Pagi', 'bi-book-half', 'tahfidz'],
        ['06.30 - 06.50', 'Istirahat, Makan Pagi, Persiapan Sekolah MI', 'bi-cup-hot-fill', 'istirahat'],
        ['06.50 - 09.20', 'Jam Wajib Sekolah MI (Sesi 1)', 'bi-backpack-fill', 'sekolah'],
        ['09.20 - 10.00', 'Istirahat & Sholat Dhuha Berjamaah', 'bi-sun-fill', 'ibadah'],
        ['10.00 - 12.00', 'Jam Wajib Sekolah MI (Sesi 2)', 'bi-backpack-fill', 'sekolah'],
        ['12.00 - 12.15', "Sholat Dzuhur berjama'ah", 'bi-stars', 'ibadah'],
        ['12.15 - 13.00', 'Istirahat dan Makan Siang Bersama', 'bi-cup-hot-fill', 'istirahat'],
        ['13.00 - 14.30', 'Jam Wajib Qoilulah (Tidur Siang)', 'bi-moon-stars-fill', 'tidur'],
        ['14.30 - 15.00', 'Bangun tidur & Mandi Sore', 'bi-droplet-fill', 'bersih'],
        ['15.00 - 15.30', "Sholat Ashar berjama'ah", 'bi-stars', 'ibadah'],
        ['15.30 - 17.00', 'Jam Wajib Tahfidz Sore', 'bi-book-half', 'tahfidz'],
        ['17.00 - 18.00', 'Jam Istirahat, Makan Sore & Olahraga/Bermain', 'bi-emoji-smile-fill', 'istirahat'],
        ['18.00 - 18.20', "Sholat Maghrib berjama'ah", 'bi-stars', 'ibadah'],
        ['18.20 - 19.00', 'Jam Wajib Tahfidz Maghrib', 'bi-book-half', 'tahfidz'],
        ['19.00 - 19.20', "Sholat Isya' berjama'ah", 'bi-stars', 'ibadah'],
        ['19.20 - 20.15', 'Jam Wajib Tahfidz Malam', 'bi-book-half', 'tahfidz'],
        ['20.15 - 21.10', 'Jam Wajib Belajar Mandiri & Ekstrakurikuler', 'bi-pencil-fill', 'belajar'],
        ['21.10 - 04.00', 'Istirahat, Tidur Malam & Bangun Sholat Tahajud', 'bi-moon-fill', 'tidur'],
    ];

    $mingguan = [
        [
            'hari' => 'Kamis Pagi',
            'jam' => '06.50 - 07.35 WIB',
            'judul' => 'Ngaji Kitab Bersama Abah Shokhib',
            'desc' => 'Kajian kitab kuning disiarkan langsung melalui Live Streaming YouTube, diikuti oleh seluruh santri dan dewan asatidz.',
            'icon' => 'bi-broadcast',
        ],
        [
            'hari' => "Jum'at Pagi",
            'jam' => '05.45 - 06.00 WIB',
            'judul' => "Simaan Al-Qur'an Bil-Ghoib",
            'desc' => "Live streaming simaan hafalan Al-Qur'an santri tanpa melihat mushaf untuk menguji kelancaran dan kepercayaan diri santri.",
            'icon' => 'bi-soundwave',
        ],
    ];
@endphp

<div class="container py-4">
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 650px;">
        <h2 class="fw-bold text-green text-uppercase">Jadwal Kegiatan Santri</h2>
        <small class="text-muted">Ritme Kehidupan Sehari-hari yang Disiplin, Seimbang & Penuh Berkah</small>
    </div>

    <div class="row g-4">
        <!-- Kolom Kegiatan Harian -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-4 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                    <div>
                        <h4 class="fw-bold text-green mb-0">Rutinitas Harian (24 Jam)</h4>
                        <small class="text-muted">Jadwal ibadah, tahfidz, sekolah, dan istirahat</small>
                    </div>
                    <span class="badge bg-success-subtle text-green px-3 py-2 rounded-pill fw-bold">Harian</span>
                </div>

                <div class="alert alert-warning border-0 rounded-3 d-flex align-items-center py-2 px-3 mb-3 small fw-semibold">
                    <i class="bi bi-moon-stars-fill text-warning me-2 fs-5"></i>
                    <span>Hari <strong>Senin &amp; Kamis</strong>: Santri wajib menjalankan puasa sunnah.</span>
                </div>

                <div class="jadwal-list-container" style="max-height: 650px; overflow-y: auto; padding-right: 6px;">
                    @foreach ($harian as [$jam, $kegiatan, $ikon, $jenis])
                        <div class="d-flex align-items-center p-2 mb-2 rounded-3 border bg-light-subtle hover-bg-light transition">
                            <span class="badge bg-success-subtle text-green font-monospace fw-bold px-2 py-1 me-3" style="min-width: 105px; font-size: 0.85rem;">
                                {{ $jam }}
                            </span>
                            <div class="jadwal-ikon-circle me-3 text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; background: #198754;">
                                <i class="bi {{ $ikon }} small"></i>
                            </div>
                            <span class="text-dark fw-medium fs-6">{{ $kegiatan }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Kolom Kegiatan Mingguan & Live Stream -->
        <div class="col-lg-5">
            <div class="d-flex flex-column gap-4">
                <!-- Card Mingguan -->
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                        <div>
                            <h4 class="fw-bold text-green mb-0">Kegiatan Mingguan</h4>
                            <small class="text-muted">Agenda rutin setiap pekan</small>
                        </div>
                        <span class="badge bg-warning-subtle text-warning-emphasis px-3 py-2 rounded-pill fw-bold">Mingguan</span>
                    </div>

                    @foreach ($mingguan as $mg)
                        <div class="p-3 rounded-4 mb-3 border bg-light">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="badge bg-success text-white px-2 py-1 rounded-pill small">{{ $mg['hari'] }}</span>
                                <small class="text-muted fw-semibold"><i class="bi bi-clock me-1"></i>{{ $mg['jam'] }}</small>
                            </div>
                            <h6 class="fw-bold text-green mb-1">{{ $mg['judul'] }}</h6>
                            <p class="text-secondary small mb-0 lh-base text-justify">{{ $mg['desc'] }}</p>
                        </div>
                    @endforeach
                </div>

                <!-- Card Live Streaming YouTube -->
                <div class="card border-0 shadow-sm rounded-4 p-4 text-white" style="background: linear-gradient(135deg, #c4302b 0%, #8b0000 100%);">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-youtube display-6 me-3"></i>
                        <div>
                            <h5 class="fw-bold mb-0 text-white">PPATQ TV Channel</h5>
                            <small class="opacity-75">Saksikan siaran langsung kegiatan santri</small>
                        </div>
                    </div>
                    <p class="small opacity-90 mb-3 lh-base text-justify">
                        Seluruh wali santri dan masyarakat dapat menyimak perkembangan santri secara langsung melalui channel resmi YouTube PPATQ RF.
                    </p>
                    <a href="https://www.youtube.com/@PPATQTV" target="_blank" rel="noopener" class="btn btn-light text-danger fw-bold rounded-pill py-2 w-100 shadow-sm">
                        <i class="bi bi-play-circle-fill me-2"></i>Kunjungi Channel YouTube
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
