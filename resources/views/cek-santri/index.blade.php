@extends('layout.main_layout')

@section('title')
    <title>Cek Santri - PPATQ Raudlatul Falah</title>
@endsection
@section('robots', 'noindex,follow')

@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <style>
        .seamless-container {
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .seamless-card {
            border-radius: 24px;
            overflow: hidden;
        }
        .seamless-header {
            background: linear-gradient(135deg, #f8fcf9 0%, #e8f5ed 100%);
            padding: 40px 30px;
            text-align: center;
        }
        .seamless-header h3 {
            color: #1a5632;
            font-weight: 800;
            margin-bottom: 10px;
        }
        .seamless-header p {
            color: #5c8c6d;
            margin: 0;
            font-size: 1.1rem;
        }
        .seamless-body {
            padding: 40px 30px;
        }
        .form-floating-custom {
            position: relative;
            margin-bottom: 1.5rem;
        }
        .seamless-input {
            background: #f4f8f5;
            border: 2px solid transparent;
            border-radius: 16px;
            padding: 16px 20px 16px 55px;
            font-size: 1.1rem;
            color: #2c3e50;
            width: 100%;
            transition: all 0.3s ease;
        }
        .seamless-input:focus {
            background: #ffffff;
            border-color: #20c997;
            box-shadow: 0 0 0 4px rgba(32, 201, 151, 0.1);
            outline: none;
        }
        .input-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #20c997;
            font-size: 1.2rem;
            z-index: 10;
        }
        .seamless-btn {
            background: linear-gradient(135deg, #198754, #20c997);
            color: white;
            border: none;
            border-radius: 16px;
            padding: 16px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(32, 201, 151, 0.2);
            cursor: pointer;
        }
        .seamless-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 25px rgba(32, 201, 151, 0.3);
            color: white;
        }
        
        /* Result Styles */
        .result-container {
            background: #f8fcf9;
            border-radius: 16px;
            padding: 30px;
            margin-top: 30px;
            border: 1px solid #ebf3ee;
            animation: slideUpFade 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .result-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px dashed #d1e2d7;
        }
        .result-item:last-child {
            border-bottom: none;
        }
        .result-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #e6f4ea;
            color: #198754;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-right: 20px;
        }
        .result-label {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 2px;
        }
        .result-value {
            font-size: 1.15rem;
            font-weight: 700;
            color: #2c3e50;
            margin: 0;
        }
        .badge-seamless {
            background: #e6f4ea;
            color: #198754;
            padding: 8px 16px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 1rem;
        }
        
        @keyframes slideUpFade {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
@endsection

@section('content')
<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-12 py-4 wow fadeInUp" data-wow-delay="0.1s">
            
            <!-- Section Title -->
            <div class="row">
                <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                    <h1 class="h2 fw-bold text-green text-uppercase text-green">Cek Detail Santri</h1>
                    <small class="mb-0">PPATQ RAUDLATUL FALAH</small>
                </div>
            </div>
            
            <!-- Form Card -->
            <div class="seamless-card border-0">
                <div class="seamless-body p-4 p-md-5">
                    <form action="{{ route('cek-santri.submit') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-4">
                                <label class="form-label fw-bold" style="color: #2c3e50; font-size: 0.95rem;">Tanggal Lahir</label>
                                <div class="position-relative">
                                    <div class="position-absolute top-50 start-0 translate-middle-y ps-4 d-flex align-items-center justify-content-center" style="z-index: 10;">
                                        <i class="fas fa-calendar-alt text-success fs-5"></i>
                                    </div>
                                    <input type="date" class="form-control form-control-lg border-0 shadow-sm" id="tanggal_lahir" name="tanggal_lahir" required style="background-color: #f8fcf9; padding-left: 3.5rem; padding-top: 1rem; padding-bottom: 1rem; border-radius: 16px; color: #495057; transition: all 0.3s ease; box-shadow: inset 0 2px 4px rgba(0,0,0,0.02), 0 2px 5px rgba(0,0,0,0.02) !important;">
                                </div>
                            </div>
                            
                            <div class="col-12 mb-4">
                                <label class="form-label fw-bold" style="color: #2c3e50; font-size: 0.95rem;">Kelas Santri</label>
                                <div class="position-relative">
                                    <div class="position-absolute top-50 start-0 translate-middle-y ps-4 d-flex align-items-center justify-content-center" style="z-index: 10;">
                                        <i class="fas fa-chalkboard-teacher text-success fs-5"></i>
                                    </div>
                                    <input type="text" class="form-control form-control-lg border-0 shadow-sm" id="kelas_santri" name="kelas_santri" placeholder="Ketikkan kelas... (Contoh: 2a)" required style="background-color: #f8fcf9; padding-left: 3.5rem; padding-top: 1rem; padding-bottom: 1rem; border-radius: 16px; color: #495057; transition: all 0.3s ease; box-shadow: inset 0 2px 4px rgba(0,0,0,0.02), 0 2px 5px rgba(0,0,0,0.02) !important;">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn w-100 mt-2" style="background: linear-gradient(135deg, #198754, #20c997); color: white; border: none; border-radius: 16px; padding: 16px 20px; font-size: 1.15rem; font-weight: 700; transition: all 0.3s ease;">
                            Tampilkan Data Santri <i class="fas fa-search ms-2"></i>
                        </button>
                    </form>

                    @if(isset($data))
                    <div class="result-container mt-5">
                        <h5 class="fw-bold mb-4 text-center" style="color: #1a5632;">
                            <i class="fas fa-check-circle me-2 text-success"></i> Hasil Pencarian
                        </h5>
                        
                        <div class="result-item">
                            <div class="result-icon shadow-sm">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                            <div>
                                <div class="result-label">Tanggal Lahir</div>
                                <h4 class="result-value">{{ \Carbon\Carbon::parse($data['tanggal_lahir'])->translatedFormat('d F Y') }}</h4>
                            </div>
                        </div>
                        
                        <div class="result-item">
                            <div class="result-icon shadow-sm">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <div>
                                <div class="result-label">Kelas Santri</div>
                                <h4 class="result-value">
                                    <span class="badge-seamless shadow-sm">{{ strtoupper($data['kelas_santri']) }}</span>
                                </h4>
                            </div>
                        </div>

                        <div class="mt-4 p-3 rounded-3" style="background-color: #f1f8f4; border: 1px solid #d1e2d7;">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-info-circle text-success fs-4 me-3"></i> 
                                <small class="text-muted mb-0">Data ini ditampilkan sesuai dengan input form pencarian Anda (Mode Uji Coba).</small>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection