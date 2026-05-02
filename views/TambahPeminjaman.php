<?php
include_once "../controllers/PeminjamanController.php";
include_once "../controllers/BukuController.php";
include_once "../controllers/AnggotaController.php";

$controller = new PeminjamanController();
$bukuController = new BukuController();
$anggotaController = new AnggotaController();

$dataBuku = $bukuController->model->getAll();
$dataAnggota = $anggotaController->model->getAll();

if(isset($_POST['simpan'])) {
    $controller->model->create($_POST['id_anggota'], $_POST['id_buku'], $_POST['tanggal_pinjam'], $_POST['tanggal_kembali']);
    header("Location: ListPeminjaman.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman - Perpustakaan</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🔄 Tambah Peminjaman</h1>
            <p>Catat peminjaman buku baru</p>
        </div>
        
        <div class="content">
            <div class="form-container">
                <form method="POST">
                    <div class="form-group">
                        <label>Pilih Anggota</label>
                        <select name="id_anggota" required>
                            <option value="">-- Pilih Anggota --</option>
                            <?php while($row = $dataAnggota->fetch_assoc()) { ?>
                                <option value="<?= $row['id_anggota']; ?>">
                                    <?= $row['kode_anggota']; ?> - <?= $row['nama_anggota']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Pilih Buku</label>
                        <select name="id_buku" required>
                            <option value="">-- Pilih Buku --</option>
                            <?php while($row = $dataBuku->fetch_assoc()) { ?>
                                <option value="<?= $row['id_buku']; ?>">
                                    <?= $row['kode_buku']; ?> - <?= $row['judul_buku']; ?> (Stok: <?= $row['stok']; ?>)
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="tanggal_kembali" required>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" name="simpan" class="btn btn-primary">💾 Simpan</button>
                        <a href="ListPeminjaman.php" class="btn btn-back">← Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>