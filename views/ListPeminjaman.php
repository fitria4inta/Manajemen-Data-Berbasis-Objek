<?php
include_once "../controllers/PeminjamanController.php";
$controller = new PeminjamanController();
$data = $controller->model->getAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman - Perpustakaan</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🔄 Data Peminjaman</h1>
            <p>Kelola transaksi peminjaman buku</p>
        </div>
        
        <div class="content">
            <div class="toolbar">
                <a href="TambahPeminjaman.php" class="btn btn-primary">+ Tambah Peminjaman</a>
                <a href="../index.php" class="btn btn-back">← Kembali ke Dashboard</a>
            </div>
            
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Anggota</th>
                            <th>ID Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while($row = $data->fetch_assoc()) {
                            $statusClass = $row['status'] == 'Dipinjam' ? '#FF9800' : '#4CAF50';
                            $statusIcon = $row['status'] == 'Dipinjam' ? '📖' : '✅';
                        ?>
                        <tr>
                            <td><?= $no++; ?> </td>
                            <td><?= $row['id_anggota']; ?></td>
                            <td><?= $row['id_buku']; ?></td>
                            <td><?= date('d/m/Y', strtotime($row['tanggal_pinjam'])); ?></td>
                            <td><?= date('d/m/Y', strtotime($row['tanggal_kembali'])); ?></td>
                            <td>
                                <span style="background: <?= $statusClass ?>; padding: 3px 10px; border-radius: 20px; color: white;">
                                    <?= $statusIcon ?> <?= $row['status']; ?>
                                </span>
                             </td>
                            <td>
                                <a href="EditPeminjaman.php?id=<?= $row['id_peminjaman']; ?>" class="btn btn-edit">Edit</a>
                                <a href="../index.php?hapus_peminjaman=<?= $row['id_peminjaman']; ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                             </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>