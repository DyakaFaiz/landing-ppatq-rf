{{-- Kartu santri. Data: $nama, $foto, $info (array [label => nilai], label boleh kosong) --}}
<div class="col-12 col-md-6 col-lg-4">
    <div class="profil-card d-flex flex-row">
        <div class="col-5 d-flex justify-content-center align-items-center">
            <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/{{ $foto }}"
                class="img-fluid foto-profil"
                alt="foto {{ $nama }}"
                onerror="this.onerror=null; this.src='{{ asset('img/auth-cover-login-mask-light.png') }}';">
        </div>
        <div class="p-1 d-flex flex-column gap-3 col py-2">
            <h5 class="profil-nama fs-6 mb-0 text-center text-uppercase">{{ $nama }}</h5>
            <div class="profil-info">
                @foreach ($info as $label => $nilai)
                    <p class="lh-1 text-sm mb-1">{{ is_string($label) ? $label . ' : ' : '' }}{{ $nilai ?? '-' }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
