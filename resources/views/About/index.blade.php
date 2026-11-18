@extends('layout.main_layout')
@section('title')
<title>Seputar PPATQ | Raudlatul Falah</title>
@endsection
@section('description', "Profil lengkap PPATQ Raudlatul Falah: visi dan misi, sambutan pengasuh, metode tahfidz, jadwal kegiatan, 21 buku laporan kontrol, dan 19 materi didik santri.")

@section('header')
<style>
    /* Styling Sub-Menu Bar */
    .about-hero {
        background: linear-gradient(135deg, #0f3d24 0%, #1a5632 60%, #20c997 100%);
        color: #fff;
        padding: 48px 0 32px 0;
        position: relative;
        overflow: hidden;
    }
    .about-hero::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1) 0%, transparent 60%);
        pointer-events: none;
    }
    .about-submenu-wrapper {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(26, 86, 50, 0.12);
        z-index: 1020;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    .about-submenu-pills {
        overflow-x: auto;
        overflow-y: hidden;
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none; /* IE 10+ */
        padding: 4px 0;
        gap: 8px;
    }
    .about-submenu-pills::-webkit-scrollbar {
        display: none; /* Chrome/Safari */
    }
    .about-sub-btn {
        background: #f0f7f3;
        color: #1a5632;
        border: 1px solid #d3e7dc;
        border-radius: 50px;
        padding: 10px 22px;
        font-weight: 600;
        font-size: 0.92rem;
        white-space: nowrap;
        transition: all 0.25s ease;
        display: inline-flex;
        align-items: center;
    }
    .about-sub-btn:hover {
        background: #e1f2e8;
        color: #0f3d24;
        border-color: #a3d9bc;
        transform: translateY(-1px);
    }
    .about-sub-btn.active {
        background: #1a5632 !important;
        color: #ffffff !important;
        border-color: #1a5632 !important;
        box-shadow: 0 4px 12px rgba(26, 86, 50, 0.25);
    }
    .about-sub-btn.active i {
        color: #20c997;
    }

    /* Tab Panes Animation */
    .tab-content > .tab-pane {
        display: none;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }
    .tab-content > .active {
        display: block;
        opacity: 1;
    }

    /* Cards & Elements */
    .hover-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08) !important;
    }
    .hover-zoom:hover {
        transform: scale(1.02);
    }
    .text-justify {
        text-align: justify;
    }
    .icon-circle {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    .text-arabic {
        direction: rtl;
        line-height: 2;
    }
    .hover-bg-light:hover {
        background-color: #eef7f1 !important;
        border-color: #c4e4d1 !important;
    }
    .transition {
        transition: all 0.2s ease;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .about-hero {
            padding: 32px 0 20px 0;
        }
        .about-sub-btn {
            padding: 8px 16px;
            font-size: 0.85rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Header Seputar PPATQ -->
<div class="about-hero text-center position-relative">
    <div class="container position-relative py-3">
        <span class="badge bg-success-subtle text-white border border-white border-opacity-25 px-3 py-1 rounded-pill mb-2 fw-semibold">
            <i class="bi bi-info-circle me-1"></i> Profil Lembaga
        </span>
        <h1 class="display-6 fw-bold mb-2 text-white">Seputar PPATQ Raudlatul Falah</h1>
        <p class="fs-6 opacity-90 mx-auto mb-0" style="max-width: 680px;">
            Mengenal Lebih Dekat Pondok Pesantren Anak-Anak Tahfidzul Qur'an: Visi &amp; Misi, Metode Pembelajaran, Jadwal Santri, Sistem Pelaporan, dan Materi Didik.
        </p>
    </div>
</div>

<!-- Sub Menu Navigation (Pills) -->
@include('About.sub_menu')

<!-- Tab Panes Content -->
<div class="py-4 bg-light">
    <div class="tab-content" id="aboutSubMenuContent">
        <!-- Sub Menu 1: Visi & Misi (termasuk Sekapur Sirih & Temukan Kami) -->
        <div class="tab-pane fade {{ ($activeTab ?? 'visi-misi') === 'visi-misi' ? 'show active' : '' }}" 
             id="pane-visi-misi" 
             role="tabpanel" 
             aria-labelledby="btn-tab-visi-misi">
            @include('About.tab_visi_misi')
        </div>

        <!-- Sub Menu 2: Metode Pembelajaran -->
        <div class="tab-pane fade {{ ($activeTab ?? '') === 'metode' ? 'show active' : '' }}" 
             id="pane-metode" 
             role="tabpanel" 
             aria-labelledby="btn-tab-metode">
            @include('About.tab_metode')
        </div>

        <!-- Sub Menu 3: Jadwal Kegiatan -->
        <div class="tab-pane fade {{ ($activeTab ?? '') === 'jadwal' ? 'show active' : '' }}" 
             id="pane-jadwal" 
             role="tabpanel" 
             aria-labelledby="btn-tab-jadwal">
            @include('About.tab_jadwal')
        </div>

        <!-- Sub Menu 4: Buku Laporan -->
        <div class="tab-pane fade {{ ($activeTab ?? '') === 'laporan' ? 'show active' : '' }}" 
             id="pane-laporan" 
             role="tabpanel" 
             aria-labelledby="btn-tab-laporan">
            @include('About.tab_laporan')
        </div>

        <!-- Sub Menu 5: Materi Didik (Menu Baru) -->
        <div class="tab-pane fade {{ ($activeTab ?? '') === 'materi-didik' ? 'show active' : '' }}" 
             id="pane-materi-didik" 
             role="tabpanel" 
             aria-labelledby="btn-tab-materi-didik">
            @include('About.tab_materi')
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    (function ($) {
        // Tab switching & URL synchronizer
        function activateTab(tabId, pushState) {
            if (!tabId) return;
            var $targetBtn = $('#btn-tab-' + tabId);
            var $targetPane = $('#pane-' + tabId);

            if ($targetBtn.length && $targetPane.length) {
                // Gunakan Bootstrap Tab API jika ada atau manual fallback
                var tabTrigger = new bootstrap.Tab($targetBtn[0]);
                tabTrigger.show();

                // Pastikan tombol scroll ke posisi terlihat pada layar mobile
                var navPills = document.querySelector('.about-submenu-pills');
                if (navPills && $targetBtn[0]) {
                    var btnRect = $targetBtn[0].getBoundingClientRect();
                    var navRect = navPills.getBoundingClientRect();
                    if (btnRect.left < navRect.left || btnRect.right > navRect.right) {
                        $targetBtn[0].scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
                    }
                }

                if (pushState) {
                    var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?tab=' + tabId;
                    window.history.pushState({ tab: tabId }, '', newUrl);
                }
            }
        }

        // Listener klik tombol sub-menu
        $('.about-sub-btn').on('click', function () {
            var tabId = $(this).data('tab');
            if (tabId) {
                var currentQuery = new URLSearchParams(window.location.search).get('tab');
                if (currentQuery !== tabId) {
                    var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?tab=' + tabId;
                    window.history.pushState({ tab: tabId }, '', newUrl);
                }
            }
        });

        // Browser Back / Forward handler
        window.addEventListener('popstate', function (event) {
            var params = new URLSearchParams(window.location.search);
            var tab = params.get('tab') || 'visi-misi';
            activateTab(tab, false);
        });

        // Initial check saat halaman dimuat
        $(document).ready(function () {
            var params = new URLSearchParams(window.location.search);
            var tabQuery = params.get('tab');
            var hash = window.location.hash ? window.location.hash.replace('#', '') : null;
            var targetTab = tabQuery || hash;

            if (targetTab) {
                activateTab(targetTab, false);
            }
        });

        // ==========================
        // Live Filter & Search Materi Didik
        // ==========================
        var activeCategory = 'Semua';
        var searchQuery = '';

        function filterMateri() {
            var $items = $('.materi-item');
            var visibleCount = 0;

            $items.each(function () {
                var itemCat = $(this).data('category');
                var itemTitle = ($(this).data('title') || '').toString().toLowerCase();

                var matchCategory = (activeCategory === 'Semua') || (itemCat === activeCategory);
                var matchSearch = !searchQuery || itemTitle.indexOf(searchQuery) !== -1;

                if (matchCategory && matchSearch) {
                    $(this).removeClass('d-none');
                    visibleCount++;
                } else {
                    $(this).addClass('d-none');
                }
            });

            if (visibleCount === 0) {
                $('#materiEmptyState').removeClass('d-none');
            } else {
                $('#materiEmptyState').addClass('d-none');
            }
        }

        // Filter button click
        $('.filter-materi-btn').on('click', function () {
            $('.filter-materi-btn').removeClass('btn-success').addClass('btn-outline-success');
            $(this).removeClass('btn-outline-success').addClass('btn-success');
            activeCategory = $(this).data('category');
            filterMateri();
        });

        // Search input keyup
        $('#materiSearchInput').on('input', function () {
            searchQuery = ($(this).val() || '').trim().toLowerCase();
            filterMateri();
        });

    })(jQuery);
</script>
@endsection
