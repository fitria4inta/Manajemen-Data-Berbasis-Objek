<?php
include_once "../controllers/AnggotaController.php";
$controller = new AnggotaController();
$data = $controller->model->getAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota - Perpustakaan</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>👥 Data Anggota</h1>
            <p>Kelola data anggota perpustakaan</p>
        </div>
        
        <div class="content">
            <div class="toolbar">
                <a href="TambahAnggota.php" class="btn btn-primary">+ Tambah Anggota Baru</a>
                <a href="../index.php" class="btn btn-back">← Kembali ke Dashboard</a>
            </div>
            
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Anggota</th>
                            <th>Nama Anggota</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No HP</th>
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
                            <td><?= $row['kode_anggota']; ?></td>
                            <td><strong><?= $row['nama_anggota']; ?></strong></td>
                            <td>
                                <?php if($row['jenis_kelamin'] == 'Laki-laki') { ?>
                                    <span style="background: #2196F3; padding: 3px 10px; border-radius: 20px; color: white;">👨 Laki-laki</span>
                                <?php } else { ?>
                                    <span style="background: #E91E63; padding: 3px 10px; border-radius: 20px; color: white;">👩 Perempuan</span>
                                <?php } ?>
                            </td>
                            <td><?= substr($row['alamat'], 0, 30); ?>...</td>
                            <td><?= $row['no_hp']; ?></td>
                            <td>
                                <a href="EditAnggota.php?id=<?= $row['id_anggota']; ?>" class="btn btn-edit">Edit</a>
                                <a href="../index.php?hapus_anggota=<?= $row['id_anggota']; ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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