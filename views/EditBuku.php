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
<h2>Edit Data Buku</h2>
<form method="POST">
Kode Buku :
<input type="text" name="kode_buku" value="<?= $row['kode_buku']; ?>" required>
<br><br>
Judul Buku :
<input type="text" name="judul_buku" value="<?= $row['judul_buku']; ?>" required>
<br><br>
Penulis :
<input type="text" name="penulis" value="<?= $row['penulis']; ?>" required>
<br><br>
Penerbit :
<input type="text" name="penerbit" value="<?= $row['penerbit']; ?>" required>
<br><br>
Tahun Terbit :
<input type="number" name="tahun_terbit" value="<?= $row['tahun_terbit']; ?>" required>
<br><br>
Stok :
<input type="number" name="stok" value="<?= $row['stok']; ?>" required>
<br><br>
<button type="submit" name="update">Update</button>
</form>