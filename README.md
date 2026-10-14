<div align="center">

# 🎓 SIM Mahasiswa (Sistem Informasi Manajemen Mahasiswa)

<img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" />
<img src="https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" />
<img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" />
<img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" />
<img src="https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge" />

<p align="center">
  <b>Aplikasi Manajemen Data Mahasiswa & Program Studi modern dengan sentuhan estetika Crimson Luxury & Adaptive Dark Mode.</b>
</p>

</div>

---

## ✨ Fitur Unggulan

- 💎 **Modern Crimson Aesthetics**: Antarmuka elegan dengan kombinasi warna gradasi merah *crimson* mewah.
- 🌙 **Adaptive Dark / Light Mode**: Fitur ganti tema otomatis (menyimpan preferensi via `localStorage`) dengan konsep unik *Sidebar Putih Bersih* saat mode gelap aktif.
- 📊 **Manajemen Mahasiswa Komprehensif**: Fitur CRUD lengkap dengan status keaktifan interaktif (*Toggle Switch* Aktif/Tidak Aktif) dan keterangan status *real-time*.
- 🏢 **Manajemen Program Studi**: Pengelolaan data program studi dan fakultas yang terintegrasi secara relasional.
- 🔍 **Advanced Search & Filter**: Pencarian data cepat berdasarkan NIM/Nama serta filter berdasarkan Program Studi.
- 📄 **Export PDF**: Fitur cetak laporan data mahasiswa ke format PDF secara instan menggunakan integrasi DomPDF.

---

## 🛠️ Tech Stack

* **Framework Backend:** Laravel 10/11 (PHP)
* **Frontend UI:** Bootstrap 5.3, Bootstrap Icons, Google Fonts (Plus Jakarta Sans)
* **Database:** MySQL
* **Library Pendukung:** `barryvdh/laravel-dompdf`

---

## 🚀 Panduan Instalasi & Menjalankan Proyek

Ikuti langkah-langkah di bawah ini untuk menjalankan proyek ini di komputer lokal Anda:

1. **Clone Repository**
   ```bash
   https://github.com/dm1893221-glitch/Framework-SIM-Mahasiswa
   cd sim-mahasiswa

   <div align="center">

---

## 📁 Struktur Aplikasi (Directory Structure)

Berikut adalah ringkasan struktur direktori utama dari proyek ini:

```text
sim-mahasiswa/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── MahasiswaController.php  # Mengelola logika CRUD & cetak PDF Mahasiswa
│   │       └── ProdiController.php      # Mengelola data Program Studi
│   └── Models/
│       ├── Mahasiswa.php                # Model relasi Mahasiswa ke Prodi
│       └── Prodi.php                    # Model relasi Prodi
├── database/
│   ├── migrations/                      # Skema tabel database
│   └── seeders/                         # Data dummy awal aplikasi
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php            # Layout utama, Sidebar, Topbar, & Dark Mode
│       ├── mahasiswa/                   # Views (index, create, edit, show, pdf)
│       └── prodi/                       # Views Program Studi
└── routes/
    └── web.php                          # Konfigurasi rute aplikasi web
```

## 🗄️ Struktur Database (Database Schema & Relasi)

Berikut adalah diagram relasi dan struktur tabel database dalam aplikasi ini:

```mermaid
erDiagram
    users {
        bigint id PK
        varchar name
        varchar email
        varchar password
        timestamp timestamps
    }

    prodis {
        bigint id PK
        varchar kode_prodi
        varchar nama_prodi
        varchar fakultas
        timestamp timestamps
    }

    mahasiswas {
        bigint id PK
        varchar nim
        varchar nama
        bigint prodi_id FK
        enum jenis_kelamin
        date tanggal_lahir
        varchar telepon
        varchar email
        text alamat
        enum status
        timestamp timestamps
    }

    prodis ||--o{ mahasiswas : "memiliki"
```
---

## 🛣️ Alur Rute & Navigasi (Key Routes)

| Method | URI | Controller Action | Keterangan |
| :--- | :--- | :--- | :--- |
| `GET` | `/mahasiswa` | `MahasiswaController@index` | Menampilkan daftar mahasiswa + Filter/Search |
| `GET` | `/mahasiswa/create` | `MahasiswaController@create` | Form tambah data mahasiswa |
| `POST` | `/mahasiswa` | `MahasiswaController@store` | Menyimpan data mahasiswa baru |
| `GET` | `/mahasiswa/{id}` | `MahasiswaController@show` | Detail informasi mahasiswa & badge status |
| `GET` | `/mahasiswa/{id}/edit` | `MahasiswaController@edit` | Form edit data mahasiswa |
| `PUT` | `/mahasiswa/{id}` | `MahasiswaController@update` | Memperbarui data mahasiswa |
| `DELETE` | `/mahasiswa/{id}` | `MahasiswaController@destroy` | Menghapus data mahasiswa |
| `GET` | `/mahasiswa/pdf` | `MahasiswaController@pdf` | Cetak/Stream dokumen laporan PDF |

---

## 🛡️ Keamanan & Optimasi

- **CSRF Protection**: Seluruh form input dilindungi dengan token `@csrf` bawaan Laravel.
- **SQL Injection Prevention**: Menggunakan Eloquent ORM & Prepared Statements untuk mencegah eksekusi query berbahaya.
- **Form Input Validation**: Validasi ketat di sisi server menggunakan `FormRequest` / `Validator` (seperti keunikan NIM, opsi enum jenis kelamin, dan format email).
- **Responsive Breakpoints**: Layout telah diuji dan responsif di berbagai resolusi layar (Desktop, Tablet, Mobile).

---

## 📌 Rencana Pengembangan (Roadmap)

- [x] CRUD Mahasiswa & Program Studi
- [x] Adaptive Dark Mode dengan CSS Variables & LocalStorage
- [x] Dynamic Status Switch (Aktif / Tidak Aktif)
- [x] Export Laporan PDF (DomPDF)
- [ ] Export Data ke Excel / CSV
- [ ] Multi-Role Authentication (Admin, Dosen, Mahasiswa)
- [ ] Import Massal Data Mahasiswa via Excel

---

## 📸 Preview & Galeri Tampilan

Berikut adalah gambaran antarmuka dari aplikasi **SIM Mahasiswa**:

## 📸 Preview & Galeri Tampilan

Berikut adalah gambaran antarmuka dari aplikasi **SIM Mahasiswa**:

### ☀️ Light Mode

| 📊 Dashboard (Light) | 📄 Data Mahasiswa (Light) |
| :---: | :---: |
| <img src="public/img/preview/dashboard-light.png" width="100%" alt="Dashboard Light"> | <img src="public/img/preview/mahasiswa-light.png" width="100%" alt="Data Mahasiswa Light"> |
| *Tampilan ringkasan statistik data mahasiswa.* | *Tabel data mahasiswa & filter program studi.* |

| 🏫 Program Studi (Light) | 👤 Profile (Light) |
| :---: | :---: |
| <img src="public/img/preview/prodi-light.png" width="100%" alt="Program Studi Light"> | <img src="public/img/preview/profile-light.png" width="100%" alt="Profile Light"> |
| *Kelola data program studi & fakultas.* | *Pengaturan profil administrator.* |

---

### 🌙 Dark Mode

| 📊 Dashboard (Dark) | 📄 Data Mahasiswa (Dark) |
| :---: | :---: |
| <img src="public/img/preview/dashboard-dark.png" width="100%" alt="Dashboard Dark"> | <img src="public/img/preview/mahasiswa-dark.png" width="100%" alt="Data Mahasiswa Dark"> |
| *Nuansa Crimson Dark Mode yang nyaman di mata.* | *Daftar data mahasiswa dalam mode gelap.* |

| 🏫 Program Studi (Dark) | 👤 Profile (Dark) |
| :---: | :---: |
| <img src="public/img/preview/prodi-dark.png" width="100%" alt="Program Studi Dark"> | <img src="public/img/preview/profile-dark.png" width="100%" alt="Profile Dark"> |
| *Tampilan program studi mode gelap.* | *Halaman profil dengan tema adaptif.* |
---

## 👥 Tim Kontributor

Proyek ini dikembangkan dengan dedikasi dan kerja sama tim oleh mahasiswa **Sekolah Tinggi Teknologi Bontang (STITEK Bontang)**:

<div align="center">

<table>
  <tr>
    <td align="center" width="200px">
      <br>
      <img src="https://github.com/github.png" width="80px" style="border-radius:50%;" alt="Foto Developer 1"><br><br>
      <b>[Nama Anda]</b><br>
      <sub>Fullstack Developer</sub><br><br>
      <a href="https://github.com/username">
        <img src="https://img.shields.io/badge/GitHub-Profile-181717?style=flat-square&logo=github">
      </a>
      <br><br>
    </td>
    <td align="center" width="200px">
      <br>
      <img src="https://github.com/github.png" width="80px" style="border-radius:50%;" alt="Foto Developer 2"><br><br>
      <b>[Nama Anggota 2]</b><br>
      <sub>UI/UX & Frontend</sub><br><br>
      <a href="https://github.com/username2">
        <img src="https://img.shields.io/badge/GitHub-Profile-181717?style=flat-square&logo=github">
      </a>
      <br><br>
    </td>
    <td align="center" width="200px">
      <br>
      <img src="https://github.com/github.png" width="80px" style="border-radius:50%;" alt="Foto Developer 3"><br><br>
      <b>[Nama Anggota 3]</b><br>
      <sub>Database Specialist</sub><br><br>
      <a href="https://github.com/username3">
        <img src="https://img.shields.io/badge/GitHub-Profile-181717?style=flat-square&logo=github">
      </a>
      <br><br>
    </td>
  </tr>
</table>

</div>

---

## 🎓 Ucapan Terima Kasih & Penutup

Terima kasih kepada Dosen Pengampu, Civitas Akademika **STITEK Bontang**, serta seluruh pihak yang telah mendukung terselesaikannya pengembangan **Sistem Informasi Manajemen Mahasiswa** ini.

Semoga aplikasi ini bermanfaat dan dapat menjadi referensi pengembangan aplikasi web berbasis Laravel selanjutnya!

<div align="center">

---
⭐ **Jangan lupa berikan Star pada repository ini jika proyek ini bermanfaat!** ⭐

</div>
