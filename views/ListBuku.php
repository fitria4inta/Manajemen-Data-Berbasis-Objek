<?php
include_once "../controllers/BukuController.php";
$controller = new BukuController();
$data = $controller->model->getAll();
?>
<h2>Data Buku</h2>
<a href="TambahBuku.php">Tambah Data</a>
<br><br>
<table border="1" cellpadding="10">
<tr>
    <th>No</th>
    <th>Kode Buku</th>
    <th>Judul Buku</th>
    <th>Penulis</th>
    <th>Penerbit</th>
    <th>Tahun Terbit</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>
<?php
$no = 1;
while($row = $data->fetch_assoc()) {
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $row['kode_buku']; ?></td>
    <td><?= $row['judul_buku']; ?></td>
    <td><?= $row['penulis']; ?></td>
    <td><?= $row['penerbit']; ?></td>
    <td><?= $row['tahun_terbit']; ?></td>
    <td><?= $row['stok']; ?></td>
    <td>
        <a href="EditBuku.php?id=<?= $row['id_buku']; ?>">Edit</a>
        |
        <a href="../index.php?hapus_buku=<?= $row['id_buku']; ?>">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>