<?php
include_once "../controllers/AnggotaController.php";
$controller = new AnggotaController();
$id = $_GET['id'];
$data = $controller->model->getById($id);
$row = $data->fetch_assoc();

if(isset($_POST['update'])) {
    $controller->model->update(
        $id,
        $_POST['kode_anggota'],
        $_POST['nama_anggota'],
        $_POST['jenis_kelamin'],
        $_POST['alamat'],
        $_POST['no_hp']
    );
    header("Location: ListAnggota.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota - Perpustakaan</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>✏️ Edit Data Anggota</h1>
            <p>Perbarui informasi anggota</p>
        </div>
        
        <div class="content">
            <div class="form-container">
                <form method="POST">
                    <div class="form-group">
                        <label>Kode Anggota</label>
                        <input type="text" name="kode_anggota" value="<?= $row['kode_anggota']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Nama Anggota</label>
                        <input type="text" name="nama_anggota" value="<?= $row['nama_anggota']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" required>
                            <option value="Laki-laki" <?= $row['jenis_kelamin'] == 'Laki-laki' ? 'selected' : ''; ?>>👨 Laki-laki</option>
                            <option value="Perempuan" <?= $row['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>👩 Perempuan</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" rows="3"><?= $row['alamat']; ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="no_hp" value="<?= $row['no_hp']; ?>">
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" name="update" class="btn btn-primary">🔄 Update</button>
                        <a href="ListAnggota.php" class="btn btn-back">← Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>