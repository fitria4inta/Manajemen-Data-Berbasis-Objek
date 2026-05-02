<?php
include_once "../controllers/BukuController.php";
$controller = new BukuController();

if(isset($_POST['simpan'])) {
    $controller->model->create($_POST['kode_buku'], $_POST['judul_buku'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahun_terbit'], $_POST['stok']);
    header("Location: ListBuku.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku - Perpustakaan</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📖 Tambah Buku Baru</h1>
            <p>Masukkan data buku baru ke perpustakaan</p>
        </div>
        
        <div class="content">
            <div class="form-container">
                <form method="POST">
                    <div class="form-group">
                        <label>Kode Buku</label>
                        <input type="text" name="kode_buku" required placeholder="Contoh: B001">
                    </div>
                    
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <input type="text" name="judul_buku" required placeholder="Masukkan judul buku">
                    </div>
                    
                    <div class="form-group">
                        <label>Penulis</label>
                        <input type="text" name="penulis" required placeholder="Nama penulis">
                    </div>
                    
                    <div class="form-group">
                        <label>Penerbit</label>
                        <input type="text" name="penerbit" required placeholder="Nama penerbit">
                    </div>
                    
                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" required placeholder="Contoh: 2024">
                    </div>
                    
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" name="stok" required placeholder="Jumlah stok buku">
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" name="simpan" class="btn btn-primary">💾 Simpan</button>
                        <a href="ListBuku.php" class="btn btn-back">← Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>