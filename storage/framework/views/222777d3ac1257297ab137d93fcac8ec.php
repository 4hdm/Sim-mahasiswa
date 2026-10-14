<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?> | SIM Mahasiswa</title>

    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* ==========================================================================
           1. GLOBAL STYLES & LUXURIOUS CRIMSON DARK MODE VARIABLES
           ========================================================================== */
        * {
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        :root {
            --bg-body: #f8fafc;
            --bg-topbar: #ffffff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --card-bg: #ffffff;
            --sidebar-grad: linear-gradient(135deg, #881337 0%, #4c0519 100%);
        }

        .dark-mode {
            --bg-body: #2d040f;          /* Background utama berubah jadi merah gelap/crimson mewah */
            --bg-topbar: #4c0519;        /* Topbar bernuansa merah gelap */
            --text-main: #f9fafb;
            --text-muted: #cbd5e1;
            --border-color: #6b102b;     /* Border dengan sentuhan merah marun */
            --card-bg: #4c0519;
            --sidebar-grad: linear-gradient(135deg, #4c0519 0%, #1a0208 100%);
        }

        body {
            margin: 0;
            background-color: var(--bg-body);
            color: var(--text-main);
            transition: background-color 0.4s ease, color 0.4s ease;
        }

        /* ==========================================================================
           2. SIDEBAR NAVIGATION
           ========================================================================== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 265px;
            height: 100vh;
            background: var(--sidebar-grad);
            color: #ffffff;
            z-index: 1050;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
            box-shadow: 4px 0 25px rgba(0, 0, 0, 0.1);
        }

        .dark-mode .sidebar {
            background: #fbf1f1 !important;
            color: #0f172a !important;
            box-shadow: 4px 0 25px rgba(0, 0, 0, 0.15);
            border-right: 1px solid #e2e8f0;
        }

        .sidebar.collapsed {
            margin-left: -265px;
        }

        .sidebar-brand {
            height: 80px;
            display: flex;
            align-items: center;
            padding: 0 24px;
            font-size: 19px;
            font-weight: 800;
            color: #ffffff;
            text-decoration: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            letter-spacing: -0.5px;
        }

        .sidebar-brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 20px;
            color: #f43f5e;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }

        .dark-mode .sidebar-brand-icon {
            background: rgba(136, 19, 55, 0.1) !important;
            color: #881337 !important;
        }

        .sidebar-menu {
            padding: 24px 14px;
        }

        .menu-title {
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: rgba(255, 255, 255, 0.4);
            padding: 12px 14px;
        }

        .dark-mode .menu-title {
            color: #94a3b8 !important;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 13px 16px;
            margin-bottom: 6px;
            color: rgba(255, 255, 255, 0.75);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.25s ease;
        }

        .dark-mode .sidebar-link {
            color: #334155 !important;
        }

        .sidebar-link i {
            font-size: 18px;
            width: 24px;
        }

        .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #ffffff;
            transform: translateX(4px);
        }

        .dark-mode .sidebar-link:hover {
            background: rgba(136, 19, 55, 0.08) !important;
            color: #881337 !important;
        }

        .sidebar-link.active {
            background: #ffffff;
            color: #881337;
            font-weight: 700;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        .dark-mode .sidebar-link.active {
            background: #881337 !important;
            color: #ffffff !important;
            box-shadow: 0 10px 25px rgba(136, 19, 55, 0.3);
        }

        /* ==========================================================================
           3. MAIN LAYOUT & TOPBAR
           ========================================================================== */
        .main-wrapper {
            margin-left: 265px;
            min-height: 100vh;
            transition: margin-left 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .main-wrapper.expanded {
            margin-left: 0;
        }

        .topbar {
            height: 80px;
            background-color: var(--bg-topbar);
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(12px);
            transition: background-color 0.4s ease, border-color 0.4s ease;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .page-title {
            font-weight: 800;
            font-size: 20px;
            margin: 0;
            color: var(--text-main);
            letter-spacing: -0.5px;
        }

        .page-subtitle {
            font-size: 12px;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* User Info & Controls */
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .theme-toggle-btn {
            background: var(--bg-body);
            border: 1px solid var(--border-color);
            color: var(--text-main);
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .theme-toggle-btn:hover {
            border-color: #f43f5e;
            color: #f43f5e;
            transform: scale(1.05);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-left: 10px;
            border-left: 1px solid var(--border-color);
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: linear-gradient(135deg, #f43f5e, #881337);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 4px 12px rgba(244, 63, 94, 0.3);
        }

        .user-name {
            font-size: 14px;
            font-weight: 700;
            color: var(--text-main);
            line-height: 1.2;
        }

        .user-role {
            font-size: 11px;
            color: var(--text-muted);
            font-weight: 600;
        }

        /* ==========================================================================
           4. MAIN CONTENT & COMPONENTS ADAPTIVE
           ========================================================================== */
        .content {
            padding: 35px;
        }

        /* Penyesuaian Komponen Bootstrap untuk Dark/Light Mode */
        .dark-mode .card {
            background-color: var(--card-bg) !important;
            color: var(--text-main) !important;
            border: 1px solid var(--border-color) !important;
        }
        .dark-mode .card-header {
            background-color: var(--card-bg) !important;
            border-bottom: 1px solid var(--border-color) !important;
            color: var(--text-main) !important;
        }
        .dark-mode .table {
            color: var(--text-main) !important;
            border-color: var(--border-color) !important;
        }
        .dark-mode .table-light {
            background-color: rgba(255,255,255,0.03) !important;
            color: var(--text-muted) !important;
        }
        .dark-mode .text-muted {
            color: var(--text-muted) !important;
        }

        .dark-mode .sidebar-brand span:last-child {
            color: #aa2c41 !important;
        }

        .card {
            border: 0;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
            transition: all 0.3s ease;
        }

        .card-header {
            border-bottom: 1px solid var(--border-color);
            padding: 22px 25px;
            background-color: transparent;
        }

        .card-body {
            padding: 25px;
        }

        .sidebar-toggle {
            border: 0;
            background: var(--bg-body);
            width: 42px;
            height: 42px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            font-size: 20px;
            color: var(--text-main);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
        }
        .sidebar-toggle:hover {
            border-color: #f43f5e;
            color: #f43f5e;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            z-index: 1040;
        }

        /* ==========================================================================
           5. RESPONSIVE MEDIA QUERIES
           ========================================================================== */
        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
                margin-left: 0 !important;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .sidebar-overlay.show {
                display: block;
            }

            .main-wrapper {
                margin-left: 0 !important;
            }
        }

        @media (max-width: 576px) {
            .topbar {
                padding: 0 15px;
            }

            .content {
                padding: 15px;
            }

            .user-info {
                display: none;
            }
        }
    </style>

    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>

    
    <aside id="sidebar" class="sidebar">
        
        <a href="<?php echo e(route('dashboard')); ?>" class="sidebar-brand">
            <span class="sidebar-brand-icon">
                <i class="bi bi-mortarboard-fill"></i>
            </span>
            <span>SIM Mahasiswa</span>
        </a>

        
        <div class="sidebar-menu">
            <div class="menu-title">Menu Utama</div>

            
            <a href="<?php echo e(route('dashboard')); ?>" class="sidebar-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>

            
            <a href="<?php echo e(route('mahasiswa.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('mahasiswa.*') ? 'active' : ''); ?>">
                <i class="bi bi-people-fill"></i>
                <span>Data Mahasiswa</span>
            </a>

            
            <a href="<?php echo e(route('prodi.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('prodi.*') ? 'active' : ''); ?>">
                <i class="bi bi-building"></i>
                <span>Program Studi</span>
            </a>

            <div class="menu-title mt-4">Pengaturan</div>

            
            <a href="<?php echo e(route('profile.edit')); ?>" class="sidebar-link <?php echo e(request()->routeIs('profile.*') ? 'active' : ''); ?>">
                <i class="bi bi-person-circle"></i>
                <span>Profile</span>
            </a>

            
            <form action="<?php echo e(route('logout')); ?>" method="POST" class="m-0 mt-2">
                <?php echo csrf_field(); ?>
                <button type="submit" class="sidebar-link border-0 bg-transparent w-100 text-start text-danger">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    
    <div id="sidebarOverlay" class="sidebar-overlay"></div>

    
    <div class="main-wrapper">
        
        
        <header class="topbar">
            <div class="topbar-left">
                
                <button id="sidebarToggle" class="sidebar-toggle" type="button">
                    <i class="bi bi-list"></i>
                </button>
                <div>
                    <h1 class="page-title"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h1>
                    <div class="page-subtitle">Sistem Informasi Data Mahasiswa</div>
                </div>
            </div>

            <div class="topbar-right">
                
                <button id="themeToggleBtn" class="theme-toggle-btn" title="Ganti Tema">
                    <i id="themeIcon" class="bi bi-moon-fill"></i>
                </button>

                
                <div class="user-profile">
                    <div class="user-info text-end d-none d-sm-block">
                        <div class="user-name"><?php echo e(auth()->user()->name); ?></div>
                        <div class="user-role">Administrator</div>
                    </div>
                    <div class="user-avatar">
                        <?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?>

                    </div>
                </div>
            </div>
        </header>

        
        <main class="content">
            
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            
            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert">
                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            
            <?php if($errors->any()): ?>
                <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4">
                    <strong>Terdapat kesalahan:</strong>
                    <ul class="mb-0 mt-2">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const mainWrapper = document.querySelector('.main-wrapper');
        const toggleBtn = document.getElementById('sidebarToggle');
        const overlay = document.getElementById('sidebarOverlay');

        // 1. Logika Toggle Sidebar (Desktop & Mobile)
        toggleBtn?.addEventListener('click', function () {
            if (window.innerWidth <= 991) {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
            } else {
                sidebar.classList.toggle('collapsed');
                mainWrapper.classList.toggle('expanded');
            }
        });

        overlay?.addEventListener('click', function () {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        });

        // 2. Logika Dark / Light Mode
        const themeToggleBtn = document.getElementById('themeToggleBtn');
        const themeIcon = document.getElementById('themeIcon');
        
        // Cek preferensi tersimpan di localStorage
        if (localStorage.getItem('sim_theme') === 'dark') {
            document.body.classList.add('dark-mode');
            themeIcon.classList.replace('bi-moon-fill', 'bi-sun-fill');
        }

        themeToggleBtn?.addEventListener('click', function () {
            document.body.classList.toggle('dark-mode');
            
            if (document.body.classList.contains('dark-mode')) {
                localStorage.setItem('sim_theme', 'dark');
                themeIcon.classList.replace('bi-moon-fill', 'bi-sun-fill');
            } else {
                localStorage.setItem('sim_theme', 'light');
                themeIcon.classList.replace('bi-sun-fill', 'bi-moon-fill');
            }
        });
    </script>

    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\Users\ACER\sim-mahasiswa\resources\views/layouts/app.blade.php ENDPATH**/ ?>