@extends('layouts.app')

@section('title', 'CourseHub - Platform Belajar Online')

@section('content')
<!-- Hero Section (Identitas UTS sesuai format soal) -->
<section class="hero-banner py-5 mb-4 text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Logo Unpam -->
                <div class="mb-3">
                    <img src="{{ asset('assets/images/logo-unpam.svg') }}" alt="Logo Universitas Pamulang" style="width: 100px; height: 100px;">
                </div>
                
                <p class="text-uppercase text-muted fw-bold mb-1 letter-spacing-1" style="letter-spacing: 2px;">
                    Welcome To
                </p>
                <h1 class="display-5 fw-bold text-dark mb-3">
                    Platform Belajar Online
                </h1>
                
                <!-- Box Identitas Mahasiswa (Persis layout referensi soal) -->
                <div class="card border-0 shadow-sm mx-auto p-3 mb-4 bg-light" style="max-width: 420px;">
                    <div class="card-body p-1">
                        <div class="fw-bold text-dark fs-5 mb-1">251011700088</div>
                        <div class="text-primary fw-semibold mb-1">Vigar Rivai Putra</div>
                        <div class="text-muted small">Prodi Sistem Informasi (03SIFE003)</div>
                        <div class="text-secondary small fw-bold mt-2 pt-2 border-top">
                            DOSEN PENGAMPU: <span class="text-dark">AFIF EFENDI</span>
                        </div>
                    </div>
                </div>

                <p class="text-secondary mb-0">
                    Aplikasi web katalog kursus berbasis <strong>Laravel & Bootstrap</strong> untuk memenuhi Ujian Tengah Semester (UTS) Rekayasa Web.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section Katalog Kursus -->
<div class="container py-3" id="katalog">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-1">
                <i class="bi bi-collection-play-fill text-primary me-2"></i>Daftar Kursus Tersedia
            </h3>
            <p class="text-muted small mb-0">Temukan kursus terbaik sesuai kebutuhan bidang minat Anda.</p>
        </div>

        <!-- Filter Kategori -->
        <div class="d-flex flex-wrap gap-1">
            <a href="{{ route('courses.index') }}#katalog" 
               class="btn btn-sm {{ empty($category) || $category === 'all' ? 'btn-primary' : 'btn-outline-secondary' }}">
                Semua
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('courses.index', ['category' => $cat]) }}#katalog" 
                   class="btn btn-sm {{ $category === $cat ? 'btn-primary' : 'btn-outline-secondary' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>
    </div>

    @if($courses->isEmpty())
        <div class="alert alert-info text-center py-5">
            <i class="bi bi-info-circle fs-2 d-block mb-2"></i>
            Tidak ada kursus ditemukan pada kategori ini.
            <div class="mt-3">
                <a href="{{ route('courses.index') }}" class="btn btn-sm btn-outline-primary">Tampilkan Semua Kursus</a>
            </div>
        </div>
    @else
        <div class="row g-4">
            @foreach($courses as $course)
                <div class="col-sm-6 col-lg-3">
                    <div class="card h-100 course-card rounded-3 overflow-hidden bg-white">
                        <!-- Gambar Produk (Disimpan di public/assets/images/) -->
                        <div class="course-img-wrapper">
                            <img src="{{ asset('assets/images/' . $course->image) }}" 
                                 alt="{{ $course->title }}" 
                                 class="course-img"
                                 loading="lazy">
                        </div>

                        <div class="card-body d-flex flex-column p-3">
                            <!-- Kategori Badge -->
                            <div class="mb-2">
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle badge-category">
                                    {{ $course->category }}
                                </span>
                            </div>

                            <!-- Judul Kursus -->
                            <h6 class="card-title fw-bold text-dark mb-2 text-truncate-2" style="min-height: 2.8rem; line-height: 1.4;">
                                <a href="{{ route('courses.show', $course->id) }}" class="text-decoration-none text-dark hover-primary">
                                    {{ $course->title }}
                                </a>
                            </h6>

                            <!-- Instruktur -->
                            <div class="small text-muted mb-2 d-flex align-items-center gap-1">
                                <i class="bi bi-person-circle text-secondary"></i>
                                <span class="text-truncate">{{ $course->instructor }}</span>
                            </div>

                            <!-- Durasi -->
                            <div class="small text-muted mb-3 d-flex align-items-center gap-1">
                                <i class="bi bi-clock-history text-secondary"></i>
                                <span>{{ $course->duration }}</span>
                            </div>

                            <!-- Harga & Tombol Aksi -->
                            <div class="mt-auto pt-2 border-top d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-muted d-block" style="font-size: 0.7rem;">Harga Kursus</small>
                                    <span class="fw-bold text-primary fs-6">{{ $course->formatted_price }}</span>
                                </div>
                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-primary">
                                    Detail <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

