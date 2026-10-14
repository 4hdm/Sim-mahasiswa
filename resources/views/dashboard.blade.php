@extends('layouts.app')
@section('title', 'Dashboard SIM Mahasiswa')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <h2 class="fw-bold mb-1 fs-4">Selamat Datang Kembali, {{ auth()->user()->name ?? 'Administrator' }} 👋</h2>
        <p class="text-muted small mb-0">Berikut adalah ringkasan data statistik akademik mahasiswa saat ini.</p>
    </div>
    <div>
        <a href="{{ route('mahasiswa.create') ?? '#' }}" class="btn text-white rounded-pill px-4 shadow-sm" style="background: linear-gradient(135deg, #f43f5e 0%, #881337 100%); border: none;">
            <i class="bi bi-plus-circle me-1"></i> Tambah Mahasiswa
        </a>
    </div>
</div>

{{-- STATISTIK (Total, Aktif, Tidak Aktif, Gender, Prodi) --}}
<div class="row g-3 mb-4">
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted d-block small fw-semibold mb-1">Total Mhs</span>
                        <h3 class="fw-bold mb-0">{{ $totalMahasiswa ?? 0 }}</h3>
                    </div>
                    <div class="p-2.5 rounded-3 bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-people fs-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted d-block small fw-semibold mb-1">Aktif</span>
                        <h3 class="fw-bold mb-0 text-success">{{ $totalAktif ?? 0 }}</h3>
                    </div>
                    <div class="p-2.5 rounded-3 bg-success bg-opacity-10 text-success">
                        <i class="bi bi-person-check fs-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted d-block small fw-semibold mb-1">Tidak Aktif</span>
                        <h3 class="fw-bold mb-0 text-danger">{{ $totalTidakAktif ?? 0 }}</h3>
                    </div>
                    <div class="p-2.5 rounded-3 bg-danger bg-opacity-10 text-danger">
                        <i class="bi bi-person-dash fs-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted d-block small fw-semibold mb-1">Laki-laki</span>
                        <h3 class="fw-bold mb-0 text-primary">{{ $totalLaki ?? 0 }}</h3>
                    </div>
                    <div class="p-2.5 rounded-3 bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-gender-male fs-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted d-block small fw-semibold mb-1">Perempuan</span>
                        <h3 class="fw-bold mb-0" style="color: #ec4899;">{{ $totalPerempuan ?? 0 }}</h3>
                    </div>
                    <div class="p-2.5 rounded-3" style="background-color: rgba(236, 72, 153, 0.1); color: #ec4899;">
                        <i class="bi bi-gender-female fs-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-body p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted d-block small fw-semibold mb-1">Prodi</span>
                        <h3 class="fw-bold mb-0 text-warning">{{ $totalProdi ?? 0 }}</h3>
                    </div>
                    <div class="p-2.5 rounded-3 bg-warning bg-opacity-10 text-warning">
                        <i class="bi bi-mortarboard fs-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SECTION GRAFIK: LINE CHART & PIE CHART --}}
<div class="row g-4 mb-4">
    <!-- Line Chart: Mahasiswa Antar Prodi -->
    <div class="col-xl-8">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header py-3 px-4 border-bottom-0">
                <h5 class="fw-bold mb-1">Grafik Mahasiswa Antar Program Studi</h5>
                <p class="text-muted small mb-0">Sebaran jumlah mahasiswa di setiap program studi</p>
            </div>
            <div class="card-body px-4 pb-4">
                <div style="height: 280px;">
                    <canvas id="prodiLineChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie / Doughnut Chart: Mahasiswa Aktif dan Tidak Aktif -->
    <div class="col-xl-4">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header py-3 px-4 border-bottom-0">
                <h5 class="fw-bold mb-1">Rasio Status Mahasiswa</h5>
                <p class="text-muted small mb-0">Perbandingan aktif & tidak aktif</p>
            </div>
            <div class="card-body px-4 pb-4 d-flex align-items-center justify-content-center">
                <div style="height: 220px; width: 100%;">
                    <canvas id="statusPieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SECTION TABEL & DEMOGRAFI GENDER --}}
<div class="row g-4">
    <!-- TABEL MAHASISWA TERBARU -->
    <div class="col-xl-8">
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-header py-3 px-4 border-bottom-0">
                <h5 class="mb-0 fw-bold">Mahasiswa Terbaru</h5>
                <p class="text-muted small mb-0">Daftar mahasiswa yang baru terdaftar beserta status keaktifannya.</p>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light text-uppercase fs-7 text-secondary">
                            <tr>
                                <th class="py-3 px-4">NIM</th>
                                <th class="py-3 px-4">Nama</th>
                                <th class="py-3 px-4">Program Studi</th>
                                <th class="py-3 px-4">Jenis Kelamin</th>
                                <th class="py-3 px-4">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mahasiswaTerbaru ?? [] as $mahasiswa)
                                <tr>
                                    <td class="px-4 text-secondary font-monospace small">{{ $mahasiswa->nim }}</td>
                                    <td class="px-4 fw-semibold">{{ $mahasiswa->nama }}</td>
                                    <td class="px-4 text-secondary">{{ $mahasiswa->prodi->nama_prodi ?? '-' }}</td>
                                    <td class="px-4 text-secondary">{{ $mahasiswa->jenis_kelamin }}</td>
                                    <td class="px-4">
                                        @if(isset($mahasiswa->status) && $mahasiswa->status == 'tidak_aktif')
                                            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-3 py-1.5 rounded-pill">
                                                <i class="bi bi-circle-fill small me-1" style="font-size: 6px;"></i> Tidak Aktif
                                            </span>
                                        @else
                                            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-1.5 rounded-pill">
                                                <i class="bi bi-circle-fill small me-1" style="font-size: 6px;"></i> Aktif
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        Belum ada data mahasiswa.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- TABEL / DEMOGRAFI GENDER (Laki-laki & Perempuan) -->
    <div class="col-xl-4">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header py-3 px-4 border-bottom-0">
                <h5 class="fw-bold mb-1">Rasio Jenis Kelamin</h5>
                <p class="text-muted small mb-0">Distribusi mahasiswa berdasarkan gender</p>
            </div>
            <div class="card-body px-4 d-flex flex-column justify-content-center">
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="fw-bold text-primary"><i class="bi bi-gender-male me-1"></i> Laki-laki</span>
                        <span class="fw-bold">{{ $totalLaki ?? 0 }} Orang</span>
                    </div>
                    <div class="progress rounded-pill" style="height: 10px;">
                        @php 
                            $totalMhs = ($totalMahasiswa > 0) ? $totalMahasiswa : 1;
                            $persenLaki = (($totalLaki ?? 0) / $totalMhs) * 100;
                        @endphp
                        <div class="progress-bar bg-primary rounded-pill" role="progressbar" style="width: {{ $persenLaki }}%"></div>
                    </div>
                </div>

                <div>
                    <div class="d-flex justify-content-between mb-1">
                        <span class="fw-bold" style="color: #ec4899;"><i class="bi bi-gender-female me-1"></i> Perempuan</span>
                        <span class="fw-bold">{{ $totalPerempuan ?? 0 }} Orang</span>
                    </div>
                    <div class="progress rounded-pill" style="height: 10px;">
                        @php 
                            $persenPerempuan = (($totalPerempuan ?? 0) / $totalMhs) * 100;
                        @endphp
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: {{ $persenPerempuan }}%; background-color: #ec4899;"></div>
                    </div>
                </div>

                <div class="mt-4 p-3 rounded-4 bg-light border text-center">
                    <span class="text-muted d-block small">Total Keseluruhan Mahasiswa</span>
                    <h4 class="fw-bold mb-0 text-dark">{{ $totalMahasiswa ?? 0 }} Mahasiswa</h4>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
{{-- Library Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Penyesuaian warna teks grafik otomatis untuk Dark/Light Mode
    const isDarkMode = document.body.classList.contains('dark-mode');
    const chartTextColor = isDarkMode ? '#94a3b8' : '#64748b';
    const chartGridColor = isDarkMode ? '#334155' : '#f1f5f9';

    // 1. Line Chart: Mahasiswa Antar Prodi
    const lineCtx = document.getElementById('prodiLineChart').getContext('2d');
    new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($chartLabels ?? []) !!},
            datasets: [{
                label: 'Jumlah Mahasiswa',
                data: {!! json_encode($chartData ?? []) !!},
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.35,
                pointBackgroundColor: '#0d6efd',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2,
                pointRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: chartGridColor },
                    ticks: { color: chartTextColor, stepSize: 1 }
                },
                x: {
                    grid: { display: false },
                    ticks: { color: chartTextColor }
                }
            }
        }
    });

    // 2. Pie / Doughnut Chart: Mahasiswa Aktif dan Tidak Aktif
    const pieCtx = document.getElementById('statusPieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'doughnut',
        data: {
            labels: ['Aktif', 'Tidak Aktif'],
            datasets: [{
                data: [{{ $totalAktif ?? 0 }}, {{ $totalTidakAktif ?? 0 }}],
                backgroundColor: ['#198754', '#dc3545'],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { color: chartTextColor, font: { weight: '600', size: 12 } }
                }
            },
            cutout: '70%'
        }
    });
</script>
@endpush
@endsection