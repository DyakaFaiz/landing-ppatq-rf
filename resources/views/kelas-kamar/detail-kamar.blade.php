@extends('kelas-kamar.detail-base', [
    'judul'           => 'Murroby Kamar ' . $dataKamar->nama_kamar,
    'peran'           => 'Murroby',
    'pembimbingNama'  => $dataKamar->nama_murroby,
    'pembimbingFoto'  => $dataKamar->foto_murroby,
])
@section('title')
    <title>Kamar {{ $dataKamar->nama_kamar }} | PPATQ-RF</title>
@endsection

@section('santri')
    @foreach ($query as $santri)
        @include('kelas-kamar._kartu-santri', [
            'nama' => $santri->namaSantri,
            'foto' => $santri->fotoSantri,
            'info' => [
                'Kelas'       => $santri->kelasSantri,
                $santri->kelasTahfidz ?? '-',
                'Tempat Asal' => $santri->asalSantri,
            ],
        ])
    @endforeach
@endsection
