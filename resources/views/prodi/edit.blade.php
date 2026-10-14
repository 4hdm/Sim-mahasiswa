@extends('layouts.app')
@section('title', 'Program Studi')
@section('page-title', 'Program Studi')
@section('content')
<div class="container-fluid py-3">

    {{-- HEADER PAGE --}}
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Edit Program Studi</h2>
        <p class="text-muted mb-0">Perbarui informasi program studi.</p>
    </div>

    {{-- CARD FORM --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <form action="{{ route('prodi.update', $prodi) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    {{-- KODE PRODI --}}
                    <div class="col-md-6">
                        <label for="kode_prodi" class="form-label fw-semibold">Kode Program Studi</label>
                        <input 
                            type="text" 
                            id="kode_prodi"
                            name="kode_prodi" 
                            class="form-control @error('kode_prodi') is-invalid @enderror" 
                            value="{{ old('kode_prodi', $prodi->kode_prodi) }}" 
                            required
                        >
                        @error('kode_prodi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- NAMA PRODI --}}
                    <div class="col-md-6">
                        <label for="nama_prodi" class="form-label fw-semibold">Nama Program Studi</label>
                        <input 
                            type="text" 
                            id="nama_prodi"
                            name="nama_prodi" 
                            class="form-control @error('nama_prodi') is-invalid @enderror" 
                            value="{{ old('nama_prodi', $prodi->nama_prodi) }}" 
                            required
                        >
                        @error('nama_prodi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- FAKULTAS --}}
                    <div class="col-12">
                        <label for="fakultas" class="form-label fw-semibold">Fakultas</label>
                        <input 
                            type="text" 
                            id="fakultas"
                            name="fakultas" 
                            class="form-control @error('fakultas') is-invalid @enderror" 
                            value="{{ old('fakultas', $prodi->fakultas) }}"
                        >
                        @error('fakultas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                {{-- TOMBOL AKSI --}}
                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="{{ route('prodi.index') }}" class="btn btn-light border">
                        <i class="bi bi-x-circle me-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-1"></i> Update Data
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection