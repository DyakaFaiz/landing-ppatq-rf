{{-- Tab 5: Materi Didik (Menu Baru) --}}
@php
    $materiList = [
        [
            'no' => 1,
            'kode' => 'ALQURAN HADIST',
            'judul' => "Al-Qur'an Hadits",
            'kategori' => 'Keislaman & Qur\'an',
            'icon' => 'bi-book-half',
            'deskripsi' => "Mata pelajaran pokok yang membimbing santri mendalami ayat-ayat suci Al-Qur'an dan hadits-hadits shahih Nabi Muhammad SAW. Santri diajarkan arti perkata, pemahaman pesan-pesan ilahi, serta penerapannya sebagai pedoman hidup generasi qur'ani.",
            'fokus' => ["Kandungan Ayat Pilihan", "Hadits-Hadits Adab & Akhlak", "Terjemah Makna Dasar", "Pengamalan Sunnah Nabawiyah"],
        ],
        [
            'no' => 2,
            'kode' => 'BAHASA INDONESIA',
            'judul' => 'Bahasa Indonesia',
            'kategori' => 'Bahasa & Literasi',
            'icon' => 'bi-chat-left-text-fill',
            'deskripsi' => 'Pengembangan kemampuan berbahasa Indonesia yang baik, benar, dan santun. Menumbuhkan minat baca-tulis (literasi), pemahaman teks sastra maupun non-sastra, serta melatih santri terampil mengungkapkan gagasan secara lisan dan tulisan.',
            'fokus' => ['Literasi Membaca Santri', 'Tata Bahasa Baku & Ejaan', 'Menulis Narasi & Deskripsi', 'Retorika & Percakapan Santun'],
        ],
        [
            'no' => 3,
            'kode' => 'AKHLAK MULIA',
            'judul' => 'Akhlak Mulia & Adab Santri',
            'kategori' => 'Karakter & Adab',
            'icon' => 'bi-heart-pulse-fill',
            'deskripsi' => 'Penanaman budi pekerti luhur dan nilai-nilai kesopanan berlandaskan keteladanan para ulama dan ajaran Islam yang rahmatan lil \'alamin. Membentuk santri cilik yang tawadhu\', berbakti kepada orang tua, hormat kepada guru, dan berkasih sayang sesama.',
            'fokus' => ['Adab Penuntut Ilmu', 'Birrul Walidain (Bakti Orang Tua)', 'Sopan Santun Keseharian', 'Keteladanan Ulama Nusantara'],
        ],
        [
            'no' => 4,
            'kode' => 'NAHWU',
            'judul' => 'Ilmu Nahwu',
            'kategori' => 'Bahasa & Literasi',
            'icon' => 'bi-diagram-3-fill',
            'deskripsi' => 'Kaidah dasar tata bahasa Arab yang diajarkan secara aplikatif dan menyenangkan untuk santri anak-anak. Menjadi kunci awal membuka pemahaman literatur kitab berbahasa Arab serta membantu ketepatan pelafalan ayat suci Al-Qur\'an.',
            'fokus' => ['Struktur Kalimat Arab (Jumlah)', 'Pengenalan Isim, Fi\'il, & Huruf', 'Tanda-tanda I\'rab Sederhana', 'Aplikasi pada Ayat Pendek'],
        ],
        [
            'no' => 5,
            'kode' => 'BAHASA ARAB',
            'judul' => 'Bahasa Arab',
            'kategori' => 'Bahasa & Literasi',
            'icon' => 'bi-translate',
            'deskripsi' => 'Penguasaan percakapan dan kosakata bahasa Arab tematik sebagai bahasa Al-Qur\'an dan bahasa komunikasi umat Islam dunia. Dilatihkan melalui kebiasaan muhadatsah harian di lingkungan pesantren.',
            'fokus' => ['Muhadatsah (Percakapan Harian)', 'Mufrodat Tematik Santri', 'Istima\' (Menyimak Audio Arab)', 'Qira\'ah (Membaca Teks Arab)'],
        ],
        [
            'no' => 6,
            'kode' => 'IPAS',
            'judul' => 'IPAS (Ilmu Pengetahuan Alam & Sosial)',
            'kategori' => 'Sains & Logika',
            'icon' => 'bi-globe-americas',
            'deskripsi' => 'Integrasi sains alam dan pengetahuan sosial yang mengajak santri mengagumi keteraturan ciptaan Allah SWT di alam semesta, memahami ekosistem, serta peka terhadap lingkungan hidup dan interaksi kemasyarakatan.',
            'fokus' => ['Tadabbur Alam & Ciptaan Allah', 'Sains Lingkungan & Ekosistem', 'Mengenal Peta & Masyarakat', 'Eksperimen Sederhana'],
        ],
        [
            'no' => 7,
            'kode' => 'FIQIH TERAPAN',
            'judul' => 'Fikih Terapan & Amaliah',
            'kategori' => 'Keislaman & Syariat',
            'icon' => 'bi-check2-circle',
            'deskripsi' => 'Pendalaman hukum-hukum syariat Islam amaliah bersumber dari kitab-kitab fikih klasik muktabar yang disajikan sesuai tingkatan anak. Menitikberatkan pada pemahaman dalil praktis dan ketertiban menjalankan syariat sehari-hari.',
            'fokus' => ['Thaharah Mendalam (Bersuci)', 'Rukun & Syarat Sholat', 'Hukum Makanan Halal & Thayyib', 'Fikih Ibadah Praktis Santri'],
        ],
        [
            'no' => 8,
            'kode' => 'BAHASA INGGRIS',
            'judul' => 'Bahasa Inggris',
            'kategori' => 'Bahasa & Literasi',
            'icon' => 'bi-chat-dots-fill',
            'deskripsi' => 'Pembekalan bahasa internasional sejak dini melalui metode pembelajaran interaktif, lagu edukatif, dan percakapan santun. Mempersiapkan santri tahfidz yang percaya diri berwawasan global.',
            'fokus' => ['Daily Conversation (Speaking)', 'Vocabulary Building', 'Listening & Storytelling', 'Islamic English Terms'],
        ],
        [
            'no' => 9,
            'kode' => 'AKIDAH AKHLAK',
            'judul' => 'Akidah Akhlak',
            'kategori' => 'Keislaman & Qur\'an',
            'icon' => 'bi-shield-check',
            'deskripsi' => 'Pondasi pembentukan keyakinan tauhid yang bersih serta internalisasi sifat-sifat terpuji (akhlakul karimah). Menjaga anak dari pengaruh pergaulan negatif dan menanamkan rasa takut berbuat dosa (muraqabatullah).',
            'fokus' => ['Rukun Iman & Asmaul Husna', 'Sifat Terpuji & Menjauhi Sifat Tercela', 'Adab Bermasyarakat', 'Kisah Teladan Rasulullah & Sahabat'],
        ],
        [
            'no' => 10,
            'kode' => 'SENI RUPA',
            'judul' => 'Seni Rupa & Kaligrafi',
            'kategori' => 'Kreativitas & Raga',
            'icon' => 'bi-palette-fill',
            'deskripsi' => 'Penyaluran bakat estetika dan motorik halus anak melalui seni kaligrafi Arab (khat), menggambar dekoratif, ilustrasi islami, dan prakarya kreatif yang menumbuhkan rasa cinta pada keindahan ciptaan Ilahi.',
            'fokus' => ['Dasar Khat & Kaligrafi Arab', 'Menggambar Ilustrasi & Warna', 'Prakarya Kreatif Bahan Alam', 'Apresiasi Seni Islami'],
        ],
        [
            'no' => 11,
            'kode' => 'TAUHID',
            'judul' => 'Ilmu Tauhid',
            'kategori' => 'Keislaman & Qur\'an',
            'icon' => 'bi-brightness-high-fill',
            'deskripsi' => 'Penanaman akidah Ahlussunnah wal Jama\'ah sejak dini mengenai sifat-sifat wajib, mustahil, dan jaiz bagi Allah SWT serta para Rasul-Nya. Dihafalkan melalui nadham-nadham aqidah yang mudah diingat santri.',
            'fokus' => ['Sifat 20 Bagi Allah SWT', 'Sifat-sifat Para Rasul', 'Mengenal Kitab-kitab Suci', 'Nadham Aqidatul Awwam'],
        ],
        [
            'no' => 12,
            'kode' => 'BAHASA JAWA',
            'judul' => 'Bahasa Jawa (Muatan Lokal)',
            'kategori' => 'Bahasa & Literasi',
            'icon' => 'bi-flower1',
            'deskripsi' => 'Pelestarian bahasa daerah dan kearifan lokal Jawa dengan penekanan pada unggah-ungguh basa (tatakrama berbahasa krama alus kepada yang lebih tua), pengenalan aksara Jawa, dan pitutur luhur para sesepuh.',
            'fokus' => ['Unggah-Ungguh Basa (Krama)', 'Membaca & Menulis Aksara Jawa', 'Tembang Dolanan Bernilai Nasihat', 'Etika Tata Krama Budaya Jawa'],
        ],
        [
            'no' => 13,
            'kode' => 'SKI',
            'judul' => 'SKI (Sejarah Kebudayaan Islam)',
            'kategori' => 'Keislaman & Qur\'an',
            'icon' => 'bi-hourglass-split',
            'deskripsi' => 'Mempelajari sirah Nabawiyah, perjuangan dakwah Nabi Muhammad SAW di Makkah dan Madinah, kekhalifahan Khulafaur Rasyidin, hingga sejarah masuknya Islam ke Nusantara oleh para Walisongo.',
            'fokus' => ['Sirah Nabawiyah Muhammad SAW', 'Kepemimpinan Sahabat Nabi', 'Peradaban Emas Islam', 'Sejarah Dakwah Walisongo'],
        ],
        [
            'no' => 14,
            'kode' => 'MATEMATIKA',
            'judul' => 'Matematika',
            'kategori' => 'Sains & Logika',
            'icon' => 'bi-calculator-fill',
            'deskripsi' => 'Mengasah ketajaman logika, penalaran analitis, kemampuan berhitung numerik, dan pemecahan masalah melalui soal-soal matematika kontekstual yang aplikatif untuk kehidupan sehari-hari.',
            'fokus' => ['Aritmatika & Hitung Cepat', 'Konsep Pecahan & Desimal', 'Geometri Bangun Datar & Ruang', 'Logika Berpikir & Problem Solving'],
        ],
        [
            'no' => 15,
            'kode' => 'TAJWID',
            'judul' => 'Ilmu Tajwid',
            'kategori' => 'Keislaman & Qur\'an',
            'icon' => 'bi-soundwave',
            'deskripsi' => 'Kaidah menyuarakan setiap huruf Al-Qur\'an dari tempat keluarnya (makharijul huruf) dan memenuhi hak-hak sifat hurufnya. Memastikan bacaan Al-Qur\'an santri tartil, fasih, dan sesuai standar bacaan riwayat Hafsh \'an \'Ashim.',
            'fokus' => ['Makharijul Huruf & Sifatul Huruf', 'Hukum Nun Sukun & Tanwin', 'Hukum Mad & Cabang-cabangnya', 'Kaidah Waqaf & Ibtida\''],
        ],
        [
            'no' => 16,
            'kode' => 'FIKIH',
            'judul' => 'Fikih Madrasah',
            'kategori' => 'Keislaman & Syariat',
            'icon' => 'bi-journal-text',
            'deskripsi' => 'Materi fikih kurikulum standar madrasah yang mengajarkan dasar-dasar syariat Islam, rukun Islam, tata cara sholat fardhu berjamaah, puasa Ramadhan, zakat fitrah, dan pengenalan manasik haji.',
            'fokus' => ['Rukun Islam & Syariat Dasar', 'Sholat Wajib & Jamaah', 'Puasa Ramadhan & Zakat', 'Ketentuan Halal & Haram'],
        ],
        [
            'no' => 17,
            'kode' => 'PENDIDIKAN PANCASILA',
            'judul' => 'Pendidikan Pancasila & Kewarganegaraan',
            'kategori' => 'Karakter & Raga',
            'icon' => 'bi-flag-fill',
            'deskripsi' => 'Membentuk santri yang berjiwa nasionalis, mencintai Negara Kesatuan Republik Indonesia (NKRI), menghargai kebhinnekaan, taat hukum, serta siap berkontribusi positif bagi bangsa dan masyarakat.',
            'fokus' => ['Nilai-Nilai Luhur Pancasila', 'UUD 1945 & Norma Hukum', 'Bhinneka Tunggal Ika & Toleransi', 'Cinta Tanah Air & Gotong Royong'],
        ],
        [
            'no' => 18,
            'kode' => 'PJOK',
            'judul' => 'PJOK (Pendidikan Jasmani, Olahraga & Kesehatan)',
            'kategori' => 'Kreativitas & Raga',
            'icon' => 'bi-trophy-fill',
            'deskripsi' => 'Pembinaan kebugaran jasmani, ketangkasan fisik, pembiasaan pola hidup bersih dan sehat (PHBS), serta penanaman sportivitas melalui aneka cabang olahraga santri.',
            'fokus' => ['Kebugaran Jasmani Santri', 'Olahraga Bola & Atletik Anak', 'Pola Hidup Bersih & Sehat (PHBS)', 'Sportivitas & Kerja Sama Tim'],
        ],
        [
            'no' => 19,
            'kode' => 'UBUDIYAH',
            'judul' => 'Praktik Ubudiyah',
            'kategori' => 'Keislaman & Qur\'an',
            'icon' => 'bi-star-fill',
            'deskripsi' => 'Mata pelajaran praktik langsung ibadah harian santri yang dibimbing asatidz: praktik wudhu sempurna, sholat fardhu & sunnah (Dhuha, Tahajud, Witir), adzan-iqomah, wirid, serta tata cara sholat jenazah.',
            'fokus' => ['Praktik Wudhu & Tayamum Sempurna', 'Praktik Sholat Wajib & Sunnah', 'Adzan, Iqomah & Doa Berjamaah', 'Hafalan Doa Harian & Dzikir'],
        ],
    ];

    $kategoris = [
        'Semua' => 'Semua Materi (19)',
        'Keislaman & Qur\'an' => 'Keislaman & Qur\'an (6)',
        'Keislaman & Syariat' => 'Syariat & Karakter (5)',
        'Bahasa & Literasi' => 'Bahasa & Literasi (5)',
        'Sains & Logika' => 'Sains & Logika (2)',
        'Kreativitas & Raga' => 'Kreativitas & Jasmani (3)',
    ];
@endphp

<div class="container py-4">
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 700px;">
        <div class="d-inline-flex align-items-center bg-success-subtle text-green px-3 py-1 rounded-pill small fw-bold mb-2">
            <i class="bi bi-patch-check-fill me-2"></i>Kurikulum Terpadu Madrasah & Pesantren
        </div>
        <h2 class="fw-bold text-green text-uppercase">Materi Didik Santri</h2>
        <small class="text-muted">19 Mata Pelajaran Komprehensif Memadukan Pendidikan Nasional & Kepesantrenan</small>
    </div>

    <!-- Intro Banner -->
    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 mb-5 bg-white border-start border-4 border-success">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h4 class="fw-bold text-green mb-2">Kurikulum Holistik: Tahfidz, Spiritual & Intelektual</h4>
                <p class="text-secondary fs-6 mb-0 lh-lg text-justify">
                    Pendidikan di PPATQ Raudlatul Falah memadukan kekuatan <strong>Kurikulum Nasional (MI)</strong> dengan <strong>Kurikulum Kepesantrenan Tahfidzul Qur'an</strong>. Setiap santri tidak hanya ditempa menjadi penghafal Al-Qur'an yang mutqin, tetapi juga dibekali penguasaan bahasa, adab mulia, penalaran sains, serta keterampilan hidup untuk masa depannya.
                </p>
            </div>
            <div class="col-lg-4 text-center mt-3 mt-lg-0">
                <div class="p-3 bg-light rounded-4 border">
                    <span class="d-block display-6 fw-bold text-green">19 Mata Pelajaran</span>
                    <small class="text-muted fw-semibold">Kurikulum Terpadu & Teruji</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter & Pencarian Cepat -->
    <div class="card border-0 shadow-sm rounded-4 p-3 mb-4 bg-white">
        <div class="row g-3 align-items-center">
            <div class="col-12 col-md-4">
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-search"></i></span>
                    <input type="text" id="materiSearchInput" class="form-control border-start-0 bg-light" placeholder="Cari mata pelajaran (misal: Nahwu, Fikih, IPAS)...">
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="d-flex flex-wrap gap-2 justify-content-start justify-content-md-end" id="materiFilterButtons">
                    @foreach ($kategoris as $key => $label)
                        <button type="button" class="btn btn-sm {{ $key === 'Semua' ? 'btn-success' : 'btn-outline-success' }} rounded-pill px-3 filter-materi-btn" data-category="{{ $key }}">
                            {{ $label }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Grid 19 Materi Didik -->
    <div class="row g-4" id="materiGrid">
        @foreach ($materiList as $materi)
            <div class="col-12 col-md-6 col-lg-4 materi-item" data-category="{{ $materi['kategori'] }}" data-title="{{ strtolower($materi['judul'] . ' ' . $materi['kode']) }}">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-white hover-card position-relative transition" style="transition: all 0.3s ease;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-success-subtle text-green rounded-pill px-3 py-1 fw-bold fs-6">
                            No. {{ $materi['no'] }}
                        </span>
                        <span class="badge bg-light text-secondary border px-2 py-1 rounded-2 small">
                            {{ $materi['kategori'] }}
                        </span>
                    </div>

                    <div class="d-flex align-items-start mb-3">
                        <div class="icon-circle bg-success-subtle text-green p-3 rounded-4 me-3 flex-shrink-0">
                            <i class="bi {{ $materi['icon'] }} fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-green mb-1">{{ $materi['judul'] }}</h5>
                            <small class="text-muted font-monospace d-block">{{ $materi['kode'] }}</small>
                        </div>
                    </div>

                    <p class="text-secondary small mb-3 lh-base text-justify flex-grow-1">
                        {{ $materi['deskripsi'] }}
                    </p>

                    <div class="pt-3 border-top">
                        <small class="text-muted fw-semibold d-block mb-2" style="font-size: 0.75rem;">FOKUS PEMBELAJARAN:</small>
                        <div class="d-flex flex-wrap gap-1">
                            @foreach ($materi['fokus'] as $f)
                                <span class="badge bg-light text-dark border px-2 py-1 rounded-2" style="font-size: 0.72rem; font-weight: 500;">
                                    <i class="bi bi-check-circle-fill text-success me-1"></i>{{ $f }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Empty State jika pencarian tidak ditemukan -->
    <div id="materiEmptyState" class="text-center py-5 d-none">
        <div class="icon-circle bg-light text-muted p-4 rounded-circle d-inline-block mb-3">
            <i class="bi bi-search fs-1"></i>
        </div>
        <h5 class="text-muted fw-bold">Mata Pelajaran Tidak Ditemukan</h5>
        <p class="text-muted small">Coba cari dengan kata kunci lain atau pilih tombol 'Semua Materi'.</p>
    </div>
</div>
