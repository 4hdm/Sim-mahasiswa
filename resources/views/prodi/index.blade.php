@extends('layouts.app')
@section('title', 'Program Studi')
@section('page-title', 'Program Studi')
@section('content')
<div class="container-fluid py-3">

    {{-- HEADER & TOMBOL TAMBAH --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Program Studi</h2>
            <p class="text-muted mb-0">Kelola data program studi.</p>
        </div>
        <a href="{{ route('prodi.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm" style="background: linear-gradient(135deg, #f43f5e 0%, #881337 100%); border: none;">
            <i class="bi bi-plus-circle me-1"></i> Tambah Prodi
        </a>
    </div>

    {{-- KARTU RINGKASAN STATISTIK MINI --}}
    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted d-block small fw-semibold mb-1">Total Program Studi</span>
                        <h3 class="fw-bold mb-0" style="color: #f43f5e;" >{{ isset($prodis) ? $prodis->total() : 0 }} Prodi</h3>
                    </div>
                    <div class="p-2.5 rounded-3 bg-danger bg-opacity-10 text-danger">
                        <i class="bi bi-building fs-5"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 bg-white p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted d-block small fw-semibold mb-1">Total Fakultas / Kategori</span>
                        <h3 class="fw-bold mb-0 text-primary">
                            {{ isset($prodis) ? collect($prodis->items())->unique('fakultas')->count() : 0 }} Fakultas
                        </h3>
                    </div>
                    <div class="p-2.5 rounded-3 bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-diagram-3 fs-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CARD KONTEN UTAMA --}}
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">

            {{-- FORM PENCARIAN --}}
            <form action="{{ route('prodi.index') }}" method="GET" class="row g-2 mb-4">
                <div class="col-md-10">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                        <input 
                            type="text" 
                            name="search" 
                            class="form-control border-start-0 bg-light" 
                            placeholder="Cari kode, nama prodi, atau fakultas..." 
                            value="{{ request('search') }}"
                        >
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn text-white w-100 fw-semibold rounded-3 shadow-sm" style="background: linear-gradient(135deg, #f43f5e 0%, #881337 100%); border: none;">
                        <i class="bi bi-search me-1"></i> Cari
                    </button>
                </div>
            </form>

            {{-- TABEL DATA PRODI --}}
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-uppercase fs-7 text-secondary fw-bold">
                        <tr>
                            <th width="70" class="text-center py-3">#</th>
                            <th class="py-3">Kode</th>
                            <th class="py-3">Nama Program Studi</th>
                            <th class="py-3">Fakultas</th>
                            <th class="py-3">Jumlah Mahasiswa</th>
                            <th width="160" class="text-center py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($prodis as $prodi)
                            <tr>
                                {{-- Penomoran halaman --}}
                                <td class="text-center text-muted fw-semibold">
                                    {{ $prodis->firstItem() + $loop->index }}
                                </td>

                                {{-- Kode Prodi --}}
                                <td>
                                    <span class="badge rounded-pill px-3 py-1.5 text-white shadow-sm" style="background: linear-gradient(135deg, #f43f5e, #881337); font-size: 11px; letter-spacing: 0.5px;">
                                        {{ $prodi->kode_prodi }}
                                    </span>
                                </td>

                                {{-- Nama Prodi --}}
                                <td class="fw-bold text-dark">
                                    {{ $prodi->nama_prodi }}
                                </td>

                                {{-- Fakultas --}}
                                <td class="text-secondary fw-semibold">
                                    {{ $prodi->fakultas ?? '-' }}
                                </td>

                                {{-- Jumlah Mahasiswa --}}
                                <td>
                                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-1.5 rounded-pill fw-bold">
                                        {{ $prodi->mahasiswas_count }} Mahasiswa
                                    </span>
                                </td>

                                {{-- Akses Tombol (Detail, Edit, Hapus) --}}
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-1">
                                        {{-- Tombol Detail --}}
                                        <a href="{{ route('prodi.show', $prodi) }}" class="btn btn-sm btn-light text-info border rounded-3" title="Detail & Grafik">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        {{-- Tombol Edit --}}
                                        <a href="{{ route('prodi.edit', $prodi) }}" class="btn btn-sm btn-light text-warning border rounded-3" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        {{-- Tombol Hapus --}}
                                        <form action="{{ route('prodi.destroy', $prodi) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus prodi ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light text-danger border rounded-3" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            {{-- Tampilan saat data kosong --}}
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="mx-auto mb-3 rounded-circle bg-danger bg-opacity-10 text-danger d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                                        <i class="bi bi-building fs-3"></i>
                                    </div>
                                    <h5 class="fw-bold">Data Program Studi Tidak Ditemukan</h5>
                                    <p class="text-muted small mb-0">Belum ada data program studi atau pencarian tidak cocok.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- LINK PAGINASI --}}
            <div class="mt-4 d-flex justify-content-end">
                {{ $prodis->links() }}
            </div>

        </div>
    </div>

</div>
@endsection