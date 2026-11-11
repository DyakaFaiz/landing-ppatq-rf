@extends('layout.main_layout')
@section('title')
<title>Agenda | PPATQ-RF</title>
@endsection
@section('description', "Agenda dan jadwal kegiatan PPATQ Raudlatul Falah, pondok pesantren anak-anak tahfidzul Qur'an di Pati.")
@section('header')
<style>
    .agenda-item {
        display: flex;
        align-items: flex-start;
        gap: 16px;
        padding: 16px 0;
        border-bottom: 1px dashed #d1e2d7;
    }
    .agenda-tanggal {
        flex: 0 0 64px;
        text-align: center;
        line-height: 1.1;
    }
    .agenda-tanggal strong {
        display: block;
        color: #1a5632;
        font-size: 1.9rem;
        font-weight: 800;
    }
    .agenda-tanggal small {
        color: #5c8c6d;
        font-weight: 700;
        text-transform: uppercase;
    }
    .agenda-isi {
        flex: 1 1 auto;
        min-width: 0;
    }
    .agenda-title {
        margin-bottom: 4px;
        color: #1a5632;
        font-weight: 800;
        font-size: 1.1rem;
    }
    .agenda-rentang {
        color: #198754;
        font-size: 0.85rem;
        font-weight: 600;
    }
    .agenda-desc {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin: 4px 0 0;
        color: #5c8c6d;
    }
    /* Poster tampil dengan rasio aslinya (tidak dipotong), hanya dibatasi ukuran maksimalnya */
    .agenda-status {
        display: inline-block;
        margin-left: 8px;
        padding: 2px 10px;
        border-radius: 30px;
        font-size: 0.75rem;
        font-weight: 700;
        vertical-align: middle;
    }
    .agenda-status.akan { background: #fff3cd; color: #856404; }
    .agenda-status.berlangsung { background: #e6f4ea; color: #198754; }
    .agenda-status.selesai { background: #f1f3f2; color: #6c757d; }
    .agenda-item.selesai .agenda-tanggal,
    .agenda-item.selesai .agenda-title {
        opacity: 0.6;
    }
    .agenda-item.berlangsung .agenda-tanggal strong {
        color: #198754;
    }
    .agenda-aksi {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 6px 16px;
        margin-top: 8px;
        font-size: 0.85rem;
        font-weight: 600;
    }
    .agenda-aksi a,
    .agenda-aksi button {
        padding: 0;
        border: 0;
        background: none;
        color: #198754;
        font: inherit;
        text-decoration: none;
        cursor: pointer;
    }
    .agenda-aksi a:hover,
    .agenda-aksi button:hover {
        color: #1a5632;
        text-decoration: underline;
    }
    /* Saat deskripsi lengkap dibuka, ringkasannya disembunyikan agar isinya tidak tampil dua kali */
    .agenda-isi.terbuka .agenda-desc {
        display: none;
    }
    .agenda-lengkap {
        margin-top: 8px;
        color: #2c3e50;
        overflow-wrap: break-word;
    }
    /* Pengaman: isi agenda tidak pernah bisa diketik, dan elemen internal editor Quill tidak ditampilkan */
    .agenda-lengkap,
    .agenda-lengkap * {
        -webkit-user-modify: read-only;
    }
    /* Pengaman: elemen internal editor Quill tidak pernah ditampilkan */
    .agenda-lengkap .ql-tooltip,
    .agenda-lengkap .ql-clipboard {
        display: none !important;
    }
    .agenda-lengkap img,
    .agenda-lengkap iframe {
        max-width: 100% !important;
        height: auto;
        border-radius: 12px;
    }
    .agenda-img {
        flex: 0 0 auto;
        width: auto;
        height: auto;
        max-width: 140px;
        max-height: 140px;
        border-radius: 16px;
        background: linear-gradient(135deg, #f8fcf9 0%, #e8f5ed 100%);
    }
</style>
@endsection
@section('content')
    @php
        \Carbon\Carbon::setLocale('id');
    @endphp
    <div class="container-fluid py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container" style="max-width: 860px;">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h1 class="h2 fw-bold text-green text-uppercase text-green">Agenda PPATQ</h1>
                <small class="mb-0">Kumpulan Agenda PPATQ RAUDLATUL FALAH</small>
            </div>

            @forelse ($agenda as $row)
                @php
                    $mulai = \Carbon\Carbon::parse($row->tanggal_mulai)->startOfDay();
                    $selesai = \Carbon\Carbon::parse($row->tanggal_selesai)->startOfDay();
                    $ringkas = Str::limit(trim(strip_tags($row->isi_paragraph)), 140);
                    $teksLengkap = trim(strip_tags($row->isi ?? ''));
                    $adaLengkap = mb_strlen($teksLengkap) > mb_strlen($ringkas);

                    // Status dihitung dari tanggal hari ini
                    $hariIni = \Carbon\Carbon::today();
                    if ($hariIni->lt($mulai)) {
                        $status = 'akan';
                        // Lebih dari sebulan ditulis "1 bulan 3 hari lagi"
                        $jarak = $hariIni->diff($mulai);
                        $bagian = array_filter([
                            $jarak->y ? $jarak->y . ' tahun' : null,
                            $jarak->m ? $jarak->m . ' bulan' : null,
                            $jarak->d ? $jarak->d . ' hari' : null,
                        ]);
                        $labelStatus = ($jarak->y === 0 && $jarak->m === 0 && $jarak->d === 1) ? 'Besok' : implode(' ', $bagian) . ' lagi';
                    } elseif ($hariIni->gt($selesai)) {
                        $status = 'selesai';
                        $labelStatus = 'Selesai';
                    } else {
                        $status = 'berlangsung';
                        $labelStatus = 'Berlangsung';
                    }

                    // Tautan Google Calendar (acara seharian; tanggal akhir bersifat eksklusif)
                    $tautanKalender = 'https://calendar.google.com/calendar/render?' . http_build_query([
                        'action' => 'TEMPLATE',
                        'text' => $row->judul,
                        'dates' => $mulai->format('Ymd') . '/' . $selesai->copy()->addDay()->format('Ymd'),
                        'details' => Str::limit($teksLengkap, 300) . "\n\n" . route('agenda'),
                    ]);
                @endphp
                <div class="agenda-item {{ $status }}">
                    <div class="agenda-tanggal">
                        <strong>{{ $mulai->translatedFormat('d') }}</strong>
                        <small>{{ $mulai->translatedFormat('M Y') }}</small>
                    </div>
                    <div class="agenda-isi">
                        <h2 class="agenda-title">{{ $row->judul }}<span class="agenda-status {{ $status }}">{{ $labelStatus }}</span></h2>
                        @if (!$selesai->isSameDay($mulai))
                            <div class="agenda-rentang">s/d {{ $selesai->translatedFormat('d M Y') }}</div>
                        @endif
                        @if ($ringkas !== '')
                            <p class="agenda-desc">{{ $ringkas }}</p>
                        @endif
                        @if ($adaLengkap)
                            <div class="collapse agenda-lengkap" id="agenda-lengkap-{{ $loop->index }}">{!! $row->isi !!}</div>
                        @endif
                        <div class="agenda-aksi">
                            @if ($adaLengkap)
                                <button type="button" class="agenda-lebih" data-bs-toggle="collapse" data-bs-target="#agenda-lengkap-{{ $loop->index }}" aria-expanded="false" aria-controls="agenda-lengkap-{{ $loop->index }}">
                                    <span>Selengkapnya</span> <i class="bi bi-chevron-down"></i>
                                </button>
                            @endif
                            @if ($status !== 'selesai')
                                <a href="{{ $tautanKalender }}" target="_blank" rel="noopener"><i class="bi bi-calendar-plus"></i> Tambah ke kalender</a>
                            @endif
                        </div>
                    </div>
                    @if (!empty($row->gambar))
                        <img class="agenda-img" loading="lazy" alt="{{ $row->judul }}"
                            src="https://manajemen.ppatq-rf.id/assets/img/upload/foto_agenda/{{ $row->gambar }}">
                    @endif
                </div>
            @empty
                <div class="text-center">
                    <small class="text-muted border-bottom">Agenda Kosong</small>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center pagination-container mt-4">
            {{ $agenda->links() }}
        </div>
    </div>

@endsection

@section('script')
<script>
    // Ganti label dan ikon tombol saat deskripsi lengkap dibuka/ditutup
    $('.agenda-lengkap').on('show.bs.collapse hide.bs.collapse', function (e) {
        var terbuka = e.type === 'show';
        $(this).closest('.agenda-isi').toggleClass('terbuka', terbuka);
        var $tombol = $('[data-bs-target="#' + this.id + '"]');
        $tombol.find('span').text(terbuka ? 'Tutup' : 'Selengkapnya');
        $tombol.find('i').toggleClass('bi-chevron-down', !terbuka).toggleClass('bi-chevron-up', terbuka);
    });
</script>
@endsection
