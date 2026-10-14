@extends('layouts.app')
@section('title', 'Tambah Mahasiswa')
@section('page-title', 'Tambah Mahasiswa')
@section('content')
<div class="mb-4">
    <h2 class="fw-bold mb-1">Tambah Mahasiswa</h2>
    <p class="text-muted mb-0">Masukkan data mahasiswa baru.</p>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                {{-- NIM --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">NIM</label>
                    <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim') }}" required>
                    @error('nim')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- NAMA --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- PROGRAM STUDI --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Program Studi</label>
                    <select name="prodi_id" class="form-select @error('prodi_id') is-invalid @enderror" required>
                        <option value="">Pilih Program Studi</option>
                        @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id }}" @selected(old('prodi_id') == $prodi->id)>
                                {{ $prodi->nama_prodi }}
                            </option>
                        @endforeach
                    </select>
                    @error('prodi_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- JENIS KELAMIN --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" @selected(old('jenis_kelamin') == 'Laki-laki')>Laki-laki</option>
                        <option value="Perempuan" @selected(old('jenis_kelamin') == 'Perempuan')>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TANGGAL LAHIR --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') }}">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TELEPON --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nomor Telepon</label>
                    <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{ old('telepon') }}">
                    @error('telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                @php 
                    $isActive = old('status', 'aktif') == 'aktif';
                @endphp

                {{-- EMAIL (DISANDINGKAN DI SEBELAH KIRI) --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- STATUS MAHASISWA (DISANDINGKAN & DISAMAKAN UKURANNYA DENGAN INPUT EMAIL) --}}
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Status Mahasiswa</label>
                    <div class="form-control d-flex align-items-center justify-content-between px-3 py-2 bg-light @error('status') is-invalid @enderror" style="height: 38px;">
                        <div class="d-flex align-items-center gap-2">
                            <input 
                                class="form-check-input m-0" 
                                type="checkbox" 
                                role="switch" 
                                id="statusSwitch" 
                                name="status" 
                                value="aktif" 
                                {{ $isActive ? 'checked' : '' }}
                                style="width: 2.5em; height: 1.25em; cursor: pointer;"
                            >
                            <label class="form-check-label fw-bold {{ $isActive ? 'text-success' : 'text-danger' }} mb-0" for="statusSwitch" id="statusLabel" style="font-size: 14px;">
                                {{ $isActive ? 'Aktif' : 'Tidak Aktif' }}
                            </label>
                        </div>
                        <small class="text-muted fst-italic" id="statusDesc" style="font-size: 11.5px;">
                            {{ $isActive ? 'Mahasiswa sedang aktif berkuliah' : 'Mahasiswa sedang cuti, non-aktif, dll' }}
                        </small>
                    </div>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- ALAMAT --}}
                <div class="col-12">
                    <label class="form-label fw-semibold">Alamat</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- TOMBOL AKSI --}}
            <div class="mt-4 d-flex gap-2">
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn text-white shadow-sm" style="background: linear-gradient(135deg, #f43f5e 0%, #881337 100%); border: none;">
                    <i class="bi bi-save me-1"></i> Simpan
                </button>
            </div>
            
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Script Dinamis untuk Label & Keterangan Status Mahasiswa pada Form Tambah
    const statusSwitch = document.getElementById('statusSwitch');
    const statusLabel = document.getElementById('statusLabel');
    const statusDesc = document.getElementById('statusDesc');

    statusSwitch?.addEventListener('change', function() {
        if (this.checked) {
            statusLabel.innerText = 'Aktif';
            statusLabel.className = 'form-check-label fw-bold text-success mb-0';
            statusDesc.innerText = 'Mahasiswa sedang aktif berkuliah';
        } else {
            statusLabel.innerText = 'Tidak Aktif';
            statusLabel.className = 'form-check-label fw-bold text-danger mb-0';
            statusDesc.innerText = 'Mahasiswa sedang cuti, non-aktif, dll';
        }
    });
</script>
@endpush
@endsection