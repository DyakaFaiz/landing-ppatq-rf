{{-- Tab 2: Metode Pembelajaran --}}
<div class="container py-4">
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 650px;">
        <h2 class="fw-bold text-green text-uppercase">Metode Pembelajaran</h2>
        <small class="text-muted">Metodologi Unggulan Tahfidzul Qur'an untuk Usia Anak di PPATQ-RF</small>
    </div>

    <!-- Intro Card -->
    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 mb-5 bg-white border-start border-4 border-success">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h4 class="fw-bold text-green mb-3">Pendekatan Terstruktur & Ramah Anak</h4>
                <p class="text-secondary fs-6 mb-0 lh-lg text-justify">
                    Pondok Pesantren Anak-Anak Tahfidzul Qur’an (PPATQ) Raudlatul Falah menerapkan metode tahfidz bertahap yang disesuaikan khusus dengan psikologi dan daya serap anak usia dini. Perpaduan antara keteladanan lisan (*talaqqi*), repetisi terarah (*takrir*), dan evaluasi berkala menghasilkan hafalan yang mutqin (kuat), fasih, dan menyenangkan bagi santri.
                </p>
            </div>
            <div class="col-lg-4 text-center mt-3 mt-lg-0">
                <div class="p-3 bg-light rounded-4 border">
                    <span class="d-block display-6 fw-bold text-green">5 Pilar</span>
                    <small class="text-muted fw-semibold">Metode Tahfidz Akseleratif</small>
                </div>
            </div>
        </div>
    </div>

    @php
        $metodes = [
            [
                'step' => '01',
                'title' => 'Musafahah (Talaqqi)',
                'icon' => 'bi-person-lines-fill',
                'summary' => 'Menyimak & Menirukan',
                'desc' => "Metode di mana Ustadz/Ustadzah membaca ayat-ayat Al-Qur'an secara fasih dan jelas, sementara santri mendengarkan dengan seksama lalu menirukan makharijul huruf dan tajwidnya dengan tepat.",
                'tag' => 'Koreksi Lisan',
            ],
            [
                'step' => '02',
                'title' => 'Resitasi (Setoran Baru)',
                'icon' => 'bi-book-fill',
                'summary' => 'Hafalan Mandiri & Setor',
                'desc' => "Santri menghafal beberapa ayat secara mandiri hingga benar-benar mantap. Setelah itu, santri menyetorkan hafalan barunya kepada pengajar untuk diperiksa dan diuji ketepatan serta kelancarannya.",
                'tag' => 'Ziyadah (Penambahan)',
            ],
            [
                'step' => '03',
                'title' => 'Takrir (Muroja\'ah)',
                'icon' => 'bi-arrow-repeat',
                'summary' => 'Pengulangan Rutin',
                'desc' => "Santri mengulang kembali seluruh hafalan lama secara rutin dan terjadwal. Kemudian, membaca kembali hafalan tersebut di hadapan Ustadz/Ustadzah agar ayat-ayat yang telah dihafal tetap terjaga dan kokoh.",
                'tag' => 'Pemantapan Hafalan',
            ],
            [
                'step' => '04',
                'title' => 'Mudarasah (Simaan Antar Santri)',
                'icon' => 'bi-people-fill',
                'summary' => 'Simak Bergantian',
                'desc' => "Proses menyimak hafalan secara berpasangan atau berkelompok antar sesama santri. Dalam praktiknya mencakup Mudarosah Ayatan, Mudarosah Per-Halaman, hingga Mudarosah Per-Seperempat Juz (Rubu').",
                'tag' => 'Kolaborasi Teman Sebaya',
            ],
            [
                'step' => '05',
                'title' => 'Tes & Evaluasi Berkala',
                'icon' => 'bi-clipboard-data-fill',
                'summary' => 'Uji Mutu & Kenaikan Juz',
                'desc' => "Evaluasi berkala untuk menguji mutu ketepatan, kelancaran, fasohah, dan tajwid hafalan santri. Santri diuji langsung oleh Tim Penguji Tahfidz sebelum berhak melanjutkan ke juz berikutnya atau wisuda tasmi'.",
                'tag' => 'Standarisasi Mutu',
            ],
        ];
    @endphp

    <div class="row g-4">
        @foreach ($metodes as $m)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white position-relative hover-card" style="transition: all 0.3s ease;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-success-subtle text-green px-3 py-1 rounded-pill fw-bold">
                            {{ $m['step'] }}
                        </span>
                        <small class="badge bg-light text-secondary border px-2 py-1 rounded-2">{{ $m['tag'] }}</small>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-circle bg-success-subtle text-green p-3 rounded-4 me-3">
                            <i class="bi {{ $m['icon'] }} fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-green mb-0">{{ $m['title'] }}</h5>
                            <small class="text-muted fw-semibold">{{ $m['summary'] }}</small>
                        </div>
                    </div>

                    <p class="text-secondary text-justify fs-6 mb-0 lh-base">
                        {{ $m['desc'] }}
                    </p>
                </div>
            </div>
        @endforeach

        <!-- Kartu Target Capaian -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-white d-flex flex-column justify-content-between" style="background: linear-gradient(135deg, #1a5632 0%, #0d381e 100%);">
                <div>
                    <span class="badge bg-warning text-dark px-3 py-1 rounded-pill fw-bold mb-3">Target Santri</span>
                    <h5 class="fw-bold mb-3 text-white">Target Khatam 30 Juz</h5>
                    <p class="fs-6 opacity-90 text-justify lh-base">
                        Dengan sistem 5 metode di atas, santri anak-anak dibimbing secara bertahap sehingga mampu menyelesaikan hafalan Al-Qur'an 30 Juz secara mutqin dengan tajwid yang fasih sebelum lulus dari jenjang madrasah.
                    </p>
                </div>
                <div class="pt-3 border-top border-white border-opacity-25 mt-3">
                    <span class="small opacity-75"><i class="bi bi-patch-check-fill me-1 text-warning"></i> Mutqin, Fasih, & Berakhlak Qur'ani</span>
                </div>
            </div>
        </div>
    </div>
</div>
