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
<h2>Tambah Data Peminjaman</h2>
<form method="POST">
Anggota :
<select name="id_anggota" required>
    <option value="">Pilih Anggota</option>
    <?php while($row = $dataAnggota->fetch_assoc()) { ?>
        <option value="<?= $row['id_anggota']; ?>"><?= $row['kode_anggota']; ?> - <?= $row['nama_anggota']; ?></option>
    <?php } ?>
</select>
<br><br>
Buku :
<select name="id_buku" required>
    <option value="">Pilih Buku</option>
    <?php while($row = $dataBuku->fetch_assoc()) { ?>
        <option value="<?= $row['id_buku']; ?>"><?= $row['kode_buku']; ?> - <?= $row['judul_buku']; ?></option>
    <?php } ?>
</select>
<br><br>
Tanggal Pinjam :
<input type="date" name="tanggal_pinjam" required>
<br><br>
Tanggal Kembali :
<input type="date" name="tanggal_kembali" required>
<br><br>
<button type="submit" name="simpan">Simpan</button>
</form>