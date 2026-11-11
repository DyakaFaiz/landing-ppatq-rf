@php
    $bukuLaporan = [
        'Buku KBM Tahfidz',
        'Buku Grafik Perkembangan Tahfidz',
        'Buku Laporan Uang Saku Santri',
        'Buku Perkembangan Tahfidz Santri',
        'Buku Laporan Penilaian Perilaku Santri',
        'Buku Laporan Keamanan',
        'Buku Ulangan Harian',
        'Buku Laporan Perlengkapan & Ketertiban',
        'Buku Laporan Bulanan Pendidikan Kemadrasahan',
        'Buku Laporan Kesehatan',
        'Kartu Ijin Sambangan',
        'Kartu Setor Murojaah Hafalan Sambangan',
        'Buku Laporan Deskripsi Extra Malam',
        'Buku Laporan Bimbingan Konseling',
        "Buku Hasil Tasmi' Hafalan Santri",
        "Buku Kumpulan Do'a Harian",
        'Buku Praktek Ubudiyah',
        'Buku Ikhtiyar Calon Khotimin/Khotimat',
        "Buku Laporan Hasil Tahfidzul Qur'an Santri",
        'Buku Raport Kasyfu Darojat',
        'Buku Perkembangan Tahfidz Bin Nadhor',
    ];
@endphp
<div class="container-fluid py-4 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-4">
        <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h2 class="fw-bold text-green text-uppercase">Buku Laporan</h2>
            <small class="mb-0">Sistem monitoring terpadu santri PPATQ RAUDLATUL FALAH</small>
        </div>
        <p class="fasilitas-teks text-center mx-auto mb-3" style="max-width: 640px;">
            {{ count($bukuLaporan) }} buku kontrol dan laporan berkala memantau kemajuan tahfidz, adab, akademik, dan kesehatan setiap santri.
        </p>
        <div class="text-center mb-4">
            <button class="btn-seamless" type="button" data-bs-toggle="collapse" data-bs-target="#daftarLaporan" aria-expanded="false" aria-controls="daftarLaporan">
                <i class="bi bi-journal-text me-1"></i> Lihat daftar buku
            </button>
        </div>
        <div class="collapse" id="daftarLaporan">
            <div class="row gx-4">
                @foreach ($bukuLaporan as $i => $judul)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="laporan-item">
                            <span class="badge-seamless">{{ $i + 1 }}</span>
                            <span>{{ $judul }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
