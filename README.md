# SINA - Sistem Informasi Nilai Akademik

SINA (Sistem Informasi Nilai Akademik) adalah aplikasi berbasis web yang dirancang untuk membantu pengelolaan data akademik, mulai dari manajemen kelas, data siswa, mata pelajaran, hingga sistem penilaian (grading) yang efisien.

## 🚀 Fitur Utama

- **Dashboard**: Statistik ringkas mengenai jumlah siswa, kelas, dan mata pelajaran.
- **Manajemen Siswa**: Kelola data profil siswa secara lengkap (CRUD).
- **Manajemen Kelas**: Pengelompokan siswa ke dalam kelas-kelas tertentu.
- **Manajemen Mata Pelajaran**: Daftar mata pelajaran yang diampu di sekolah.
- **Sistem Penilaian (Grades)**: 
    - Input nilai per siswa dan mata pelajaran.
    - Rekapitulasi nilai per kelas untuk melihat performa akademik secara keseluruhan.
- **Autentikasi**: Sistem login aman untuk admin/pengajar menggunakan Laravel Breeze.

## 🛠️ Teknologi yang Digunakan

Aplikasi ini dibangun menggunakan stack teknologi modern untuk menjamin performa dan kemudahan pemeliharaan:

- **Framework**: [Laravel 12](https://laravel.com) (PHP 8.2+)
- **Frontend**: 
    - [Bootstrap 5](https://getbootstrap.com) (Styling UI)
    - [SB Admin 2](https://startbootstrap.com/template/sb-admin-2) / Core Template (Dashboard Layout)
    - [Alpine.js](https://alpinejs.dev) (Interaktivitas Ringan)
    - [Vite](https://vitejs.dev/) (Build Tool)
- **Database**: [MySQL](https://www.mysql.com/)
- **Lainnya**: PHP Artisan, Composer, NPM.
- **Containerization**: Docker & Docker Compose (untuk deployment).

## 🔄 Alur Sistem (Workflow)

1. **Registrasi/Login**: Pengguna masuk ke sistem untuk mengakses dashboard.
2. **Setup Data Master**: Admin mengisi data **Kelas** dan **Mata Pelajaran**.
3. **Data Siswa**: Admin menambahkan **Siswa** dan menempatkan mereka ke dalam kelas yang sesuai.
4. **Input Nilai**: Pengajar memilih kelas dan mata pelajaran, lalu memasukkan nilai untuk setiap siswa.
5. **Monitoring & Rekap**: Admin/Pengajar dapat melihat rekapitulasi nilai per kelas untuk evaluasi hasil belajar.

## 💻 Cara Instalasi

### Prasyarat (Prerequisites)
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL

### Langkah-langkah (Local)

1. **Clone Repository**
   ```bash
   git clone <repository-url>
   cd manajemen_kelas
   ```

2. **Instal Dependensi PHP**
   ```bash
   composer install
   ```

3. **Konfigurasi Environment**
   Salin file `.env.example` menjadi `.env` dan sesuaikan pengaturan database Anda.
   ```bash
   cp .env.example .env
   ```

4. **Generate App Key**
   ```bash
   php artisan key:generate
   ```

5. **Migrasi & Seed Database**
   ```bash
   php artisan migrate --seed
   ```

6. **Instal Dependensi Frontend & Build**
   ```bash
   npm install
   npm run dev # atau 'npm run build' untuk produksi
   ```

7. **Jalankan Server**
   ```bash
   php artisan serve
   ```
   Aplikasi dapat diakses di `http://localhost:8000`.

### Menggunakan Docker

Jika Anda ingin menjalankan aplikasi menggunakan Docker (disarankan):

1. Pastikan Docker dan Docker Compose sudah terinstal.
2. Jalankan perintah:
   ```bash
   docker-compose up -d --build
   ```
3. Akses aplikasi di port yang telah ditentukan (biasanya `http://localhost:8000` atau sesuai konfigurasi `docker-compose.yml`).

---
Dibuat dengan ❤️ untuk kemajuan pendidikan.
