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
<h2>Edit Data Anggota</h2>
<form method="POST">
Kode Anggota :
<input type="text" name="kode_anggota" value="<?= $row['kode_anggota']; ?>" required>
<br><br>
Nama Anggota :
<input type="text" name="nama_anggota" value="<?= $row['nama_anggota']; ?>" required>
<br><br>
Jenis Kelamin :
<select name="jenis_kelamin" required>
    <option value="Laki-laki" <?= $row['jenis_kelamin'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
    <option value="Perempuan" <?= $row['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
</select>
<br><br>
Alamat :
<textarea name="alamat" rows="3" cols="20"><?= $row['alamat']; ?></textarea>
<br><br>
No HP :
<input type="text" name="no_hp" value="<?= $row['no_hp']; ?>">
<br><br>
<button type="submit" name="update">Update</button>
</form>