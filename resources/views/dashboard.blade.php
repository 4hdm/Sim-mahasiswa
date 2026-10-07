@extends('layouts.app')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Dashboard</h2>
        <p class="text-muted mb-0">Selamat datang kembali, {{ auth()->user()->name }}</p>
    </div>
    <div>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Mahasiswa
        </a>
    </div>
</div>

{{-- STATISTIK --}}
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card stat-card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Total Mahasiswa</small>
                        <h2 class="fw-bold mb-0">{{ $totalMahasiswa }}</h2>
                    </div>
                    <i class="bi bi-people fs-1 text-primary"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card shadow-sm">
            <div class="card-body">
                <small class="text-muted">Laki-laki</small>
                <h2 class="fw-bold text-primary mb-0">{{ $totalLaki }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card shadow-sm">
            <div class="card-body">
                <small class="text-muted">Perempuan</small>
                <h2 class="fw-bold text-danger mb-0">{{ $totalPerempuan }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card shadow-sm">
            <div class="card-body">
                <small class="text-muted">Program Studi</small>
                <h2 class="fw-bold text-success mb-0">{{ $totalProdi }}</h2>
            </div>
        </div>
    </div>
</div>

{{-- DATA TERBARU --}}
<div class="card shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold">Mahasiswa Terbaru</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mahasiswaTerbaru as $mahasiswa)
                        <tr>
                            <td>{{ $mahasiswa->nim }}</td>
                            <td class="fw-semibold">{{ $mahasiswa->nama }}</td>
                            <td>{{ $mahasiswa->prodi->nama_prodi }}</td>
                            <td>{{ $mahasiswa->jenis_kelamin }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Belum ada data mahasiswa.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Container Grafik --}}
<div class="card shadow-sm mt-4">
    <div class="card-header bg-white py-3">
        <h5 class="fw-bold mb-0">Grafik Jumlah Mahasiswa per Program Studi</h5>
    </div>
    <div class="card-body">
        <canvas id="prodiChart" height="100"></canvas>
    </div>
</div>

@push('scripts')
{{-- Library Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('prodiChart').getContext('2d');
    
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($chartLabels) !!},
            datasets: [{
                label: 'Jumlah Mahasiswa',
                data: {!! json_encode($chartData) !!},
                backgroundColor: '#1565c0',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
@endpush
@endsection