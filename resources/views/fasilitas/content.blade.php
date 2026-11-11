@php
    // [ikon (Bootstrap Icons), judul, keterangan]
    $layanan = [
        ['bi-cup-hot', 'Makan 3x Sehari', 'Makanan bergizi seimbang tiga kali sehari dengan menu variatif, halal, dan higienis.'],
        ['bi-basket', 'Cuci Pakaian (Laundry)', 'Pencucian dan perawatan pakaian santri dikelola petugas asrama agar selalu bersih dan rapi.'],
        ['bi-house-heart', 'Gedung Asrama Nyaman', 'Kamar bersih dengan sirkulasi udara baik, didampingi wali asrama/musyrif sepanjang waktu.'],
        ['bi-backpack', 'Kegiatan Kemadrasahan', 'Gedung madrasah representatif, ruang kelas interaktif, perpustakaan, sarana olahraga, dan lingkungan Adiwiyata yang asri.'],
        ['bi-stars', 'Kegiatan Keagamaan 24 Jam', "Masjid untuk sholat lima waktu berjama'ah, halaqah tahfidz, dhuha, tahajud, dan puasa sunnah Senin-Kamis."],
    ];

    // [ikon, judul, keterangan]
    $sudahTermasuk = [
        ['bi-person', 'Baju Muslim', 'Disediakan seragam'],
        ['bi-tag', 'Baju Bermain', 'Kaos & celana santri'],
        ['bi-mortarboard', 'Seragam & Sekolah', 'Perlengkapan madrasah'],
        ['bi-moon', 'Peralatan Tidur', 'Kasur, sprei & bantal'],
        ['bi-droplet', 'Peralatan Mandi', 'Handuk & perlengkapan'],
    ];
@endphp
<div class="mt-5 pt-4">
    <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
        <h2 class="fw-bold text-green text-uppercase">Fasilitas &amp; Layanan</h2>
        <small class="mb-0">Layanan penuh 24 jam untuk gizi, kebersihan, dan kenyamanan santri</small>
    </div>
    <div class="row g-4 justify-content-center">
        @foreach ($layanan as [$ikon, $judul, $keterangan])
            <div class="col-12 col-md-6 col-lg-4">
                <div class="fasilitas-item">
                    <span class="fasilitas-ikon"><i class="bi {{ $ikon }}"></i></span>
                    <div>
                        <h5 class="fasilitas-judul">{{ $judul }}</h5>
                        <p class="fasilitas-teks mb-0">{{ $keterangan }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-5 pt-3">
        <span class="badge-seamless mb-2"><i class="bi bi-check-circle me-1"></i> Kebutuhan Santri Baru</span>
        <h4 class="fw-bold text-green mb-2">Semua Sudah Termasuk</h4>
        <p class="fasilitas-teks mb-4">Santri baru tidak perlu membawa perlengkapan berlebih dari rumah.</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            @foreach ($sudahTermasuk as [$ikon, $judul, $keterangan])
                <div class="termasuk-chip">
                    <i class="bi {{ $ikon }}"></i>
                    <div class="text-start">
                        <div class="termasuk-judul">{{ $judul }}</div>
                        <small class="fasilitas-teks">{{ $keterangan }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
