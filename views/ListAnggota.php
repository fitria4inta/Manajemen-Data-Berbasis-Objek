<?php
include_once "../controllers/AnggotaController.php";
$controller = new AnggotaController();
$data = $controller->model->getAll();
?>
<h2>Data Anggota</h2>
<a href="TambahAnggota.php">Tambah Data</a>
<br><br>
<table border="1" cellpadding="10">
<tr>
    <th>No</th>
    <th>Kode Anggota</th>
    <th>Nama Anggota</th>
    <th>Jenis Kelamin</th>
    <th>Alamat</th>
    <th>No HP</th>
    <th>Aksi</th>
</tr>
<?php
$no = 1;
while($row = $data->fetch_assoc()) {
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $row['kode_anggota']; ?></td>
    <td><?= $row['nama_anggota']; ?></td>
    <td><?= $row['jenis_kelamin']; ?></td>
    <td><?= $row['alamat']; ?></td>
    <td><?= $row['no_hp']; ?></td>
    <td>
        <a href="EditAnggota.php?id=<?= $row['id_anggota']; ?>">Edit</a>
        |
        <a href="../index.php?hapus_anggota=<?= $row['id_anggota']; ?>">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>