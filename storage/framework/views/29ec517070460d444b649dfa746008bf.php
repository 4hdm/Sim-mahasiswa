
<?php $__env->startSection('title', 'Program Studi'); ?>
<?php $__env->startSection('page-title', 'Program Studi'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid py-3">

    
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Edit Program Studi</h2>
        <p class="text-muted mb-0">Perbarui informasi program studi.</p>
    </div>

    
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <form action="<?php echo e(route('prodi.update', $prodi)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="row g-3">
                    
                    <div class="col-md-6">
                        <label for="kode_prodi" class="form-label fw-semibold">Kode Program Studi</label>
                        <input 
                            type="text" 
                            id="kode_prodi"
                            name="kode_prodi" 
                            class="form-control <?php $__errorArgs = ['kode_prodi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                            value="<?php echo e(old('kode_prodi', $prodi->kode_prodi)); ?>" 
                            required
                        >
                        <?php $__errorArgs = ['kode_prodi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div class="col-md-6">
                        <label for="nama_prodi" class="form-label fw-semibold">Nama Program Studi</label>
                        <input 
                            type="text" 
                            id="nama_prodi"
                            name="nama_prodi" 
                            class="form-control <?php $__errorArgs = ['nama_prodi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                            value="<?php echo e(old('nama_prodi', $prodi->nama_prodi)); ?>" 
                            required
                        >
                        <?php $__errorArgs = ['nama_prodi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div class="col-12">
                        <label for="fakultas" class="form-label fw-semibold">Fakultas</label>
                        <input 
                            type="text" 
                            id="fakultas"
                            name="fakultas" 
                            class="form-control <?php $__errorArgs = ['fakultas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                            value="<?php echo e(old('fakultas', $prodi->fakultas)); ?>"
                        >
                        <?php $__errorArgs = ['fakultas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                
                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="<?php echo e(route('prodi.index')); ?>" class="btn btn-light border">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ACER\sim-mahasiswa\resources\views/prodi/edit.blade.php ENDPATH**/ ?>