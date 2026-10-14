
<?php $__env->startSection('title', 'Detail Mahasiswa'); ?>
<?php $__env->startSection('page-title', 'Detail Mahasiswa'); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Detail Mahasiswa</h2>
        <p class="text-muted mb-0">Informasi lengkap data mahasiswa.</p>
    </div>
    <a href="<?php echo e(route('mahasiswa.index')); ?>" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
            <h4 class="fw-bold text-primary mb-0"><?php echo e($mahasiswa->nama); ?></h4>
            <div class="d-flex align-items-center gap-2">
                
                <?php if($mahasiswa->status == 'aktif'): ?>
                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-bold">
                        <i class="bi bi-check-circle-fill me-1"></i> Aktif
                    </span>
                <?php else: ?>
                    <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill fw-bold">
                        <i class="bi bi-x-circle-fill me-1"></i> Tidak Aktif
                    </span>
                <?php endif; ?>

                <span class="badge bg-primary fs-6 px-3 py-2"><?php echo e($mahasiswa->nim); ?></span>
            </div>
        </div>

        <div class="row g-4 mb-4">
            
            <div class="col-md-6">
                <label class="text-muted small fw-semibold d-block">NIM</label>
                <p class="fw-semibold mb-0"><?php echo e($mahasiswa->nim); ?></p>
            </div>

            
            <div class="col-md-6">
                <label class="text-muted small fw-semibold d-block">Program Studi</label>
                <p class="fw-semibold mb-0"><?php echo e($mahasiswa->prodi->nama_prodi); ?></p>
            </div>

            
            <div class="col-md-6">
                <label class="text-muted small fw-semibold d-block">Jenis Kelamin</label>
                <p class="fw-semibold mb-0"><?php echo e($mahasiswa->jenis_kelamin); ?></p>
            </div>

            
            <div class="col-md-6">
                <label class="text-muted small fw-semibold d-block">Tanggal Lahir</label>
                <p class="fw-semibold mb-0"><?php echo e($mahasiswa->tanggal_lahir?->format('d-m-Y') ?? '-'); ?></p>
            </div>

            
            <div class="col-md-6">
                <label class="text-muted small fw-semibold d-block">Email</label>
                <p class="fw-semibold mb-0"><?php echo e($mahasiswa->email ?? '-'); ?></p>
            </div>

            
            <div class="col-md-6">
                <label class="text-muted small fw-semibold d-block">Nomor Telepon</label>
                <p class="fw-semibold mb-0"><?php echo e($mahasiswa->telepon ?? '-'); ?></p>
            </div>

            
            <div class="col-12">
                <label class="text-muted small fw-semibold d-block">Alamat</label>
                <p class="fw-semibold mb-0"><?php echo e($mahasiswa->alamat ?? '-'); ?></p>
            </div>
        </div>

        
        <div class="border-top pt-3 d-flex gap-2">
            <a href="<?php echo e(route('mahasiswa.edit', $mahasiswa)); ?>" class="btn btn-warning">
                <i class="bi bi-pencil me-1"></i> Edit Data
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ACER\sim-mahasiswa\resources\views/mahasiswa/show.blade.php ENDPATH**/ ?>