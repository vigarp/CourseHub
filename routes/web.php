<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - UTS Rekayasa Web (CourseHub)
|--------------------------------------------------------------------------
| Mahasiswa : Vigar Rivai Putra
| NIM       : 251011700088
| Kelas     : 03SIFE003
| Tema      : Platform Belajar Online (courses)
*/

// Halaman Utama & Katalog Courses
Route::get('/', [CourseController::class, 'index'])->name('courses.index');

// Halaman Detail Course
Route::get('/courses/{slug}', [CourseController::class, 'show'])->name('courses.show');
