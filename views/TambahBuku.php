<?php
include_once "../controllers/BukuController.php";
$controller = new BukuController();

if(isset($_POST['simpan'])) {
    $controller->model->create($_POST['kode_buku'], $_POST['judul_buku'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahun_terbit'], $_POST['stok']);
    header("Location: ListBuku.php");
}
?>
<h2>Tambah Data Buku</h2>
<form method="POST">
Kode Buku :
<input type="text" name="kode_buku" required>
<br><br>
Judul Buku :
<input type="text" name="judul_buku" required>
<br><br>
Penulis :
<input type="text" name="penulis" required>
<br><br>
Penerbit :
<input type="text" name="penerbit" required>
<br><br>
Tahun Terbit :
<input type="number" name="tahun_terbit" required>
<br><br>
Stok :
<input type="number" name="stok" required>
<br><br>
<button type="submit" name="simpan">Simpan</button>
</form>