@extends('kelas-kamar.detail-base', [
    'judul'           => 'Wali ' . $kelasData->nama_kelas,
    'peran'           => 'Wali Kelas',
    'pembimbingNama'  => $kelasData->wali_kelas_nama,
    'pembimbingFoto'  => $kelasData->wali_kelas_photo,
])
@section('title')
    <title>{{ $kelasData->nama_kelas }} | PPATQ-RF</title>
@endsection

@section('santri')
    @foreach ($query as $santri)
        @include('kelas-kamar._kartu-santri', [
            'nama' => $santri->nama,
            'foto' => $santri->fotoSantri,
            'info' => [
                'Kamar'       => $santri->guru_murroby,
                $santri->kelasTahfidz ?? '-',
                'Hafalan'     => $santri->hafalan ?? null,
                'Tempat Asal' => $santri->kecamatan,
            ],
        ])
    @endforeach
@endsection
