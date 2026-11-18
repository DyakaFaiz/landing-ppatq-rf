@php
    $subMenus = [
        [
            'id' => 'visi-misi',
            'title' => 'Visi & Misi',
            'icon' => 'bi-compass',
            'desc' => 'Termasuk Sekapur Sirih & Lokasi',
            'badge' => null,
        ],
        [
            'id' => 'metode',
            'title' => 'Metode Pembelajaran',
            'icon' => 'bi-book-half',
            'desc' => '5 Metode Tahfidz Unggulan',
            'badge' => null,
        ],
        [
            'id' => 'jadwal',
            'title' => 'Jadwal Kegiatan',
            'icon' => 'bi-calendar3',
            'desc' => 'Rutinitas Harian & Mingguan',
            'badge' => null,
        ],
        [
            'id' => 'laporan',
            'title' => 'Buku Laporan',
            'icon' => 'bi-clipboard-check',
            'desc' => '21 Buku Monitoring Santri',
            'badge' => null,
        ],
        [
            'id' => 'materi-didik',
            'title' => 'Materi Didik',
            'icon' => 'bi-mortarboard',
            'desc' => '19 Mata Pelajaran Terpadu',
            'badge' => 'Baru',
        ],
    ];
@endphp

<div class="about-submenu-wrapper sticky-top py-2">
    <div class="container">
        <ul class="nav nav-pills about-submenu-pills justify-content-start justify-content-md-center flex-nowrap" id="aboutSubMenuTab" role="tablist">
            @foreach ($subMenus as $menu)
                @php $isActive = ($activeTab ?? 'visi-misi') === $menu['id']; @endphp
                <li class="nav-item" role="presentation">
                    <button class="nav-link about-sub-btn {{ $isActive ? 'active' : '' }}" 
                            id="btn-tab-{{ $menu['id'] }}" 
                            data-bs-toggle="pill" 
                            data-bs-target="#pane-{{ $menu['id'] }}" 
                            type="button" 
                            role="tab" 
                            aria-controls="pane-{{ $menu['id'] }}" 
                            aria-selected="{{ $isActive ? 'true' : 'false' }}"
                            data-tab="{{ $menu['id'] }}">
                        <i class="bi {{ $menu['icon'] }} me-2"></i>
                        <span class="btn-text">{{ $menu['title'] }}</span>
                        @if ($menu['badge'])
                            <span class="badge bg-warning text-dark ms-1 shadow-sm px-2 py-1">{{ $menu['badge'] }}</span>
                        @endif
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
</div>
