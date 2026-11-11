@extends('layout.main_layout')
@section('title')
<title>Agenda | PPATQ-RF</title>
@endsection
@section('description', "Agenda dan jadwal kegiatan PPATQ Raudlatul Falah, pondok pesantren anak-anak tahfidzul Qur'an di Pati.")
@section('header')
<style>
    .agenda-card {
        background: transparent;
        padding-bottom: 1rem;
        border-bottom: 1px dashed #d1e2d7;
    }
    .agenda-img {
        width: 100%;
        height: 100%;
        min-height: 180px;
        object-fit: cover;
        border-radius: 24px;
        background: linear-gradient(135deg, #f8fcf9 0%, #e8f5ed 100%);
    }
    .agenda-title {
        color: #1a5632;
        font-weight: 800;
    }
    .agenda-desc {
        color: #5c8c6d;
    }
    .badge-seamless {
        display: inline-block;
        background: #e6f4ea;
        color: #198754;
        padding: 6px 14px;
        border-radius: 30px;
        font-weight: 700;
        font-size: 0.85rem;
    }
</style>
@endsection
@section('content')
    @php
        \Carbon\Carbon::setLocale('id');
    @endphp
    <!-- Agenda Start -->
    <div class="container-fluid py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container w-100">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h1 class="h2 fw-bold text-green text-uppercase text-green">Agenda PPATQ</h1>
                <small class="mb-0">Kumpulan Agenda PPATQ RAUDLATUL FALAH</small>
            </div>
            <div class="row">
                @if ($agenda && !$agenda->isEmpty())
                    @foreach ($agenda as $row)
                        @php
                            $mulai = \Carbon\Carbon::parse($row->tanggal_mulai)->translatedFormat('d M Y');
                            $selesai = \Carbon\Carbon::parse($row->tanggal_selesai)->translatedFormat('d M Y');
                        @endphp
                        <div class="col-12 p-2 wow slideInUp" data-wow-delay="0.3s">
                            <div class="agenda-card row g-0">
                                @if (!empty($row->gambar))
                                    <div class="col-md-4">
                                        <img class="agenda-img" loading="lazy" alt="{{ $row->judul }}"
                                            src="https://manajemen.ppatq-rf.id/assets/img/upload/foto_agenda/{{ $row->gambar }}">
                                    </div>
                                @endif
                                <div class="col pt-3 pt-md-0 ps-md-4">
                                    <h4 class="agenda-title mb-3">{{ $row->judul }}</h4>
                                    <span class="badge-seamless mb-3">
                                        <i class="bi bi-calendar2-event"></i>
                                        {{ $mulai }}{{ $selesai !== $mulai ? ' – ' . $selesai : '' }}
                                    </span>
                                    @if (!blank(strip_tags($row->isi_paragraph)))
                                        <div class="agenda-desc">{!! $row->isi_paragraph !!}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center">
                        <small class="text-muted border-bottom">Agenda Kosong</small>
                    </div>
                @endif
            </div>
        </div>

        <div class="d-flex justify-content-center pagination-container">
            {{ $agenda->links() }}
        </div>
    </div>

@endsection
