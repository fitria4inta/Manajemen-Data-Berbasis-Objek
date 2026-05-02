<?php
include_once "../controllers/BukuController.php";
$controller = new BukuController();
$data = $controller->model->getAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku - Perpustakaan</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📖 Data Buku</h1>
            <p>Kelola data koleksi buku perpustakaan</p>
        </div>
        
        <div class="content">
            <div class="toolbar">
                <a href="TambahBuku.php" class="btn btn-primary">+ Tambah Buku Baru</a>
                <a href="../index.php" class="btn btn-back">← Kembali ke Dashboard</a>
            </div>
            
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while($row = $data->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['kode_buku']; ?></td>
                            <td><strong><?= $row['judul_buku']; ?></strong></td>
                            <td><?= $row['penulis']; ?></td>
                            <td><?= $row['penerbit']; ?></td>
                            <td><?= $row['tahun_terbit']; ?></td>
                            <td>
                                <span style="background: #e3f2fd; padding: 3px 10px; border-radius: 20px;">
                                    <?= $row['stok']; ?>
                                </span>
                            </td>
                            <td>
                                <a href="EditBuku.php?id=<?= $row['id_buku']; ?>" class="btn btn-edit">Edit</a>
                                <a href="../index.php?hapus_buku=<?= $row['id_buku']; ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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