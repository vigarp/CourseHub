@extends('layouts.app')

@section('title', $course->title . ' - CourseHub')

@section('content')
<div class="container py-4">
    <!-- Breadcrumb Navigasi -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}#katalog" class="text-decoration-none">Katalog Kursus</a></li>
            <li class="breadcrumb-item active text-truncate" aria-current="page" style="max-width: 300px;">{{ $course->title }}</li>
        </ol>
    </nav>

    <div class="row g-4">
        <!-- Kolom Kiri: Gambar & Detail Utama -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden mb-4 bg-white">
                <div class="course-img-wrapper" style="aspect-ratio: 16/9; max-height: 420px;">
                    <img src="{{ asset('assets/images/' . $course->image) }}" 
                         alt="{{ $course->title }}" 
                         class="course-img">
                </div>

                <div class="card-body p-4">
                    <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
                        <span class="badge bg-primary px-3 py-2 badge-category">
                            {{ $course->category }}
                        </span>
                        <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2">
                            <i class="bi bi-patch-check-fill me-1"></i> Sertifikat Penyelesaian
                        </span>
                    </div>

                    <h2 class="card-title fw-bold text-dark mb-3">
                        {{ $course->title }}
                    </h2>

                    <hr class="my-4 text-muted">

                    <h5 class="fw-bold text-dark mb-3">
                        <i class="bi bi-file-text-fill text-primary me-2"></i>Deskripsi Kursus
                    </h5>
                    <p class="text-secondary leading-relaxed mb-4" style="line-height: 1.8;">
                        {{ $course->description }}
                    </p>

                    <h5 class="fw-bold text-dark mb-3">
                        <i class="bi bi-check-circle-fill text-primary me-2"></i>Materi yang Akan Dipelajari
                    </h5>
                    <div class="row g-2 mb-4">
                        <div class="col-md-6">
                            <div class="p-2 border rounded bg-light small d-flex align-items-center gap-2">
                                <i class="bi bi-check-lg text-success fw-bold"></i>
                                <span>Pemahaman konsep fundamental terstruktur</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-2 border rounded bg-light small d-flex align-items-center gap-2">
                                <i class="bi bi-check-lg text-success fw-bold"></i>
                                <span>Studi kasus proyek dunia kerja riil</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-2 border rounded bg-light small d-flex align-items-center gap-2">
                                <i class="bi bi-check-lg text-success fw-bold"></i>
                                <span>Akses sumber daya source code & aset</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-2 border rounded bg-light small d-flex align-items-center gap-2">
                                <i class="bi bi-check-lg text-success fw-bold"></i>
                                <span>Forum diskusi & sesi tanya jawab instruktur</span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Kembali ke Katalog
                        </a>
                        <span class="text-muted small">ID Kursus: #{{ $course->id }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Card Info Singkat & Pendaftaran -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-3 p-4 sticky-top bg-white" style="top: 80px;">
                <h5 class="fw-bold text-dark mb-3 border-bottom pb-2">Informasi Kursus</h5>

                <div class="mb-4">
                    <small class="text-muted d-block">Biaya Investasi Belajar</small>
                    <span class="display-6 fw-bold text-primary">{{ $course->formatted_price }}</span>
                </div>

                <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                        <span class="text-muted"><i class="bi bi-person-fill text-secondary me-2"></i>Instruktur</span>
                        <span class="fw-semibold text-dark">{{ $course->instructor }}</span>
                    </li>
                    <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                        <span class="text-muted"><i class="bi bi-clock-fill text-secondary me-2"></i>Durasi</span>
                        <span class="fw-semibold text-dark">{{ $course->duration }}</span>
                    </li>
                    <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                        <span class="text-muted"><i class="bi bi-tag-fill text-secondary me-2"></i>Kategori</span>
                        <span class="badge bg-secondary">{{ $course->category }}</span>
                    </li>
                    <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                        <span class="text-muted"><i class="bi bi-shield-check text-secondary me-2"></i>Akses</span>
                        <span class="fw-semibold text-dark">Seumur Hidup</span>
                    </li>
                </ul>

                <button class="btn btn-primary btn-lg w-100 mb-2" data-bs-toggle="modal" data-bs-target="#enrollModal">
                    <i class="bi bi-bag-check-fill me-2"></i>Daftar Kursus Sekarang
                </button>
                <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary w-100">
                    Lihat Kursus Lainnya
                </a>
            </div>
        </div>
    </div>

    <!-- Kursus Terkait Lainnya -->
    @if($relatedCourses->isNotEmpty())
        <div class="mt-5 pt-4 border-top">
            <h4 class="fw-bold text-dark mb-3">Kursus Lain yang Mungkin Anda Sukai</h4>
            <div class="row g-3">
                @foreach($relatedCourses as $rel)
                    <div class="col-md-4">
                        <div class="card h-100 course-card rounded-3 overflow-hidden bg-white">
                            <div class="course-img-wrapper" style="aspect-ratio: 16/9;">
                                <img src="{{ asset('assets/images/' . $rel->image) }}" alt="{{ $rel->title }}" class="course-img">
                            </div>
                            <div class="card-body p-3 d-flex flex-column">
                                <span class="badge bg-light text-primary border align-self-start mb-2" style="font-size: 0.7rem;">
                                    {{ $rel->category }}
                                </span>
                                <h6 class="fw-bold text-dark mb-2 text-truncate-2">
                                    <a href="{{ route('courses.show', $rel->slug) }}" class="text-decoration-none text-dark">
                                        {{ $rel->title }}
                                    </a>
                                </h6>
                                <div class="small text-muted mb-2">
                                    <i class="bi bi-person me-1"></i>{{ $rel->instructor }}
                                </div>
                                <div class="mt-auto d-flex justify-content-between align-items-center pt-2 border-top">
                                    <span class="fw-bold text-primary small">{{ $rel->formatted_price }}</span>
                                    <a href="{{ route('courses.show', $rel->slug) }}" class="btn btn-sm btn-outline-primary">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>

<!-- Modal Pendaftaran Sederhana -->
<div class="modal fade" id="enrollModal" tabindex="-1" aria-labelledby="enrollModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="enrollModalLabel">Pendaftaran Kursus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-4">
                <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                <h5 class="fw-bold mt-3 mb-1">Siap untuk Memulai Belajar?</h5>
                <p class="text-muted small mb-3">
                    Anda akan mendaftar ke kursus <strong>{{ $course->title }}</strong> bersama instruktur <strong>{{ $course->instructor }}</strong>.
                </p>
                <div class="alert alert-light border small text-start">
                    <div><strong>Total Biaya:</strong> {{ $course->formatted_price }}</div>
                    <div><strong>Durasi:</strong> {{ $course->duration }}</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="alert('Terima kasih! Pendaftaran demo kursus berhasil.')" data-bs-dismiss="modal">Konfirmasi Belajar</button>
            </div>
        </div>
    </div>
</div>
@endsection

