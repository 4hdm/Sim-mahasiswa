<?php $__env->startSection('title', 'Profile'); ?>
<?php $__env->startSection('page-title', 'Profile'); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Profile Saya</h2>
        <p class="text-muted small mb-0">Kelola informasi akun dan pengaturan keamanan sistem Anda.</p>
    </div>

    <div class="row g-4">
        
        <div class="col-lg-4 order-lg-2">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                
                <div class="p-4 text-center position-relative" style="background: linear-gradient(135deg, #881337 0%, #4c0519 100%); min-height: 120px;">
                    <span class="badge bg-white bg-opacity-20 text-white rounded-pill px-3 py-1 position-absolute top-0 end-0 m-3 small backdrop-blur">
                        <i class="bi bi-shield-check me-1"></i> Terverifikasi
                    </span>
                </div>
                
                
                <div class="card-body text-center pt-0 position-relative" style="margin-top: -50px;">
                    <div class="d-inline-block position-relative mb-3">
                        <div class="user-avatar rounded-circle d-flex align-items-center justify-content-center text-white fw-bold shadow-lg mx-auto" 
                             style="width: 95px; height: 95px; background: linear-gradient(135deg, #f43f5e, #881337); font-size: 36px; border: 4px solid var(--card-bg, #ffffff);">
                            <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

                        </div>
                    </div>

                    <h5 class="fw-bold mb-1"><?php echo e($user->name); ?></h5>
                    <p class="text-muted small mb-2"><?php echo e($user->email); ?></p>
                    <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-3 py-1.5 rounded-pill fw-semibold">
                        Administrator
                    </span>

                    <hr class="my-4">

                    
                    <div class="row g-2 text-center">
                        <div class="col-6">
                            <div class="p-2.5 rounded-3 bg-light dark-mode-box">
                                <span class="text-muted d-block small mb-1">Status Sesi</span>
                                <span class="fw-bold text-success small"><i class="bi bi-circle-fill me-1" style="font-size: 7px;"></i> Aktif</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-2.5 rounded-3 bg-light dark-mode-box">
                                <span class="text-muted d-block small mb-1">Level Akses</span>
                                <span class="fw-bold text-primary small">Full Access</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-transparent py-3 px-4 border-bottom-0">
                    <h6 class="fw-bold mb-0"><i class="bi bi-shield-lock me-2 text-danger"></i>Keamanan Sesi</h6>
                </div>
                <div class="card-body px-4 pt-0">
                    <div class="d-flex align-items-center gap-3 p-2.5 rounded-3 border">
                        <div class="p-2 rounded-3 bg-primary bg-opacity-10 text-primary">
                            <i class="bi bi-display fs-5"></i>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <span class="fw-bold d-block small text-truncate">Web Application - Browser Session</span>
                            <small class="text-success fw-semibold" style="font-size: 11px;">Sesi ini • Aktif Sekarang</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-lg-8 order-lg-1">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-transparent py-3 px-4 border-bottom-0">
                    <h5 class="fw-bold mb-1">Informasi Profile</h5>
                    <small class="text-muted">Perbarui nama dan alamat email akun Anda.</small>
                </div>
                
                <div class="card-body px-4 pt-2">
                    <form action="<?php echo e(route('profile.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>

                        
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold small">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-person text-muted"></i></span>
                                <input 
                                    type="text" 
                                    id="name"
                                    name="name" 
                                    value="<?php echo e(old('name', $user->name)); ?>"
                                    class="form-control border-start-0 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="Masukkan nama lengkap"
                                >
                                <?php $__errorArgs = ['name'];
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

                        
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold small">Alamat Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                                <input 
                                    type="email" 
                                    id="email"
                                    name="email" 
                                    value="<?php echo e(old('email', $user->email)); ?>"
                                    class="form-control border-start-0 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="nama@domain.com"
                                >
                                <?php $__errorArgs = ['email'];
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

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">
                                <i class="bi bi-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-transparent py-3 px-4 border-bottom-0">
                    <h5 class="fw-bold mb-1">Ubah Password</h5>
                    <small class="text-muted">Gunakan kombinasi password yang kuat dengan minimal 8 karakter.</small>
                </div>

                <div class="card-body px-4 pt-2">
                    <form action="<?php echo e(route('profile.password.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="mb-3">
                            <label for="current_password" class="form-label fw-semibold small">Password Saat Ini</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-key text-muted"></i></span>
                                <input 
                                    type="password" 
                                    id="current_password"
                                    name="current_password" 
                                    class="form-control border-start-0 <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="••••••••"
                                >
                                <?php $__errorArgs = ['current_password'];
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

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label fw-semibold small">Password Baru</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                                    <input 
                                        type="password" 
                                        id="password"
                                        name="password" 
                                        class="form-control border-start-0 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="••••••••"
                                    >
                                    <?php $__errorArgs = ['password'];
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

                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label fw-semibold small">Konfirmasi Password Baru</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-shield-check text-muted"></i></span>
                                    <input 
                                        type="password" 
                                        id="password_confirmation"
                                        name="password_confirmation" 
                                        class="form-control border-start-0"
                                        placeholder="••••••••"
                                    >
                                </div>
                            </div>
                        </div>

                        
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="small text-muted">Kekuatan Password:</span>
                                <span id="strengthText" class="small fw-bold text-muted">-</span>
                            </div>
                            <div class="progress rounded-pill" style="height: 6px;">
                                <div id="strengthBar" class="progress-bar rounded-pill" role="progressbar" style="width: 0%;"></div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-warning text-dark fw-bold rounded-pill px-4">
                                <i class="bi bi-key me-1"></i> Ubah Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Live Password Strength Indicator
    const newPasswordInput = document.getElementById('password');
    const strengthBar = document.getElementById('strengthBar');
    const strengthText = document.getElementById('strengthText');

    newPasswordInput?.addEventListener('input', function() {
        const val = this.value;
        let score = 0;

        if (val.length >= 8) score += 25;
        if (/[A-Z]/.test(val)) score += 25;
        if (/[0-9]/.test(val)) score += 25;
        if (/[^A-Za-z0-9]/.test(val)) score += 25;

        strengthBar.style.width = score + '%';

        if (score === 0) {
            strengthBar.className = 'progress-bar rounded-pill';
            strengthText.innerText = '-';
            strengthText.className = 'small fw-bold text-muted';
        } else if (score <= 50) {
            strengthBar.className = 'progress-bar bg-danger rounded-pill';
            strengthText.innerText = 'Lemah';
            strengthText.className = 'small fw-bold text-danger';
        } else if (score <= 75) {
            strengthBar.className = 'progress-bar bg-warning rounded-pill';
            strengthText.innerText = 'Sedang';
            strengthText.className = 'small fw-bold text-warning';
        } else {
            strengthBar.className = 'progress-bar bg-success rounded-pill';
            strengthText.innerText = 'Sangat Kuat';
            strengthText.className = 'small fw-bold text-success';
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ACER\sim-mahasiswa\resources\views/profile/edit.blade.php ENDPATH**/ ?>