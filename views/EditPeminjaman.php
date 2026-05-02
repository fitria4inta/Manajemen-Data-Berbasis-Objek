<?php
include_once "../controllers/PeminjamanController.php";
include_once "../controllers/BukuController.php";
include_once "../controllers/AnggotaController.php";

$controller = new PeminjamanController();
$bukuController = new BukuController();
$anggotaController = new AnggotaController();

$id = $_GET['id'];
$data = $controller->model->getById($id);
$row = $data->fetch_assoc();

$dataBuku = $bukuController->model->getAll();
$dataAnggota = $anggotaController->model->getAll();

if(isset($_POST['update'])) {
    $controller->model->update(
        $id,
        $_POST['id_anggota'],
        $_POST['id_buku'],
        $_POST['tanggal_pinjam'],
        $_POST['tanggal_kembali'],
        $_POST['status']
    );
    header("Location: ListPeminjaman.php");
}
?>
<h2>Edit Data Peminjaman</h2>
<form method="POST">
Anggota :
<select name="id_anggota" required>
    <option value="">Pilih Anggota</option>
    <?php 
    $anggota = $dataAnggota;
    while($angg = $anggota->fetch_assoc()) { 
        $selected = ($angg['id_anggota'] == $row['id_anggota']) ? 'selected' : '';
    ?>
        <option value="<?= $angg['id_anggota']; ?>" <?= $selected; ?>><?= $angg['kode_anggota']; ?> - <?= $angg['nama_anggota']; ?></option>
    <?php } ?>
</select>
<br><br>
Buku :
<select name="id_buku" required>
    <option value="">Pilih Buku</option>
    <?php 
    $buku = $dataBuku;
    while($bk = $buku->fetch_assoc()) { 
        $selected = ($bk['id_buku'] == $row['id_buku']) ? 'selected' : '';
    ?>
        <option value="<?= $bk['id_buku']; ?>" <?= $selected; ?>><?= $bk['kode_buku']; ?> - <?= $bk['judul_buku']; ?></option>
    <?php } ?>
</select>
<br><br>
Tanggal Pinjam :
<input type="date" name="tanggal_pinjam" value="<?= $row['tanggal_pinjam']; ?>" required>
<br><br>
Tanggal Kembali :
<input type="date" name="tanggal_kembali" value="<?= $row['tanggal_kembali']; ?>" required>
<br><br>
Status :
<select name="status" required>
    <option value="Dipinjam" <?= $row['status'] == 'Dipinjam' ? 'selected' : ''; ?>>Dipinjam</option>
    <option value="Dikembalikan" <?= $row['status'] == 'Dikembalikan' ? 'selected' : ''; ?>>Dikembalikan</option>
</select>
<br><br>
<button type="submit" name="update">Update</button>
</form>