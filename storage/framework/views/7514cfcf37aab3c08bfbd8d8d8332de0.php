
<?php $__env->startSection('title', 'Detail Program Studi'); ?>
<?php $__env->startSection('page-title', 'Detail Program Studi'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid py-3">

    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Detail Program Studi</h2>
            <p class="text-muted mb-0">Informasi program studi dan statistik mahasiswa.</p>
        </div>
        <a href="<?php echo e(route('prodi.index')); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="row g-4">
        
        <div class="col-md-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <div 
                            class="bg-primary text-white rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3 shadow-sm"
                            style="width: 80px; height: 80px;"
                        >
                            <i class="bi bi-building fs-1"></i>
                        </div>
                        <h4 class="fw-bold mb-1"><?php echo e($prodi->nama_prodi); ?></h4>
                        <span class="badge bg-primary px-3 py-2 fs-6"><?php echo e($prodi->kode_prodi); ?></span>
                    </div>

                    <hr class="my-3">

                    <div class="mb-3">
                        <label class="fw-bold text-muted small d-block">Fakultas:</label>
                        <span class="fs-6"><?php echo e($prodi->fakultas ?? '-'); ?></span>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold text-muted small d-block">Total Mahasiswa:</label>
                        <span class="badge bg-info text-dark fs-6">
                            <?php echo e($prodi->mahasiswas->count()); ?> Mahasiswa
                        </span>
                    </div>

                    <div class="d-flex gap-2 mt-3">
                        <div class="flex-fill p-2 rounded-3 bg-success bg-opacity-10 text-center">
                            <span class="d-block text-muted small fw-semibold">Aktif</span>
                            <h5 class="fw-bold text-success mb-0"><?php echo e($totalAktif ?? 0); ?></h5>
                        </div>
                        <div class="flex-fill p-2 rounded-3 bg-danger bg-opacity-10 text-center">
                            <span class="d-block text-muted small fw-semibold">Tidak Aktif</span>
                            <h5 class="fw-bold text-danger mb-0"><?php echo e($totalTidakAktif ?? 0); ?></h5>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h6 class="fw-bold mb-0">Rasio Status Mahasiswa</h6>
                </div>
                <div class="card-body px-4 pb-4 d-flex justify-content-center">
                    <div style="height: 200px; width: 100%;">
                        <canvas id="prodiStatusPieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="fw-bold mb-0">Daftar Mahasiswa</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">NIM</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th class="pe-4">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $prodi->mahasiswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mahasiswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="ps-4 font-monospace small text-secondary"><?php echo e($mahasiswa->nim); ?></td>
                                        <td class="fw-semibold"><?php echo e($mahasiswa->nama); ?></td>
                                        <td><?php echo e($mahasiswa->jenis_kelamin); ?></td>
                                        <td class="pe-4">
                                            <?php if(isset($mahasiswa->status) && $mahasiswa->status == 'tidak_aktif'): ?>
                                                <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2.5 py-1 rounded-pill">
                                                    <i class="bi bi-circle-fill small me-1" style="font-size: 5px;"></i> Tidak Aktif
                                                </span>
                                            <?php else: ?>
                                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2.5 py-1 rounded-pill">
                                                    <i class="bi bi-circle-fill small me-1" style="font-size: 5px;"></i> Aktif
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-5">
                                            <i class="bi bi-people fs-1 text-muted d-block mb-2"></i>
                                            Belum ada mahasiswa di program studi ini.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const isDarkMode = document.body.classList.contains('dark-mode');
    const chartTextColor = isDarkMode ? '#94a3b8' : '#64748b';

    // Pie Chart Rasio Status Mahasiswa per Prodi
    const pieCtx = document.getElementById('prodiStatusPieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'doughnut',
        data: {
            labels: ['Aktif', 'Tidak Aktif'],
            datasets: [{
                data: [<?php echo e($totalAktif ?? 0); ?>, <?php echo e($totalTidakAktif ?? 0); ?>],
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
                    labels: { color: chartTextColor, font: { weight: '600', size: 11 } }
                }
            },
            cutout: '65%'
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ACER\sim-mahasiswa\resources\views/prodi/show.blade.php ENDPATH**/ ?>