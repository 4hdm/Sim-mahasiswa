<div align="center">

  <h1>🎓 System Information Management Mahasiswa (SIM-Mahasiswa)</h1>
  <p><b>Aplikasi Manajemen Data Mahasiswa dan Program Studi Berbasis Web</b></p>

  <p>
    <a href="#-tentang-proyek">Tentang Proyek</a> •
    <a href="#-fitur-utama">Fitur Utama</a> •
    <a href="#-arsitektur--teknologi">Teknologi</a> •
    <a href="#-perjalanan--progress-pengerjaan">Progress</a> •
    <a href="#-struktur-basis-data">Database</a> •
    <a href="#-panduan-instalasi">Instalasi</a> •
    <a href="#-dokumentasi-fitur--tampilan">Tampilan</a>
  </p>

  <br />
</div>

---

## 📌 Tentang Proyek

**SIM-Mahasiswa** adalah aplikasi Sistem Informasi Manajemen berbasis web yang dibangun menggunakan **Laravel** dan **Laravel Breeze**. Aplikasi ini dirancang untuk mempermudah pengelolaan data akademik meliputi data mahasiswa, program studi, manajemen autentikasi, serta pelaporan data berbasis PDF.

Proyek ini disusun untuk memenuhi tugas **UAS Mata Kuliah Framework Web Development**.

---

## 🚀 Fitur Utama

- 🔐 **Autentikasi & Manajemen Pengguna:** Sistem Login, Register, Lupa Password, dan Manajemen Profil Pengguna.
- 📊 **Dashboard Interaktif:** Statistik data mahasiswa dan ringkasan per program studi.
- 🎓 **CRUD Program Studi:** Pengelolaan master data program studi (Tambah, Edit, Detail, Hapus).
- 👨‍🎓 **CRUD Data Mahasiswa:** Pencatatan data mahasiswa lengkap beserta relasi ke program studi.
- 🔍 **Pencarian & Filter:** Filter interaktif berdasarkan nama mahasiswa dan program studi.
- 📄 **Cetak Laporan PDF:** Export data mahasiswa ke format PDF menggunakan library `barryvdh/laravel-dompdf`.

---

## 🛠 Arsitektur & Teknologi

| Komponen | Teknologi / Framework |
| :--- | :--- |
| **Backend Framework** | Laravel 11.x |
| **Authentication Kit** | Laravel Breeze |
| **Frontend Styling** | Tailwind CSS / Blade Templates |
| **Database** | MySQL |
| **PDF Rendering Engine**| DomPDF |
| **Development Server** | PHP 8.x + Artisan |

---
<details open>
<summary><b>⚙️ Fase 1: Inisialisasi & Setup Lingkungan Development</b></summary>

- [x] Inisialisasi proyek baru Laravel.
- [x] Konfigurasi basis data MySQL & pengaturan file `.env`.
- [x] Instalasi dan penyetelan starter kit **Laravel Breeze** untuk sistem autentikasi dasar.
</details>

<details open>
<summary><b>🗄️ Fase 2: Permodelan Data & Struktur Basis Data</b></summary>

- [x] Desain skema basis data dan pembuatan file *Migration* (`prodis` dan `mahasiswas`).
- [x] Pembuatan *Model* beserta penentuan relasi `hasMany` dan `belongsTo` antara Program Studi dan Mahasiswa.
- [x] Pembuatan *Seeder* untuk data awal Program Studi (`ProdiSeeder`).
</details>

<details open>
<summary><b>🎮 Fase 3: Pengembangan Logika Bisnis & Interface Utam<b></summary>

- [x] Pembuatan Controller utama: `MahasiswaController`, `ProdiController`, dan `DashboardController`.
- [x] Pengaturan *Routing* (`routes/web.php`) untuk seluruh endpoint aplikasi.
- [x] Desain *Layout Utama* dan antarmuka Dashboard Statistik.
- [x] Implementasi fitur **CRUD Mahasiswa** lengkap dengan form input, pencarian, dan filter per Program Studi.
- [x] Implementasi fitur **CRUD Program Studi** (Lihat, Tambah, Edit, Detail, Hapus).
</details>

<details open>
<summary><b>🔐 Fase 4: Profil Pengguna & Keamanan (Auth)</b></summary>

- [x] Pembuatan `ProfileController` dan views terkait untuk pengaturan akun.
- [x] Pengujian fitur pembaruan Profil pengguna (Ubah Nama & Email).
- [x] Pengujian fitur keamanan pembaruan Password.
- [x] Perbaikan serta konfigurasi aliran *Forgot Password* & *Reset Password*.
</details>

<details open>
<summary><b>📄 Fase 5: Fitur Tambahan & Reporting</b></summary>

- [x] Integritas library `barryvdh/laravel-dompdf` untuk fungsi cetak dokumen.
- [x] Penambahan method PDF pada `MahasiswaController` dan pembuatan layout tampilan cetak.
- [x] Penambahan tombol **PRINT PDF** pada halaman data mahasiswa.
- [x] Pengujian akhir seluruh alur sistem (*End-to-End Testing*).
</details>

---

## 🗄 Struktur Basis Data

### 🗄️ Skema & Relasi Basis Data

| **Tabel: Program Studi** `(1)` | **Tabel: Mahasiswa** `(N)` |
| :--- | :--- |
| `id` *(Primary Key)* | `id` *(Primary Key)* |
| `kode_prodi` | `nim` |
| `nama_prodi` | `nama` |
| `created_at` / `updated_at` | `prodi_id` *(Foreign Key ➔ prodi.id)* |
| | `email` |
| | `created_at` / `updated_at` |

---


## 💻 Panduan Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan lokal kamu:

1. **Clone Repositori**
   ```bash
   [git clone [https://github.com/username/SIM-Mahasiswa.git](https://github.com/username/SIM-Mahasiswa.git)
   cd SIM-Mahasiswa](https://github.com/dm1893221-glitch/Framework-SIM-Mahasiswa/blob/main/README.md)

## 📸 Dokumentasi Fitur & Tampilan
1. Dashboard & Analitik
Menampilkan total statistik data mahasiswa serta sebaran per program studi.

2. Manajemen Data Mahasiswa
Disengkapi dengan pencarian, filter prodi, serta tombol ekspor laporan ke format PDF.

Detail & Form Input Mahasiswa:

3. Manajemen Program Studi
Modul CRUD lengkap untuk pengelolaan data program studi.

4. Ekspor Laporan PDF
Fitur pencetakan rekapitulasi data mahasiswa yang rapi dan siap cetak.

5. Keamanan & Pengaturan Profil
Fitur manajemen akun pengguna, reset password, serta pembaruan profil yang telah disesuaikan.
