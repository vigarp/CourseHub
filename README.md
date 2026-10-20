# UTS Rekayasa Web - CourseHub (Platform Belajar Online)

Repositori ini dibuat untuk memenuhi tugas **Ujian Tengah Semester (UTS)** mata kuliah **Rekayasa Web**, Program Studi Sistem Informasi S-1, Universitas Pamulang.

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

## 🛠️ Spesifikasi Teknis & Ketentuan Soal
1. **Framework:** Laravel 13
2. **Database:** MySQL (`db_uts_251011700088`)
3. **Frontend:** Blade Template & Bootstrap 5
4. **Nama Tabel:** `courses`
5. **Struktur Kolom Tabel:**
   * `id` (Primary Key)
   * `title` (Judul Kursus)
   * `instructor` (Instruktur)
   * `duration` (Durasi Kursus)
   * `image` (Nama File Gambar Produk)
   * `price` (Biaya Kursus)
   * `category` (Kategori Kursus)
   * `description` (Deskripsi Kursus)
   * `created_at`, `updated_at` (Timestamps)
6. **Penyimpanan Gambar:** Disimpan di direktori `public/assets/images/`
7. **Asset Bootstrap Lokal:** Disimpan di direktori `public/bootstrap/` sesuai butir petunjuk nomor 5

---

## 🚀 Cara Menjalankan Aplikasi

### Opsi 1: Menggunakan Laravel Sail (Docker)
1. Pastikan Docker sudah berjalan.
2. Clone repository ini:
   ```bash
   git clone <URL_REPOSITORY_GITHUB>
   cd UTS_251011700088
   ```
3. Salin file environment:
   ```bash
   cp .env.example .env
   ```
4. Jalankan container Sail:
   ```bash
   ./vendor/bin/sail up -d
   ```
5. Jalankan migrasi dan seeder:
   ```bash
   ./vendor/bin/sail artisan migrate --seed
   ```
6. Buka browser di `http://localhost:8002`

---

### Opsi 2: Menggunakan PHP CLI / Web Server Lokal (Laragon / XAMPP)
1. Clone repository & salin file `.env`:
   ```bash
   cp .env.example .env
   ```
2. Buat database baru di MySQL dengan nama `db_uts_251011700088`.
3. Sesuaikan konfigurasi database di file `.env`:
   ```env
   DB_HOST=127.0.0.1
   DB_DATABASE=db_uts_251011700088
   DB_USERNAME=root
   DB_PASSWORD=
   ```
4. Jalankan perintah migrasi & seeder data dummy:
   ```bash
   php artisan migrate --seed
   ```
5. Jalankan server Laravel:
   ```bash
   php artisan serve --port=8002
   ```
6. Buka aplikasi di browser pada tautan [http://127.0.0.1:8002](http://127.0.0.1:8002).

---

## 📸 Fitur Halaman Website
1. **Hero Section Identitas:** Memuat Logo Universitas Pamulang, Sambutan, NIM, Nama Mahasiswa, Prodi, Kelas, dan Nama Dosen Pengampu.
2. **Katalog Kursus:** Tampilan Card Bootstrap responsif dengan gambar kursus, kategori badge, judul, instruktur, durasi, dan format harga mata uang Rupiah.
3. **Filter Kategori Kursus:** Memudahkan pengguna memfilter kursus berdasarkan bidang minat (*Web Development, Data Science, UI/UX Design, Mobile Development, Cloud & DevOps, Cyber Security, Database*).
4. **Halaman Detail Kursus:** Rincian lengkap materi yang dipelajari, benefit sertifikat, panel informasi investasi, modal pendaftaran interaktif, serta rekomendasi kursus terkait lainnya.
