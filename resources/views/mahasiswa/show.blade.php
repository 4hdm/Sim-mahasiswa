@extends('layouts.app')
@section('title', 'Tambah Mahasiswa')
@section('page-title', 'Tambah Mahasiswa')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Detail Mahasiswa</h2>
        <p class="text-muted mb-0">Informasi lengkap data mahasiswa.</p>
    </div>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
            <h4 class="fw-bold text-primary mb-0">{{ $mahasiswa->nama }}</h4>
            <span class="badge bg-primary fs-6">{{ $mahasiswa->nim }}</span>
        </div>

        <div class="row g-4 mb-4">
            {{-- NIM --}}
            <div class="col-md-6">
                <label class="text-muted small fw-semibold d-block">NIM</label>
                <p class="fw-semibold mb-0">{{ $mahasiswa->nim }}</p>
            </div>

            {{-- PROGRAM STUDI --}}
            <div class="col-md-6">
                <label class="text-muted small fw-semibold d-block">Program Studi</label>
                <p class="fw-semibold mb-0">{{ $mahasiswa->prodi->nama_prodi }}</p>
            </div>

            {{-- JENIS KELAMIN --}}
            <div class="col-md-6">
                <label class="text-muted small fw-semibold d-block">Jenis Kelamin</label>
                <p class="fw-semibold mb-0">{{ $mahasiswa->jenis_kelamin }}</p>
            </div>

            {{-- TANGGAL LAHIR --}}
            <div class="col-md-6">
                <label class="text-muted small fw-semibold d-block">Tanggal Lahir</label>
                <p class="fw-semibold mb-0">{{ $mahasiswa->tanggal_lahir?->format('d-m-Y') ?? '-' }}</p>
            </div>

            {{-- EMAIL --}}
            <div class="col-md-6">
                <label class="text-muted small fw-semibold d-block">Email</label>
                <p class="fw-semibold mb-0">{{ $mahasiswa->email ?? '-' }}</p>
            </div>

            {{-- TELEPON --}}
            <div class="col-md-6">
                <label class="text-muted small fw-semibold d-block">Nomor Telepon</label>
                <p class="fw-semibold mb-0">{{ $mahasiswa->telepon ?? '-' }}</p>
            </div>

            {{-- ALAMAT --}}
            <div class="col-12">
                <label class="text-muted small fw-semibold d-block">Alamat</label>
                <p class="fw-semibold mb-0">{{ $mahasiswa->alamat ?? '-' }}</p>
            </div>
        </div>

        {{-- TOMBOL AKSI --}}
        <div class="border-top pt-3 d-flex gap-2">
            <a href="{{ route('mahasiswa.edit', $mahasiswa) }}" class="btn btn-warning">
                <i class="bi bi-pencil me-1"></i> Edit Data
            </a>
        </div>
    </div>
</div>
@endsection