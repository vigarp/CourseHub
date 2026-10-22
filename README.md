# UTS Rekayasa Web - CourseHub (Platform Belajar Online)

Repositori ini dibuat untuk memenuhi tugas **Ujian Tengah Semester (UTS)** mata kuliah **Rekayasa Web**, Program Studi Sistem Informasi S-1, Fakultas Ilmu Komputer, Universitas Pamulang.

---

## 👤 Identitas Mahasiswa
* **Nama Lengkap:** Vigar Rivai Putra
* **NIM:** 251011700088
* **Kode Kelas:** 03SIFE003
* **Program Studi:** Sistem Informasi S-1
* **Dosen Pengampu:** Afif Efendi, M.Kom.
* **Tema Penugasan:** Platform Belajar Online (Digit Terakhir NIM: 8)
* **Judul Project:** CourseHub - Platform Belajar Online

---

## 📌 Ruang Lingkup Aplikasi (Fokus Utama)

Aplikasi CourseHub berfokus pada dua halaman utama yang dirancang secara terintegrasi, responsif, dan interaktif:

```
[ Beranda / Home Page ] (GET /)
       │
       ├── Filter Kategori & Daftar Katalog Kursus
       └── Klik Kartu Kursus / Tombol "Detail"
              │
              ▼
[ Halaman Detail Kursus ] (GET /courses/{slug})
       ├── Silabus & Rincian Materi
       ├── Sidebar Info Investasi & Benefit
       ├── Modal Konfirmasi Pendaftaran Belajar
       └── Rekomendasi Kursus Terkait
```

---

## 🏠 1. Halaman Home / Beranda (`/`)

Halaman Beranda (`courses.index`) berfungsi sebagai etalase utama platform yang menampilkan seluruh katalog kursus yang tersedia beserta navigasi dan filter kategori.

### Fitur & Komponen Halaman Home:
1. **Hero Welcome Section:**
   - Menyambut pengunjung dengan judul *"Welcome To Platform Belajar Online - CourseHub"*.
   - Menyajikan pengenalan singkat mengenai platform belajar koding dan teknologi bersama instruktur berpengalaman.

2. **Sistem Filter Kategori Dinamis:**
   - Menyediakan tombol filter cepat berbasis kategori kursus:
     - `Semua` (Menampilkan seluruh kursus)
     - `Web Development`
     - `Data Science`
     - `UI/UX Design`
     - `Mobile Development`
     - `Cloud & DevOps`
     - `Cyber Security`
     - `Database`
   - State tombol aktif (*active state*) menyesuaikan kategori yang sedang dipilih melalui query parameter URL `?category=...`.

3. **Grid Katalog Kursus Responsif:**
   - Disusun menggunakan tata letak grid Bootstrap 5 yang adaptif terhadap perangkat mobile, tablet, hingga desktop (`col-sm-6 col-lg-3`).
   - Setiap kartu kursus memuat informasi lengkap:
     - **Thumbnail Gambar Kursus:** Memuat aset ilustrasi SVG dari folder `public/assets/images/` dengan rasio 16:9 yang rapi.
     - **Badge Kategori:** Menandai bidang topik kursus.
     - **Judul Kursus:** Teks judul dengan efek interaktif hover link.
     - **Instruktur Pengampu:** Ikon profil disertai nama pengajar.
     - **Estimasi Durasi Belajar:** Estimasi jam dan minggu durasi penyelesaian.
     - **Format Harga Mata Uang Rupiah:** Diformat rapi (misal: `Rp 350.000` atau `Gratis`).
     - **Tombol Aksi Detail:** Mengarahkan langsung ke halaman detail kursus via rute SEO-friendly slug.

4. **Empty State Alert:**
   - Menampilkan notifikasi visual informatif dan tombol *"Tampilkan Semua Kursus"* apabila kategori yang dipilih tidak memiliki data kursus.

---

## 📖 2. Halaman Detail Kursus (`/courses/{slug}`)

Halaman Detail (`courses.show`) menyajikan rincian komprehensif dari sebuah kursus terpilih, memberikan gambaran materi, informasi investasi, hingga opsi pendaftaran.

### Fitur & Komponen Halaman Detail:
1. **Navigasi Breadcrumbs:**
   - Memudahkan pengguna memahami posisi navigasi (*Beranda > Katalog Kursus > [Judul Kursus]*).
   - Menyediakan jalur navigasi cepat untuk kembali ke katalog utama.

2. **Banner Media & Header Kursus:**
   - Menampilkan poster/gambar kursus utama dalam ukuran besar dan jernih.
   - Dilengkapi badge kategori dan badge benefit *"Sertifikat Penyelesaian"*.
   - Menampilkan judul lengkap kursus dan kode identifikasi kursus (`#ID`).

3. **Deskripsi & Capaian Materi Pembelajaran:**
   - **Deskripsi Kursus:** Ringkasan latar belakang, sasaran kursus, dan kompetensi yang dibangun.
   - **Materi yang Akan Dipelajari:** Daftar poin materi interaktif (fundamental terstruktur, studi kasus proyek riil dunia kerja, akses source code & aset, serta forum diskusi dengan instruktur).

4. **Sticky Sidebar Panel Informasi Kursus:**
   - Panel samping melayang (*sticky sidebar*) yang tetap terlihat saat pengguna menggulir halaman.
   - Menampilkan ringkasan ringkas:
     - **Biaya Investasi Belajar:** Nominal harga kursus dengan tipografi tegas.
     - **Instruktur Pengampu**
     - **Total Durasi Kursus**
     - **Label Kategori**
     - **Hak Akses:** Seumur Hidup (*Lifetime Access*).

5. **Modal Interaktif Pendaftaran Kursus:**
   - Tombol Call-to-Action (CTA) *"Daftar Kursus Sekarang"* memicu Bootstrap Modal dialog konfirmasi pendaftaran.
   - Modal menampilkan ringkasan kursus yang akan diambil, total investasi, dan tombol konfirmasi belajar.

6. **Rekomendasi Kursus Terkait (*Related Courses*):**
   - Menampilkan hingga 3 rekomendasi kursus lain dalam kategori atau bidang yang sama di bagian bawah halaman detail.
   - Dilengkapi gambar, nama instruktur, harga, serta tombol detail cepat untuk mendukung kemudahan eksplorasi materi lain.

---

## 🛠️ Spesifikasi Teknis & Skema Database

1. **Framework:** Laravel 13
2. **Database:** MySQL (`db_uts_251011700088`)
3. **Frontend:** Laravel Blade & Bootstrap 5
4. **Penyimpanan Aset Lokal:**
   - Bootstrap 5 Lokal: `public/bootstrap/` (sesuai petunjuk nomor 5 soal UTS)
   - Gambar Kursus: `public/assets/images/`
5. **Struktur Tabel `courses`:**
   | Kolom | Tipe Data | Keterangan |
   |---|---|---|
   | `id` | `BIGINT UNSIGNED (PK)` | Auto Increment ID |
   | `title` | `VARCHAR(255)` | Judul Kursus |
   | `slug` | `VARCHAR(255) (UNIQUE)` | URL Slug ramah SEO |
   | `instructor` | `VARCHAR(255)` | Nama Instruktur Pengampu |
   | `duration` | `VARCHAR(255)` | Durasi & Estimasi Belajar |
   | `image` | `VARCHAR(255)` | Nama File Gambar di `public/assets/images/` |
   | `price` | `DECIMAL(12,2)` | Biaya Kursus (Rupiah) |
   | `category` | `VARCHAR(255)` | Kategori / Bidang Kursus |
   | `description` | `TEXT (NULLABLE)` | Deskripsi Lengkap Silabus |
   | `created_at`, `updated_at` | `TIMESTAMP` | Timestamp Record |

---

## 🚀 Panduan Instalasi & Menjalankan Aplikasi

### Opsi 1: Menggunakan PHP CLI & Web Server Lokal (Laragon / XAMPP)
1. Clone repository ini:
   ```bash
   git clone <URL_REPOSITORY_GITHUB>
   cd UTS_251011700088
   ```
2. Salin environment file & pasang dependensi:
   ```bash
   cp .env.example .env
   composer install
   php artisan key:generate
   ```
3. Buat database baru di MySQL dengan nama `db_uts_251011700088`.
4. Sesuaikan konfigurasi database pada `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_uts_251011700088
   DB_USERNAME=root
   DB_PASSWORD=
   ```
5. Jalankan migrasi tabel dan seeding data kursus:
   ```bash
   php artisan migrate --seed
   ```
6. Jalankan server lokal Laravel:
   ```bash
   php artisan serve --port=8002
   ```
7. Buka browser pada tautan: **[http://127.0.0.1:8002](http://127.0.0.1:8002)**.

---

### Opsi 2: Menggunakan Laravel Sail (Docker)
1. Jalankan container Docker:
   ```bash
   ./vendor/bin/sail up -d
   ```
2. Jalankan migrasi dan seeder:
   ```bash
   ./vendor/bin/sail artisan migrate --seed
   ```
3. Akses aplikasi melalui browser di **`http://localhost:8002`**.
