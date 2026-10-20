@extends('layout.main_layout')
@section('title')
    <title>Pengasuh & Staff | PPATQ-RF</title>
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
        .btn-seamless {
            background: linear-gradient(135deg, #198754, #20c997);
            color: #fff;
            border: 0;
            border-radius: 16px;
            padding: 10px 24px;
            font-weight: 600;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 10px 20px rgba(32, 201, 151, 0.2);
        }
        .btn-seamless:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 15px 25px rgba(32, 201, 151, 0.3);
        }
    </style>
@endsection

@section('content')
    @php
        $kelompok = [
            'ustad'   => ['judul' => 'Ustad/Ustadzah', 'label' => 'Ustad',   'route' => 'get_ustad'],
            'murroby' => ['judul' => 'Murroby',        'label' => 'Murroby', 'route' => 'get_murroby'],
            'staff'   => ['judul' => 'Staff',          'label' => 'Staff',   'route' => 'get_staff'],
        ];
    @endphp
    <div class="py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="px-2">
            @foreach ($kelompok as $key => $item)
                <section class="mb-5">
                    <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                        <h2 class="fw-bold text-green text-uppercase">{{ $item['judul'] }}</h2>
                        <small class="mb-0">Daftar {{ $item['judul'] }} PPATQ RAUDLATUL FALAH</small>
                    </div>
                    <div class="d-flex justify-content-center px-3 mb-5">
                        <div class="search-seamless">
                            <i class="fas fa-search"></i>
                            <input type="text" id="search-{{ $key }}" placeholder="Cari {{ $item['label'] }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center" id="{{ $key }}-container">
                        <!-- Data {{ $item['label'] }} akan ditambahkan melalui JavaScript -->
                    </div>
                    <div class="text-center mt-3">
                        <button id="load-more-{{ $key }}" class="btn-seamless d-none">Muat {{ $item['label'] }} Lagi</button>
                    </div>
                </section>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var PER_PAGE = 4; // Jumlah kartu per klik "Muat Lagi"
            var FOTO_URL = 'https://manajemen.ppatq-rf.id/assets/img/upload/photo/';
            var _token = $('meta[name="csrf-token"]').attr('content');

            function esc(teks) {
                return $('<div>').text(teks == null ? '' : teks).html().replace(/"/g, '&quot;');
            }

            function pesan(teks) {
                return '<div class="col-12 text-center"><small class="text-muted border-bottom">' + esc(teks) + '</small></div>';
            }

            function kartu(orang) {
                var avatar = 'https://ui-avatars.com/api/?name=' + encodeURIComponent(orang.nama);
                var foto = orang.photo ? FOTO_URL + orang.photo : avatar;
                return `
                    <div class="col-md-3 col-12 wow fadeIn mb-4">
                        <div class="profil-card text-center d-flex flex-column justify-content-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="${ esc(foto) }" class="img-fluid foto-profil" alt="foto ${ esc(orang.nama) }"
                                    onerror="this.onerror=null; this.src='${ esc(avatar) }';">
                            </div>
                            <div class="p-1 d-flex flex-column gap-3 py-2">
                                <h5 class="profil-nama fs-6 mb-0 text-uppercase">${ esc(orang.nama) } ${ orang.alhafidz == 1 ? '<sup>AH</sup>' : '' }</h5>
                            </div>
                        </div>
                    </div>`;
            }

            // Satu kelompok = kontainer kartu + tombol "Muat Lagi" + kolom pencarian
            function initKelompok(key, url, label) {
                var $container = $('#' + key + '-container');
                var $loadMore = $('#load-more-' + key);
                var data = [];
                var shown = 0;

                function render() {
                    var batas = Math.min(shown + PER_PAGE, data.length);
                    for (; shown < batas; shown++) {
                        $container.append(kartu(data[shown]));
                    }
                    $loadMore.toggleClass('d-none', shown >= data.length);
                }

                function kosong(query) {
                    $loadMore.addClass('d-none');
                    $container.html(pesan(query
                        ? 'Data ' + label + ' "' + query + '" tidak ditemukan'
                        : 'Data ' + label + ' belum tersedia'));
                }

                function fetch(query) {
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: { search: query, _token: _token },
                        success: function(hasil) {
                            data = hasil;
                            shown = 0;
                            $container.empty();
                            if (data.length) {
                                render();
                            } else {
                                kosong(query);
                            }
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                            data = [];
                            $loadMore.addClass('d-none');
                            $container.html(pesan('Gagal memuat data ' + label + '. Silakan coba lagi.'));
                        }
                    });
                }

                $loadMore.on('click', render);
                $('#search-' + key).on('input', debounce(function() {
                    fetch($(this).val());
                }, 500));
                fetch('');
            }

            @foreach ($kelompok as $key => $item)
                initKelompok('{{ $key }}', "{{ route($item['route']) }}", @json($item['label']));
            @endforeach
        });
    </script>
@endsection
