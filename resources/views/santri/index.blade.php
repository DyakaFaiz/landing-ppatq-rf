@extends('layout.main_layout')
@section('title')
    <title>Kesantrian | PPATQ-RF</title>
@endsection
@section('robots', 'noindex,follow')
@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .custom-kesantrian-pills {
            background-color: #ffffff;
            border: 1px solid #dbe7df;
            display: inline-flex;
            flex-wrap: wrap;
            gap: 4px;
        }
        .custom-kesantrian-pills .nav-link {
            color: #374151;
            font-weight: 600;
            font-size: 0.92rem;
            padding: 9px 20px;
            border-radius: 50rem !important;
            transition: all 0.25s ease;
            border: 1px solid transparent;
        }
        .custom-kesantrian-pills .nav-link:hover {
            color: #198754;
            background-color: #f0fdf4;
        }
        .custom-kesantrian-pills .nav-link.active {
            color: #ffffff !important;
            background: linear-gradient(135deg, #198754 0%, #157347 100%) !important;
            box-shadow: 0 4px 14px rgba(25, 135, 84, 0.35);
        }
        .custom-kesantrian-pills .nav-link.active i {
            color: #ffffff !important;
        }

        .search-box-wrap {
            position: relative;
            max-width: 440px;
            width: 100%;
            margin: 0 auto;
        }
        .search-box-wrap i.bi-search {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #198754;
            font-size: 1rem;
        }
        .search-box-wrap input {
            width: 100%;
            padding: 11px 40px 11px 46px;
            border: 2px solid #e1ebe4;
            border-radius: 50rem;
            background: #ffffff;
            font-size: 0.92rem;
            color: #2c3e50;
            transition: all 0.25s ease;
        }
        .search-box-wrap input:focus {
            outline: none;
            border-color: #198754;
            box-shadow: 0 0 0 4px rgba(25, 135, 84, 0.12);
            background: #ffffff;
        }
        .search-box-wrap .search-spinner {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            display: none;
        }

        .santri-card {
            background: #ffffff;
            border: 1px solid #e6ede8;
            border-radius: 16px;
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }
        .santri-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 24px rgba(25, 135, 84, 0.1) !important;
            border-color: #bbf7d0;
        }
        .santri-avatar {
            width: 68px;
            height: 68px;
            object-fit: cover;
            border-radius: 14px;
            background: #f1f5f2;
            border: 2px solid #e2ece5;
        }
        .badge-soft-success {
            background-color: #dcfce7;
            color: #15803d;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .badge-soft-primary {
            background-color: #e0f2fe;
            color: #0369a1;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .badge-soft-secondary {
            background-color: #f3f4f6;
            color: #4b5563;
            font-size: 0.75rem;
            font-weight: 500;
        }
        .badge-gold {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: #ffffff;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.3px;
            box-shadow: 0 2px 6px rgba(245, 158, 11, 0.3);
        }
        .text-green-brand {
            color: #1a5632;
        }
        .card-detail-item {
            font-size: 0.83rem;
            line-height: 1.4;
            color: #64748b;
        }
        .card-detail-item i {
            width: 16px;
            flex-shrink: 0;
            margin-right: 6px;
        }
        .pagination-container .pagination {
            justify-content: center;
            gap: 4px;
        }
        .pagination-container .page-item .page-link {
            border-radius: 8px;
            border: 1px solid #dce5df;
            color: #1a5632;
            padding: 6px 14px;
        }
        .pagination-container .page-item.active .page-link {
            background-color: #198754;
            border-color: #198754;
            color: #ffffff;
        }
    </style>
@endsection

@section('content')
    <div class="py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <!-- Header Section -->
            <div class="text-center position-relative pb-2 mb-4 mx-auto" style="max-width: 700px;">
                <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill fw-semibold mb-2">
                    <i class="bi bi-mortarboard me-1"></i> Data Kesantrian
                </span>
                <h1 class="h3 fw-bold text-green-brand text-uppercase mb-2">Informasi Santri &amp; Alumni</h1>
                <p class="text-secondary small mb-0">
                    Pondok Pesantren Anak-anak Tahfidzul Qur'an Raudlatul Falah Pati
                </p>
            </div>

            <!-- Sub-Menu Pills Navigation -->
            <div class="d-flex justify-content-center mb-4">
                <div class="nav nav-pills custom-kesantrian-pills p-1 rounded-pill shadow-sm" id="kesantrianTabs" role="tablist">
                    <button class="nav-link rounded-pill {{ $activeTab === 'santri-aktif' ? 'active' : '' }}" 
                            id="pill-santri-tab" 
                            data-bs-toggle="pill" 
                            data-bs-target="#tab-santri-aktif" 
                            type="button" 
                            role="tab" 
                            data-tab-name="santri-aktif"
                            aria-controls="tab-santri-aktif" 
                            aria-selected="{{ $activeTab === 'santri-aktif' ? 'true' : 'false' }}">
                        <i class="bi bi-people-fill me-1"></i> Santri Aktif
                    </button>
                    <button class="nav-link rounded-pill {{ $activeTab === 'alumni' ? 'active' : '' }}" 
                            id="pill-alumni-tab" 
                            data-bs-toggle="pill" 
                            data-bs-target="#tab-alumni" 
                            type="button" 
                            role="tab" 
                            data-tab-name="alumni"
                            aria-controls="tab-alumni" 
                            aria-selected="{{ $activeTab === 'alumni' ? 'true' : 'false' }}">
                        <i class="bi bi-mortarboard-fill me-1"></i> Alumni
                    </button>
                    <button class="nav-link rounded-pill {{ $activeTab === 'khotimin' ? 'active' : '' }}" 
                            id="pill-khotimin-tab" 
                            data-bs-toggle="pill" 
                            data-bs-target="#tab-khotimin" 
                            type="button" 
                            role="tab" 
                            data-tab-name="khotimin"
                            aria-controls="tab-khotimin" 
                            aria-selected="{{ $activeTab === 'khotimin' ? 'true' : 'false' }}">
                        <i class="bi bi-award-fill me-1 text-warning"></i> Alumni Khotimin
                        <span class="badge bg-warning text-dark ms-1" style="font-size: 0.65rem;">30 Juz</span>
                    </button>
                </div>
            </div>

            <!-- Tab Contents -->
            <div class="tab-content" id="kesantrianTabContent">

                <!-- TAB 1: SANTRI AKTIF -->
                <div class="tab-pane fade {{ $activeTab === 'santri-aktif' ? 'show active' : '' }}" id="tab-santri-aktif" role="tabpanel" aria-labelledby="pill-santri-tab">
                    <!-- Search Bar Santri Aktif -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="search-box-wrap">
                                <i class="bi bi-search"></i>
                                <input type="text" id="searchInputSantri" placeholder="Cari santri aktif (nama, kelas, daerah)..." autocomplete="off">
                                <div class="spinner-border spinner-border-sm text-success search-spinner" id="spinnerSantri" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grid Santri Aktif -->
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3" id="santri-container">
                        @forelse ($santriAktif as $santri)
                            <div class="col">
                                <div class="card santri-card h-100 border p-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="flex-shrink-0">
                                            <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/{{ $santri->photo }}"
                                                 class="santri-avatar"
                                                 alt="{{ $santri->nama }}"
                                                 onerror="this.onerror=null; this.src='{{ asset('img/avatar-siluet.svg') }}';">
                                        </div>
                                        <div class="flex-grow-1 min-w-0">
                                            <h6 class="fw-bold text-green-brand mb-1 text-truncate" title="{{ $santri->nama }}">
                                                {{ $santri->nama }}
                                            </h6>
                                            <div class="d-flex flex-wrap gap-1 align-items-center">
                                                @if (!empty($santri->kelas))
                                                    <span class="badge badge-soft-success rounded-pill">Kelas {{ $santri->kelas }}</span>
                                                @endif
                                                @if (!empty($santri->no_induk))
                                                    <span class="badge badge-soft-secondary rounded-pill">NIS: {{ $santri->no_induk }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-2 border-light-subtle">
                                    <div class="d-flex flex-column gap-1">
                                        @if (!empty($santri->guru_murroby))
                                            <div class="card-detail-item d-flex align-items-center text-truncate">
                                                <i class="bi bi-person-heart text-success"></i>
                                                <span class="text-truncate">Murroby: <strong class="text-dark">{{ $santri->guru_murroby }}</strong></span>
                                            </div>
                                        @endif
                                        @if (!empty($santri->wali_kelas))
                                            <div class="card-detail-item d-flex align-items-center text-truncate">
                                                <i class="bi bi-person-badge text-success"></i>
                                                <span class="text-truncate">Wali Kelas: <strong class="text-dark">{{ $santri->wali_kelas }}</strong></span>
                                            </div>
                                        @endif
                                        @if (!empty($santri->kecamatan))
                                            <div class="card-detail-item d-flex align-items-center text-truncate">
                                                <i class="bi bi-geo-alt text-success"></i>
                                                <span class="text-truncate">Asal: <strong class="text-dark">{{ $santri->kecamatan }}</strong></span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <i class="bi bi-people text-muted fs-1 mb-2 d-block"></i>
                                <p class="text-muted mb-0">Belum ada data yang diinputkan</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination Santri Aktif -->
                    <div class="d-flex justify-content-center pagination-container mt-4" id="paginationSantri">
                        {{ $santriAktif->links() }}
                    </div>
                </div>

                <!-- TAB 2: ALUMNI -->
                <div class="tab-pane fade {{ $activeTab === 'alumni' ? 'show active' : '' }}" id="tab-alumni" role="tabpanel" aria-labelledby="pill-alumni-tab">
                    <!-- Search Bar Alumni -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="search-box-wrap">
                                <i class="bi bi-search"></i>
                                <input type="text" id="searchInputAlumni" placeholder="Cari alumni (nama, tahun lulus, angkatan)..." autocomplete="off">
                                <div class="spinner-border spinner-border-sm text-primary search-spinner" id="spinnerAlumni" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grid Alumni -->
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3" id="alumni-container">
                        @forelse ($santriAlumni as $alumni)
                            <div class="col">
                                <div class="card santri-card h-100 border p-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="flex-shrink-0">
                                            <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/{{ $alumni->photo }}"
                                                 class="santri-avatar"
                                                 alt="{{ $alumni->nama }}"
                                                 onerror="this.onerror=null; this.src='{{ asset('img/avatar-siluet.svg') }}';">
                                        </div>
                                        <div class="flex-grow-1 min-w-0">
                                            <h6 class="fw-bold text-green-brand mb-1 text-truncate" title="{{ $alumni->nama }}">
                                                {{ $alumni->nama }}
                                            </h6>
                                            <div class="d-flex flex-wrap gap-1 align-items-center">
                                                @if (!empty($alumni->tahun_lulus))
                                                    <span class="badge badge-soft-primary rounded-pill">Lulus {{ $alumni->tahun_lulus }}</span>
                                                @endif
                                                @if (!empty($alumni->angkatan))
                                                    <span class="badge badge-soft-secondary rounded-pill">Angkatan {{ $alumni->angkatan }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-2 border-light-subtle">
                                    <div class="d-flex flex-column gap-1">
                                        @if (!empty($alumni->nama_sekolah_menengah_pertama) && $alumni->nama_sekolah_menengah_pertama !== '-')
                                            <div class="card-detail-item d-flex align-items-center text-truncate">
                                                <i class="bi bi-building text-primary"></i>
                                                <span class="text-truncate">Lanjutan: <strong class="text-dark">{{ $alumni->nama_sekolah_menengah_pertama }}</strong></span>
                                            </div>
                                        @elseif (!empty($alumni->nama_pondok_menengah_pertama) && $alumni->nama_pondok_menengah_pertama !== '-')
                                            <div class="card-detail-item d-flex align-items-center text-truncate">
                                                <i class="bi bi-bank text-primary"></i>
                                                <span class="text-truncate">Pondok: <strong class="text-dark">{{ $alumni->nama_pondok_menengah_pertama }}</strong></span>
                                            </div>
                                        @endif
                                        @if (!empty($alumni->kecamatan) && $alumni->kecamatan !== '-')
                                            <div class="card-detail-item d-flex align-items-center text-truncate">
                                                <i class="bi bi-geo-alt text-primary"></i>
                                                <span class="text-truncate">Asal: <strong class="text-dark">{{ $alumni->kecamatan }}</strong></span>
                                            </div>
                                        @endif
                                        @if (!empty($alumni->no_hp) && !str_starts_with($alumni->no_hp, '****'))
                                            <div class="card-detail-item d-flex align-items-center text-truncate">
                                                <i class="bi bi-telephone text-primary"></i>
                                                <span>Kontak: <strong class="text-dark">{{ $alumni->no_hp }}</strong></span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <i class="bi bi-mortarboard text-muted fs-1 mb-2 d-block"></i>
                                <p class="text-muted mb-0">Belum ada data yang diinputkan</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination Alumni -->
                    <div class="d-flex justify-content-center pagination-container mt-4" id="paginationAlumni">
                        {{ $santriAlumni->links() }}
                    </div>
                </div>

                <!-- TAB 3: ALUMNI KHOTIMIN -->
                <div class="tab-pane fade {{ $activeTab === 'khotimin' ? 'show active' : '' }}" id="tab-khotimin" role="tabpanel" aria-labelledby="pill-khotimin-tab">
                    <!-- Search Bar Khotimin -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="search-box-wrap">
                                <i class="bi bi-search"></i>
                                <input type="text" id="searchInputKhotimin" placeholder="Cari alumni khotimin (nama, tahun, keterangan)..." autocomplete="off">
                                <div class="spinner-border spinner-border-sm text-warning search-spinner" id="spinnerKhotimin" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grid Khotimin -->
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3" id="khotimin-container">
                        @forelse ($santriKhotimin as $khotimin)
                            <div class="col">
                                <div class="card santri-card h-100 border p-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="flex-shrink-0">
                                            <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/{{ $khotimin->photo }}"
                                                 class="santri-avatar"
                                                 alt="{{ $khotimin->nama }}"
                                                 onerror="this.onerror=null; this.src='{{ asset('img/avatar-siluet.svg') }}';">
                                        </div>
                                        <div class="flex-grow-1 min-w-0">
                                            <h6 class="fw-bold text-green-brand mb-1 text-truncate" title="{{ $khotimin->nama }}">
                                                {{ $khotimin->nama }}
                                            </h6>
                                            <div class="d-flex flex-wrap gap-1 align-items-center">
                                                <span class="badge badge-gold rounded-pill">
                                                    <i class="bi bi-patch-check-fill me-1"></i>30 Juz
                                                </span>
                                                @if ($khotimin->status_tipe === 'Santri Aktif')
                                                    <span class="badge badge-soft-success rounded-pill">Santri Aktif</span>
                                                @else
                                                    <span class="badge badge-soft-primary rounded-pill">Alumni</span>
                                                @endif
                                                @if (!empty($khotimin->kelas))
                                                    <span class="badge badge-soft-secondary rounded-pill">Kelas {{ $khotimin->kelas }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-2 border-light-subtle">
                                    <div class="d-flex flex-column gap-1">
                                        @if (!empty($khotimin->tanggal_khatam_formatted))
                                            <div class="card-detail-item d-flex align-items-center text-truncate">
                                                <i class="bi bi-calendar-event text-warning"></i>
                                                <span>Tgl Khatam: <strong class="text-dark">{{ $khotimin->tanggal_khatam_formatted }}</strong></span>
                                            </div>
                                        @elseif (!empty($khotimin->tahun_info))
                                            <div class="card-detail-item d-flex align-items-center text-truncate">
                                                <i class="bi bi-calendar-check text-warning"></i>
                                                <span>Tahun Khatam: <strong class="text-dark">{{ $khotimin->tahun_info }}</strong></span>
                                            </div>
                                        @endif
                                        @if (!empty($khotimin->keterangan))
                                            <div class="card-detail-item d-flex align-items-center text-truncate">
                                                <i class="bi bi-journal-check text-success"></i>
                                                <span class="text-truncate">Ket: <strong class="text-dark">{{ $khotimin->keterangan }}</strong></span>
                                            </div>
                                        @endif
                                        @if (!empty($khotimin->kecamatan))
                                            <div class="card-detail-item d-flex align-items-center text-truncate">
                                                <i class="bi bi-geo-alt text-secondary"></i>
                                                <span class="text-truncate">Asal: <strong class="text-dark">{{ $khotimin->kecamatan }}</strong></span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <i class="bi bi-award text-muted fs-1 mb-2 d-block"></i>
                                <p class="text-muted mb-0">Belum ada data yang diinputkan</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination Khotimin -->
                    <div class="d-flex justify-content-center pagination-container mt-4" id="paginationKhotimin">
                        {{ $santriKhotimin->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var defaultAvatar = "{{ asset('img/avatar-siluet.svg') }}";
            var token = $('meta[name="csrf-token"]').attr('content');

            // Tab synchronization with URL (?tab=...)
            $('#kesantrianTabs button[data-bs-toggle="pill"]').on('shown.bs.tab', function(e) {
                var tabName = $(e.target).data('tab-name');
                if (tabName && window.history.replaceState) {
                    var newUrl = window.location.pathname + '?tab=' + encodeURIComponent(tabName);
                    window.history.replaceState({ tab: tabName }, '', newUrl);
                }
            });

            // Handle browser back/forward buttons
            window.addEventListener('popstate', function() {
                var urlParams = new URLSearchParams(window.location.search);
                var tab = urlParams.get('tab') || 'santri-aktif';
                var $targetTab = $('#kesantrianTabs button[data-tab-name="' + tab + '"]');
                if ($targetTab.length) {
                    var pillTrigger = new bootstrap.Tab($targetTab[0]);
                    pillTrigger.show();
                }
            });

            // Template Card Santri Aktif
            function renderSantriCard(s) {
                var photo = s.photo ? ('https://manajemen.ppatq-rf.id/assets/img/upload/photo/' + s.photo) : defaultAvatar;
                var kelasBadge = s.kelas ? `<span class="badge badge-soft-success rounded-pill">Kelas ${s.kelas}</span>` : '';
                var nisBadge = s.no_induk ? `<span class="badge badge-soft-secondary rounded-pill">NIS: ${s.no_induk}</span>` : '';
                
                var murrobyRow = s.guru_murroby ? `
                    <div class="card-detail-item d-flex align-items-center text-truncate">
                        <i class="bi bi-person-heart text-success"></i>
                        <span class="text-truncate">Murroby: <strong class="text-dark">${s.guru_murroby}</strong></span>
                    </div>` : '';

                var waliRow = s.wali_kelas ? `
                    <div class="card-detail-item d-flex align-items-center text-truncate">
                        <i class="bi bi-person-badge text-success"></i>
                        <span class="text-truncate">Wali Kelas: <strong class="text-dark">${s.wali_kelas}</strong></span>
                    </div>` : '';

                var asalRow = s.kecamatan ? `
                    <div class="card-detail-item d-flex align-items-center text-truncate">
                        <i class="bi bi-geo-alt text-success"></i>
                        <span class="text-truncate">Asal: <strong class="text-dark">${s.kecamatan}</strong></span>
                    </div>` : '';

                return `
                <div class="col">
                    <div class="card santri-card h-100 border p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="flex-shrink-0">
                                <img src="${photo}" class="santri-avatar" alt="${s.nama}" onerror="this.onerror=null; this.src='${defaultAvatar}';">
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h6 class="fw-bold text-green-brand mb-1 text-truncate" title="${s.nama}">${s.nama}</h6>
                                <div class="d-flex flex-wrap gap-1 align-items-center">
                                    ${kelasBadge}
                                    ${nisBadge}
                                </div>
                            </div>
                        </div>
                        <hr class="my-2 border-light-subtle">
                        <div class="d-flex flex-column gap-1">
                            ${murrobyRow}
                            ${waliRow}
                            ${asalRow}
                        </div>
                    </div>
                </div>`;
            }

            // Template Card Alumni
            function renderAlumniCard(a) {
                var photo = a.photo ? ('https://manajemen.ppatq-rf.id/assets/img/upload/photo/' + a.photo) : defaultAvatar;
                var lulusBadge = a.tahun_lulus ? `<span class="badge badge-soft-primary rounded-pill">Lulus ${a.tahun_lulus}</span>` : '';
                var angkatanBadge = a.angkatan ? `<span class="badge badge-soft-secondary rounded-pill">Angkatan ${a.angkatan}</span>` : '';

                var sekolahRow = '';
                if (a.nama_sekolah_menengah_pertama && a.nama_sekolah_menengah_pertama !== '-') {
                    sekolahRow = `
                    <div class="card-detail-item d-flex align-items-center text-truncate">
                        <i class="bi bi-building text-primary"></i>
                        <span class="text-truncate">Lanjutan: <strong class="text-dark">${a.nama_sekolah_menengah_pertama}</strong></span>
                    </div>`;
                } else if (a.nama_pondok_menengah_pertama && a.nama_pondok_menengah_pertama !== '-') {
                    sekolahRow = `
                    <div class="card-detail-item d-flex align-items-center text-truncate">
                        <i class="bi bi-bank text-primary"></i>
                        <span class="text-truncate">Pondok: <strong class="text-dark">${a.nama_pondok_menengah_pertama}</strong></span>
                    </div>`;
                }

                var asalRow = (a.kecamatan && a.kecamatan !== '-') ? `
                    <div class="card-detail-item d-flex align-items-center text-truncate">
                        <i class="bi bi-geo-alt text-primary"></i>
                        <span class="text-truncate">Asal: <strong class="text-dark">${a.kecamatan}</strong></span>
                    </div>` : '';

                var kontakRow = (a.no_hp && !a.no_hp.startsWith('****')) ? `
                    <div class="card-detail-item d-flex align-items-center text-truncate">
                        <i class="bi bi-telephone text-primary"></i>
                        <span>Kontak: <strong class="text-dark">${a.no_hp}</strong></span>
                    </div>` : '';

                return `
                <div class="col">
                    <div class="card santri-card h-100 border p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="flex-shrink-0">
                                <img src="${photo}" class="santri-avatar" alt="${a.nama}" onerror="this.onerror=null; this.src='${defaultAvatar}';">
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h6 class="fw-bold text-green-brand mb-1 text-truncate" title="${a.nama}">${a.nama}</h6>
                                <div class="d-flex flex-wrap gap-1 align-items-center">
                                    ${lulusBadge}
                                    ${angkatanBadge}
                                </div>
                            </div>
                        </div>
                        <hr class="my-2 border-light-subtle">
                        <div class="d-flex flex-column gap-1">
                            ${sekolahRow}
                            ${asalRow}
                            ${kontakRow}
                        </div>
                    </div>
                </div>`;
            }

            // Template Card Khotimin
            function renderKhotiminCard(k) {
                var photo = k.photo ? ('https://manajemen.ppatq-rf.id/assets/img/upload/photo/' + k.photo) : defaultAvatar;
                var statusBadge = (k.status_tipe === 'Santri Aktif')
                    ? `<span class="badge badge-soft-success rounded-pill">Santri Aktif</span>`
                    : `<span class="badge badge-soft-primary rounded-pill">Alumni</span>`;
                var kelasBadge = k.kelas ? `<span class="badge badge-soft-secondary rounded-pill">Kelas ${k.kelas}</span>` : '';

                var waktuRow = '';
                if (k.tanggal_khatam_formatted) {
                    waktuRow = `
                    <div class="card-detail-item d-flex align-items-center text-truncate">
                        <i class="bi bi-calendar-event text-warning"></i>
                        <span>Tgl Khatam: <strong class="text-dark">${k.tanggal_khatam_formatted}</strong></span>
                    </div>`;
                } else if (k.tahun_info) {
                    waktuRow = `
                    <div class="card-detail-item d-flex align-items-center text-truncate">
                        <i class="bi bi-calendar-check text-warning"></i>
                        <span>Tahun Khatam: <strong class="text-dark">${k.tahun_info}</strong></span>
                    </div>`;
                }

                var ketRow = k.keterangan ? `
                    <div class="card-detail-item d-flex align-items-center text-truncate">
                        <i class="bi bi-journal-check text-success"></i>
                        <span class="text-truncate">Ket: <strong class="text-dark">${k.keterangan}</strong></span>
                    </div>` : '';

                var asalRow = k.kecamatan ? `
                    <div class="card-detail-item d-flex align-items-center text-truncate">
                        <i class="bi bi-geo-alt text-secondary"></i>
                        <span class="text-truncate">Asal: <strong class="text-dark">${k.kecamatan}</strong></span>
                    </div>` : '';

                return `
                <div class="col">
                    <div class="card santri-card h-100 border p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="flex-shrink-0">
                                <img src="${photo}" class="santri-avatar" alt="${k.nama}" onerror="this.onerror=null; this.src='${defaultAvatar}';">
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <h6 class="fw-bold text-green-brand mb-1 text-truncate" title="${k.nama}">${k.nama}</h6>
                                <div class="d-flex flex-wrap gap-1 align-items-center">
                                    <span class="badge badge-gold rounded-pill">
                                        <i class="bi bi-patch-check-fill me-1"></i>30 Juz
                                    </span>
                                    ${statusBadge}
                                    ${kelasBadge}
                                </div>
                            </div>
                        </div>
                        <hr class="my-2 border-light-subtle">
                        <div class="d-flex flex-column gap-1">
                            ${waktuRow}
                            ${ketRow}
                            ${asalRow}
                        </div>
                    </div>
                </div>`;
            }

            // AJAX Search Santri Aktif
            function fetchSantri(query) {
                $('#spinnerSantri').show();
                $.ajax({
                    url: "{{ route('get_santri') }}",
                    method: "POST",
                    data: { search: query, _token: token },
                    success: function(res) {
                        $('#spinnerSantri').hide();
                        var $container = $('#santri-container').empty();
                        if (!res.data || res.data.length === 0) {
                            $container.append(`
                                <div class="col-12 text-center py-5">
                                    <i class="bi bi-search text-muted fs-1 mb-2 d-block"></i>
                                    <p class="text-muted mb-0">Tidak ditemukan santri aktif dengan kata kunci tersebut.</p>
                                </div>
                            `);
                        } else {
                            $.each(res.data, function(i, item) {
                                $container.append(renderSantriCard(item));
                            });
                        }
                        $('#paginationSantri').empty();
                    },
                    error: function() {
                        $('#spinnerSantri').hide();
                    }
                });
            }

            $('#searchInputSantri').on('input', debounce(function() {
                fetchSantri($(this).val().trim());
            }, 400));

            // AJAX Search Alumni
            function fetchAlumni(query) {
                $('#spinnerAlumni').show();
                $.ajax({
                    url: "{{ route('get_alumni') }}",
                    method: "POST",
                    data: { search: query, _token: token },
                    success: function(res) {
                        $('#spinnerAlumni').hide();
                        var $container = $('#alumni-container').empty();
                        if (!res.data || res.data.length === 0) {
                            $container.append(`
                                <div class="col-12 text-center py-5">
                                    <i class="bi bi-search text-muted fs-1 mb-2 d-block"></i>
                                    <p class="text-muted mb-0">Tidak ditemukan alumni dengan kata kunci tersebut.</p>
                                </div>
                            `);
                        } else {
                            $.each(res.data, function(i, item) {
                                $container.append(renderAlumniCard(item));
                            });
                        }
                        $('#paginationAlumni').empty();
                    },
                    error: function() {
                        $('#spinnerAlumni').hide();
                    }
                });
            }

            $('#searchInputAlumni').on('input', debounce(function() {
                fetchAlumni($(this).val().trim());
            }, 400));

            // AJAX Search Khotimin
            function fetchKhotimin(query) {
                $('#spinnerKhotimin').show();
                $.ajax({
                    url: "{{ route('get_khotimin') }}",
                    method: "POST",
                    data: { search: query, _token: token },
                    success: function(res) {
                        $('#spinnerKhotimin').hide();
                        var $container = $('#khotimin-container').empty();
                        if (!res.data || res.data.length === 0) {
                            $container.append(`
                                <div class="col-12 text-center py-5">
                                    <i class="bi bi-award text-muted fs-1 mb-2 d-block"></i>
                                    <p class="text-muted mb-0">${query ? 'Tidak ditemukan alumni khotimin dengan kata kunci tersebut.' : 'Belum ada data yang diinputkan'}</p>
                                </div>
                            `);
                        } else {
                            $.each(res.data, function(i, item) {
                                $container.append(renderKhotiminCard(item));
                            });
                        }
                        $('#paginationKhotimin').empty();
                    },
                    error: function() {
                        $('#spinnerKhotimin').hide();
                    }
                });
            }

            $('#searchInputKhotimin').on('input', debounce(function() {
                fetchKhotimin($(this).val().trim());
            }, 400));
        });
    </script>
@endsection
