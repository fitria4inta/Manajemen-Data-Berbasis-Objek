<?php
// Handle Hapus Buku
if(isset($_GET['hapus_buku'])) {
    include_once "controllers/BukuController.php";
    $controller = new BukuController();
    $controller->model->delete($_GET['hapus_buku']);
    header("Location: index.php");
}

// Handle Hapus Anggota
if(isset($_GET['hapus_anggota'])) {
    include_once "controllers/AnggotaController.php";
    $controller = new AnggotaController();
    $controller->model->delete($_GET['hapus_anggota']);
    header("Location: index.php");
}

// Handle Hapus Peminjaman
if(isset($_GET['hapus_peminjaman'])) {
    include_once "controllers/PeminjamanController.php";
    $controller = new PeminjamanController();
    $controller->model->delete($_GET['hapus_peminjaman']);
    header("Location: index.php");
}
?>

<h1>Aplikasi Perpustakaan</h1>

<ul>
    <li><a href="views/ListBuku.php">Data Buku</a></li>
    <li><a href="views/ListAnggota.php">Data Anggota</a></li>
    <li><a href="views/ListPeminjaman.php">Data Peminjaman</a></li>
</ul>