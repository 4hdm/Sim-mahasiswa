<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 25px 30px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #222;
        }

        /* HEADER */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
            color: #123b7a;
        }

        .header h2 {
            margin: 5px 0;
            font-size: 14px;
        }

        .header p {
            margin: 3px 0;
            color: #555;
        }

        .line {
            border-top: 2px solid #123b7a;
            margin-top: 10px;
            margin-bottom: 15px;
        }

        /* INFORMASI */
        .info {
            margin-bottom: 15px;
        }

        .info table {
            width: auto;
            border: none;
        }

        .info td {
            border: none;
            padding: 3px 10px 3px 0;
        }

        /* TABEL DATA */
        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table.data th {
            background: #123b7a;
            color: white;
            border: 1px solid #999;
            padding: 8px 6px;
            text-align: center;
            font-weight: bold;
        }

        table.data td {
            border: 1px solid #bbb;
            padding: 7px 6px;
        }

        table.data tr:nth-child(even) {
            background: #f5f7fa;
        }

        /* UTILITY & FOOTER */
        .center {
            text-align: center;
        }

        .footer {
            margin-top: 20px;
            font-size: 10px;
            color: #666;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }
    </style>
</head>
<body>

    
    <div class="header">
        <h1>SISTEM INFORMASI DATA MAHASISWA</h1>
        <h2>LAPORAN DATA MAHASISWA</h2>
        <p><?php echo e($namaProdi); ?></p>
    </div>

    <div class="line"></div>

    
    <div class="info">
        <table>
            <tr>
                <td><strong>Total Data</strong></td>
                <td>: <?php echo e($mahasiswas->count()); ?> Mahasiswa</td>
            </tr>
            <tr>
                <td><strong>Program Studi</strong></td>
                <td>: <?php echo e($namaProdi); ?></td>
            </tr>
            <?php if($search): ?>
                <tr>
                    <td><strong>Pencarian</strong></td>
                    <td>: <?php echo e($search); ?></td>
                </tr>
            <?php endif; ?>
            <tr>
                <td><strong>Tanggal Cetak</strong></td>
                <td>: <?php echo e(now()->translatedFormat('d F Y H:i')); ?></td>
            </tr>
        </table>
    </div>

    
    <?php if($mahasiswas->count() > 0): ?>
        <table class="data">
            <thead>
                <tr>
                    <th style="width: 40px;">No</th>
                    <th style="width: 110px;">NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Program Studi</th>
                    <th style="width: 90px;">Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $mahasiswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $mahasiswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="center"><?php echo e($index + 1); ?></td>
                        <td><?php echo e($mahasiswa->nim); ?></td>
                        <td><?php echo e($mahasiswa->nama); ?></td>
                        <td><?php echo e($mahasiswa->prodi->nama_prodi); ?></td>
                        <td class="center"><?php echo e($mahasiswa->jenis_kelamin); ?></td>
                        <td><?php echo e($mahasiswa->email ?? '-'); ?></td>
                        <td><?php echo e($mahasiswa->telepon ?? '-'); ?></td>
                        <td><?php echo e($mahasiswa->alamat ?? '-'); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="empty">
            Tidak ada data mahasiswa yang sesuai dengan filter.
        </div>
    <?php endif; ?>

    
    <div class="footer">
        Dicetak dari Sistem Informasi Data Mahasiswa<br>
        <?php echo e(config('app.name')); ?>

    </div>

</body>
</html><?php /**PATH C:\Users\ACER\sim-mahasiswa\resources\views/mahasiswa/pdf.blade.php ENDPATH**/ ?>