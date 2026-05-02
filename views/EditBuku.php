<?php
include_once "../controllers/BukuController.php";
$controller = new BukuController();
$id = $_GET['id'];
$data = $controller->model->getById($id);
$row = $data->fetch_assoc();

if(isset($_POST['update'])) {
    $controller->model->update(
        $id,
        $_POST['kode_buku'],
        $_POST['judul_buku'],
        $_POST['penulis'],
        $_POST['penerbit'],
        $_POST['tahun_terbit'],
        $_POST['stok']
    );
    header("Location: ListBuku.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku - Perpustakaan</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>✏️ Edit Data Buku</h1>
            <p>Perbarui informasi buku</p>
        </div>
        
        <div class="content">
            <div class="form-container">
                <form method="POST">
                    <div class="form-group">
                        <label>Kode Buku</label>
                        <input type="text" name="kode_buku" value="<?= $row['kode_buku']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <input type="text" name="judul_buku" value="<?= $row['judul_buku']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Penulis</label>
                        <input type="text" name="penulis" value="<?= $row['penulis']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Penerbit</label>
                        <input type="text" name="penerbit" value="<?= $row['penerbit']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" value="<?= $row['tahun_terbit']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" name="stok" value="<?= $row['stok']; ?>" required>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" name="update" class="btn btn-primary">🔄 Update</button>
                        <a href="ListBuku.php" class="btn btn-back">← Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>