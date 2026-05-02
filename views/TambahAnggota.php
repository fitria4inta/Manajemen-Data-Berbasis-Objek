<?php
include_once "../controllers/AnggotaController.php";
$controller = new AnggotaController();

if(isset($_POST['simpan'])) {
    $controller->model->create($_POST['kode_anggota'], $_POST['nama_anggota'], $_POST['jenis_kelamin'], $_POST['alamat'], $_POST['no_hp']);
    header("Location: ListAnggota.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota - Perpustakaan</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>👥 Tambah Anggota Baru</h1>
            <p>Masukkan data anggota baru ke perpustakaan</p>
        </div>
        
        <div class="content">
            <div class="form-container">
                <form method="POST">
                    <div class="form-group">
                        <label>Kode Anggota</label>
                        <input type="text" name="kode_anggota" required placeholder="Contoh: A001">
                    </div>
                    
                    <div class="form-group">
                        <label>Nama Anggota</label>
                        <input type="text" name="nama_anggota" required placeholder="Nama lengkap anggota">
                    </div>
                    
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">👨 Laki-laki</option>
                            <option value="Perempuan">👩 Perempuan</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" rows="3" placeholder="Alamat lengkap anggota"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="no_hp" placeholder="Contoh: 08123456789">
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" name="simpan" class="btn btn-primary">💾 Simpan</button>
                        <a href="ListAnggota.php" class="btn btn-back">← Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>