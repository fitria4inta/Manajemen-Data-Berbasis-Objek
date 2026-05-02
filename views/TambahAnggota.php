<?php
include_once "../controllers/AnggotaController.php";
$controller = new AnggotaController();

if(isset($_POST['simpan'])) {
    $controller->model->create($_POST['kode_anggota'], $_POST['nama_anggota'], $_POST['jenis_kelamin'], $_POST['alamat'], $_POST['no_hp']);
    header("Location: ListAnggota.php");
}
?>
<h2>Tambah Data Anggota</h2>
<form method="POST">
Kode Anggota :
<input type="text" name="kode_anggota" required>
<br><br>
Nama Anggota :
<input type="text" name="nama_anggota" required>
<br><br>
Jenis Kelamin :
<select name="jenis_kelamin" required>
    <option value="Laki-laki">Laki-laki</option>
    <option value="Perempuan">Perempuan</option>
</select>
<br><br>
Alamat :
<textarea name="alamat" rows="3" cols="20"></textarea>
<br><br>
No HP :
<input type="text" name="no_hp">
<br><br>
<button type="submit" name="simpan">Simpan</button>
</form>