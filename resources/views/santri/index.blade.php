@extends('layout.main_layout')
@section('title')
    <title>Kesantrian | PPATQ-RF</title>
@endsection
@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .search-seamless {
            position: relative;
            width: 100%;
            max-width: 360px;
        }
        .search-seamless i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #20c997;
        }
        .search-seamless input {
            width: 100%;
            padding: 12px 20px 12px 46px;
            border: 2px solid #d1e2d7;
            border-radius: 16px;
            background: transparent;
            color: #2c3e50;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .search-seamless input:focus {
            outline: none;
            border-color: #20c997;
            box-shadow: 0 0 0 4px rgba(32, 201, 151, 0.1);
        }
        .profil-card {
            background: transparent;
            transition: transform 0.3s ease;
        }
        .profil-card:hover {
            transform: translateY(-4px);
        }
        .profil-card .foto-profil {
            border-radius: 24px;
            background: linear-gradient(135deg, #f8fcf9 0%, #e8f5ed 100%);
        }
        .profil-nama {
            color: #1a5632;
            font-weight: 800;
        }
        .profil-info p {
            color: #5c8c6d;
        }
    </style>
@endsection

@section('content')
    <div class="py-4 wow fadeInUp" data-wow-delay="0.1s">

        <div class="px-2">
            <!-- Calon -->
            <div class="row">
                <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                        <h2 class="fw-bold text-green text-uppercase text-green">Calon Santri</h2>
                        <small class="mb-0">Daftar Calon Santri PPATQ RAUDLATUL FALAH</small>
                </div>
            </div>
            <!-- Search Input Calon -->
            <div class="row mb-5">
                    <div class="d-flex justify-content-center px-3">
                    <div class="search-seamless">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchInputCalon" placeholder="Cari Calon" autocomplete="off">
                    </div>
                </div>
            </div>
            <!-- Calon Container -->
            <div class="row d-flex justify-content-center" id="calon-container">
                <!-- Data calon akan ditambahkan melalui JavaScript -->
                @foreach ($santriCalon as $index => $row)
                    @if ($index >= 4)
                        @break
                    @endif
                    <div class="col-md-6 col-12 wow fadeIn mb-4">
                        <div class="profil-card d-flex flex-row">
                            <div class="col-5 d-flex justify-content-center align-items-center">
                                <img src="https://ui-avatars.com/api/?name={{ str_replace(' ', '+', $row->nama) }}" 
                                alt="Avatar {{ $row->nama }}"
                                class="img-fluid foto-profil">
                            </div>
                            <div class="p-1 d-flex flex-column gap-3 col py-2">
                                <h5 class="profil-nama fs-6 mb-0 text-center text-uppercase">{{ $row->nama }}</h5>
                                <ul class="profil-info list-unstyled w-100">
                                    <div class="col">
                                        <div class="col">
                                            <p class="lh-1 text-sm mb-1">
                                                Jenis Kelamin : {{ $row->jenis_kelamin ?? '-' }}
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="lh-1 text-sm mb-1">
                                                Gelombang : {{ $row->namaGelombang ?? '-' }}
                                            </p>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <div class="mt-5 px-2">
            <div class="row">
                <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                        <h2 class="fw-bold text-green text-uppercase text-green">Santri Aktif</h2>
                        <small class="mb-0">Daftar Santri Aktif PPATQ RAUDLATUL FALAH</small>
                </div>
            </div>
            <!-- Search Input Santri Aktif -->
            <div class="row mb-5">
                    <div class="d-flex justify-content-center px-3">
                    <div class="search-seamless">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchInput" placeholder="Cari Santri" autocomplete="off">
                    </div>
                </div>
            </div>

            <!-- Santri Aktif Container -->
            <div class="row d-flex justify-content-center" id="santri-container">
                <!-- Data santri akan ditambahkan melalui JavaScript -->
                @foreach ($santriAktif as $santri)
                    <div class="col-md-7 col-lg-4 wow fadeIn mb-4">
                        <div class="profil-card d-flex flex-row">
                            <div class="col-5 d-flex justify-content-center align-items-center">
                                <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/{{ $santri->photo }}"
                                    class="img-fluid foto-profil"
                                    alt="foto profil {{ $santri->nama }}">
                            </div>
                            <div class="p-1 d-flex flex-column gap-3 col py-2">
                                <h5 class="profil-nama fs-6 mb-0 text-center text-uppercase">{{ $santri->nama }}</h5>
                                <ul class="profil-info list-unstyled w-100">
                                    <div class="col">
                                        <div class="col">
                                            <p class="lh-1 text-sm mb-1 text-uppercase">
                                                Kelas : {{ $santri->kelas ?? '-' }}
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="lh-1 text-sm mb-1">
                                                Murroby : {{ $santri->guru_murroby ?? '-' }}
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="lh-1 text-sm">
                                                Wali Kelas : {{ $santri->wali_kelas ?? '-' }}
                                            </p>
                                        </div>
                                    </div>

                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-5 px-2">
            <!-- Alumni -->
            <div class="row">
                <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                        <h2 class="fw-bold text-green text-uppercase text-green">Alumni</h2>
                        <small class="mb-0">Daftar Alumni PPATQ RAUDLATUL FALAH</small>
                </div>
            </div>
            <!-- Search Input Alumni -->
            <div class="row mb-5">
                    <div class="d-flex justify-content-center px-3">
                    <div class="search-seamless">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchInputAlumni" placeholder="Cari Alumni" autocomplete="off">
                    </div>
                </div>
            </div>
            <!-- Alumni Container -->
            <div class="row d-flex justify-content-center" id="alumni-container">
                <!-- Data alumni akan ditambahkan melalui JavaScript -->
                @foreach ($santriAlumni as $index => $row)
                    @if ($index >= 4)
                        @break
                    @endif
                    <div class="col-md-6 col-12 wow fadeIn mb-4">
                        <div class="profil-card d-flex flex-row">
                            <div class="col-5 d-flex justify-content-center align-items-center">
                                <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/{{ $row->photo }}"
                                    class="img-fluid foto-profil"
                                    alt="foto profil {{ $row->nama }}">
                            </div>
                            <div class="p-1 d-flex flex-column gap-3 col py-2">
                                <h5 class="profil-nama fs-6 mb-0 text-center text-uppercase">{{ $row->nama }}</h5>
                                <ul class="profil-info list-unstyled w-100">
                                    <div class="col">
                                        <div class="col">
                                            <p class="lh-1 text-sm mb-1">
                                                Tahun Angkatan : {{ $row->angkatan ?? '-' }}
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="lh-1 text-sm mb-1">
                                                Tahun Lulus : {{ $row->tahun_lulus ?? '-' }}
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="lh-1 text-sm mb-1">
                                                Tingkat Masuk MI : {{ $row->tahun_msk_mi ?? '-' }}
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="lh-1 text-sm mb-1">
                                                Nama Pondok MI : {{ $row->nama_pondok_mi ?? '-' }}
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="lh-1 text-sm mb-1">
                                                Tahun Masuk Pondok MI : {{ $row->tahun_msk_pondok_mi ?? '-' }}
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="lh-1 text-sm mb-1">
                                                Tahun Masuk Sekolah Menengah Pertama : {{ $row->thn_msk_menengah ?? '-' }}
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="lh-1 text-sm mb-1">
                                                Nama Sekolah Menengah Pertama : {{ $row->nama_sekolah_menengah_pertama ?? '-' }}
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="lh-1 text-sm mb-1">
                                                Nama Pondok Menengah Pertama : {{ $row->nama_pondok_menengah_pertama ?? '-' }}
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="lh-1 text-sm mb-1">
                                                Tahun Masuk Menengah Atas : {{ $row->tahun_msk_menengah_atas ?? '-' }}
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="lh-1 text-sm mb-1">
                                                Nama Sekolah Menengah Atas : {{ $row->nama_menengah_atas ?? '-' }}
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="lh-1 text-sm mb-1">
                                                Nama Pondok Menengah Atas : {{ $row->nama_pondok_menengah_atas ?? '-' }}
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="lh-1 text-sm">
                                                No HP : {{ $row->no_hp ?? '-' }}
                                            </p>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Pagination Santri Alumni-->
                <div class="d-flex justify-content-center pagination-container mt-5">
                    <!-- Pagination -->
                    {{ $santriAlumni->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            function fetchSantri(query) {
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('get_santri') }}",
                    method: "POST",
                    data: {
                        search: query, // Ubah search menjadi query
                        _token: _token
                    },
                    success: function(data) {
                        $('#santri-container').empty(); // Kosongkan tabel sebelum menambahkan data baru
                        // Iterasi setiap santri dan tambahkan ke tabel
                        $.each(data.data, function(index, santri) {
                            $('#santri-container').append(`
                            <div class="col-md-7 col-lg-4 wow fadeIn mb-4">
                            <div class="profil-card d-flex flex-row">
                                <div class="col-5 d-flex justify-content-center align-items-center">
                                    <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/${ santri.photo }"
                                        class="img-fluid foto-profil"
                                        alt="foto profil ${ santri.nama }">
                                </div>
                                <div class="p-1 d-flex flex-column gap-3 col py-2">
                                    <h5 class="profil-nama fs-6 mb-0 text-center text-uppercase">${ santri.nama }</h5>
                                    <ul class="profil-info list-unstyled w-100">
                                        <div class="col">
                                            <div class="col">
                                                <p class="lh-1 text-sm mb-1 text-uppercase">
                                                    Kelas : ${ santri.kelas ?? '-' }
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="lh-1 text-sm mb-1">
                                                    Murroby : ${ santri.guru_murroby ?? '-' }
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="lh-1 text-sm">
                                                    Wali Kelas : ${ santri.wali_kelas ?? '-' }
                                                </p>
                                            </div>
                                        </div>
        
                                    </ul>
                                </div>
                            </div>
                        </div>    
                            `);
                        });
                        // Menambahkan pagination
                        $('.pagination-container').html(data.links);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Listen for input on #searchInput (debounce 500ms)
            $('#searchInput').on('input', debounce(function() {
                fetchSantri($(this).val());
            }, 500));

            function fetchAlumni(query) 
            {
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('get_alumni') }}",
                    method: "POST",
                    data: {
                        search: query, // Ubah search menjadi query
                        _token: _token
                    },
                    success: function(data) {
                        $('#alumni-container').empty();
                        $.each(data.data, function(index, alumni) {
                            $('#alumni-container').append(`
                            <div class="col-md-6 col-12 wow fadeIn mb-4">
                                <div class="profil-card d-flex flex-row">
                                    <div class="col-5 d-flex justify-content-center align-items-center">
                                        <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/${ alumni.photo }"
                                            class="img-fluid foto-profil"
                                            alt="foto profil ${ alumni.nama }">
                                    </div>
                                    <div class="p-1 d-flex flex-column gap-3 col py-2">
                                        <h5 class="profil-nama fs-6 mb-0 text-center text-uppercase">${ alumni.nama }</h5>
                                        <ul class="profil-info list-unstyled w-100">
                                            <div class="col">
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Tahun Angkatan : ${ alumni.angkatan ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Tahun Lulus : ${ alumni.tahun_lulus ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Tingkat Masuk MI : ${ alumni.tahun_msk_mi ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Nama Pondok MI : ${ alumni.nama_pondok_mi ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Tahun Masuk Pondok MI : ${ alumni.tahun_msk_pondok_mi ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Tahun Masuk Sekolah Menengah Pertama : ${ alumni.thn_msk_menengah ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Nama Sekolah Menengah Pertama : ${ alumni.nama_sekolah_menengah_pertama ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Nama Pondok Menengah Pertama : ${ alumni.nama_pondok_menengah_pertama ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Tahun Masuk Menengah Atas : ${ alumni.tahun_msk_menengah_atas ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Nama Sekolah Menengah Atas : ${ alumni.nama_menengah_atas ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Nama Pondok Menengah Atas : ${ alumni.nama_pondok_menengah_atas ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm">
                                                        No HP : ${ alumni.no_hp ?? '-' }
                                                    </p>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>  
                            `);
                        });
                        // Menambahkan pagination
                        $('.pagination-container-alumni').html(data.links);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            $('#searchInputAlumni').on('input', debounce(function() {
                fetchAlumni($(this).val());
            }, 500));

            function fetchCalon(query) 
            {
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('get_calon_santri') }}",
                    method: "POST",
                    data: {
                        search: query, // Ubah search menjadi query
                        _token: _token
                    },
                    success: function(data) {
                        $('#calon-container').empty();
                        $.each(data.data, function(index, calon) {
                            $('#calon-container').append(`
                            <div class="col-md-6 col-12 wow fadeIn mb-4">
                                <div class="profil-card d-flex flex-row">
                                    <div class="col-5 d-flex justify-content-center align-items-center">
                                        <img src="https://ui-avatars.com/api/?name=${ calon.nama.replace(/ /g, '+') }" 
                                        alt="Avatar ${ calon.nama }"
                                        class="img-fluid foto-profil">
                                    </div>
                                    <div class="p-1 d-flex flex-column gap-3 col py-2">
                                        <h5 class="profil-nama fs-6 mb-0 text-center text-uppercase">${ calon.nama }</h5>
                                        <ul class="profil-info list-unstyled w-100">
                                            <div class="col">
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Jenis Kelamin : ${ calon.jenis_kelamin ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Gelombang : ${ calon.namaGelombang ?? '-' }
                                                    </p>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div> 
                            `);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            $('#searchInputCalon').on('input', debounce(function() {
                fetchCalon($(this).val());
            }, 500));
        });
    </script>
@endsection
