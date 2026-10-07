<div align="center">

  <h1>🎓 System Information Management Mahasiswa (SIM-Mahasiswa)</h1>
  <p><b>Aplikasi Manajemen Data Mahasiswa dan Program Studi Berbasis Web</b></p>

  <p>
    <a href="#-tentang-proyek">Tentang Proyek</a> •
    <a href="#-fitur-utama">Fitur Utama</a> •
    <a href="#-arsitektur--teknologi">Teknologi</a> •
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

## 🗄 Struktur Basis Data

Aplikasi ini menggunakan relasi antar-tabel utama berikut:
