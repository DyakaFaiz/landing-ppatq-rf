{{-- Tab 4: Buku Laporan --}}
@php
    $bukuGroups = [
        [
            'category' => "Tahfidz & Al-Qur'an",
            'icon' => 'bi-book-half',
            'badge' => 'Tahfidz',
            'items' => [
                ['no' => 1, 'title' => 'Buku KBM Tahfidz', 'desc' => 'Pencatatan aktivitas KBM tahfidz harian bersama ustadz/ustadzah halaqoh.'],
                ['no' => 2, 'title' => 'Buku Grafik Perkembangan Tahfidz', 'desc' => 'Grafik visual pemantauan laju pertambahan ayat dan juz santri per pekan.'],
                ['no' => 4, 'title' => 'Buku Perkembangan Tahfidz Santri', 'desc' => 'Rekam jejak komprehensif kualitas hafalan, kelancaran, dan daya ingat santri.'],
                ['no' => 15, 'title' => "Buku Hasil Tasmi' Hafalan Santri", 'desc' => "Penilaian uji tasmi' hafalan Al-Qur'an bil-ghoib sekali duduk di hadapan dewan penguji."],
                ['no' => 18, 'title' => 'Buku Ikhtiyar Calon Khotimin/Khotimat', 'desc' => 'Bimbingan dan monitoring intensif bagi santri yang mendekati khatam 30 Juz.'],
                ['no' => 19, 'title' => "Buku Laporan Hasil Tahfidzul Qur'an", 'desc' => 'Laporan semesteran resmi capaian tahfidz untuk disampaikan kepada wali santri.'],
                ['no' => 21, 'title' => 'Buku Perkembangan Tahfidz Bin Nadhor', 'desc' => 'Catatan kefasihan dan ketepatan membaca mushaf Al-Qur\'an sebelum masuk tahfidz bil-ghoib.'],
            ],
        ],
        [
            'category' => 'Akademik & Kemadrasahan',
            'icon' => 'bi-mortarboard-fill',
            'badge' => 'Akademik',
            'items' => [
                ['no' => 7, 'title' => 'Buku Ulangan Harian', 'desc' => 'Dokumentasi nilai asesmen harian untuk seluruh mata pelajaran madrasah.'],
                ['no' => 9, 'title' => 'Buku Laporan Bulanan Pendidikan Kemadrasahan', 'desc' => 'Evaluasi bulanan kemajuan belajar kurikulum MI dan kehadiran kelas.'],
                ['no' => 13, 'title' => 'Buku Laporan Deskripsi Extra Malam', 'desc' => 'Pencatatan perkembangan belajar mandiri malam, literasi, dan ekstrakurikuler.'],
                ['no' => 14, 'title' => 'Buku Laporan Bimbingan Konseling (BK)', 'desc' => 'Catatan pendampingan psikologis, adaptasi santri baru, dan motivasi belajar.'],
                ['no' => 20, 'title' => 'Buku Raport Kasyfu Darojat', 'desc' => 'Buku rapor komprehensif merangkum nilai akademis, kepesantrenan, dan kepribadian santri.'],
            ],
        ],
        [
            'category' => 'Karakter, Disiplin & Asrama',
            'icon' => 'bi-shield-check',
            'badge' => 'Kedisiplinan',
            'items' => [
                ['no' => 3, 'title' => 'Buku Laporan Uang Saku Santri', 'desc' => 'Pencatatan mutasi simpanan dan pemakaian uang saku santri secara rapi & amanah.'],
                ['no' => 5, 'title' => 'Buku Laporan Penilaian Perilaku Santri', 'desc' => 'Indikator harian akhlak, adab terhadap guru/teman, dan sopan santun santri.'],
                ['no' => 6, 'title' => 'Buku Laporan Keamanan', 'desc' => 'Laporan ketertiban santri, kepatuhan tata tertib, dan pengawasan area pesantren.'],
                ['no' => 8, 'title' => 'Buku Laporan Perlengkapan & Ketertiban', 'desc' => 'Inventaris barang pribadi santri, kerapian lemari, dan kebersihan kamar tidur.'],
            ],
        ],
        [
            'category' => 'Ubudiyah, Kesehatan & Sambangan',
            'icon' => 'bi-heart-pulse-fill',
            'badge' => 'Pelayanan',
            'items' => [
                ['no' => 10, 'title' => 'Buku Laporan Kesehatan', 'desc' => 'Rekam medis kesehatan berkala santri, riwayat pengobatan, dan perawatan poskestren.'],
                ['no' => 11, 'title' => 'Kartu Ijin Sambangan', 'desc' => 'Pencatatan tertib jadwal izin kunjungan orang tua/wali santri ke pondok.'],
                ['no' => 12, 'title' => 'Kartu Setor Murojaah Hafalan Sambangan', 'desc' => 'Form setor hafalan bersama orang tua sebagai sarana sinergi keluarga dan pesantren.'],
                ['no' => 16, 'title' => "Buku Kumpulan Do'a Harian", 'desc' => 'Panduan doa harian dan wirid yang wajib dihafalkan dan diamalkan santri.'],
                ['no' => 17, 'title' => 'Buku Praktek Ubudiyah', 'desc' => 'Lembar uji kompetensi praktik wudhu, sholat wajib/sunnah, adzan, dan doa berjamaah.'],
            ],
        ],
    ];
@endphp

<div class="container py-4">
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 650px;">
        <h2 class="fw-bold text-green text-uppercase">Buku Laporan Santri</h2>
        <small class="text-muted">Sistem Monitoring Terpadu 21 Instrumen Evaluasi Santri PPATQ-RF</small>
    </div>

    <!-- Intro Card -->
    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 mb-5 bg-white border-start border-4 border-success">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h4 class="fw-bold text-green mb-2">Transparansi & Akuntabilitas Perkembangan Santri</h4>
                <p class="text-secondary fs-6 mb-0 lh-lg text-justify">
                    Untuk memastikan setiap santri berkembang secara optimal baik dari sisi tahfidz, akademik madrasah, kesehatan, hingga adab dan akhlak, PPATQ Raudlatul Falah menerapkan <strong>21 instrumen buku laporan dan kontrol terpadu</strong>. Seluruh proses tercatat secara akurat, terstruktur, dan dilaporkan berkala kepada orang tua/wali santri.
                </p>
            </div>
            <div class="col-lg-4 text-center mt-3 mt-lg-0">
                <div class="p-3 bg-light rounded-4 border">
                    <span class="d-block display-6 fw-bold text-green">21 Buku</span>
                    <small class="text-muted fw-semibold">Instrumen Pengawasan Terpadu</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Grouped Accordion / Grid -->
    <div class="row g-4">
        @foreach ($bukuGroups as $group)
            <div class="col-12 col-lg-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom">
                        <div class="d-flex align-items-center">
                            <div class="icon-circle bg-success-subtle text-green p-2 rounded-3 me-3">
                                <i class="bi {{ $group['icon'] }} fs-5"></i>
                            </div>
                            <h5 class="fw-bold text-green mb-0">{{ $group['category'] }}</h5>
                        </div>
                        <span class="badge bg-light text-secondary border px-2 py-1 rounded-pill small">{{ count($group['items']) }} Buku</span>
                    </div>

                    <div class="d-flex flex-column gap-3">
                        @foreach ($group['items'] as $item)
                            <div class="d-flex align-items-start p-3 rounded-3 border bg-light-subtle hover-bg-light transition">
                                <span class="badge bg-success-subtle text-green rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 32px; height: 32px; font-weight: 700;">
                                    {{ $item['no'] }}
                                </span>
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">{{ $item['title'] }}</h6>
                                    <p class="text-secondary small mb-0 lh-base text-justify">{{ $item['desc'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
