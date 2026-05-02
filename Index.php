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
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perpustakaan</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📚 Sistem Informasi Perpustakaan</h1>
            <p>Kelola data buku, anggota, dan peminjaman dengan mudah</p>
        </div>
        
        <div class="content">
            <div class="nav-menu">
                <a href="views/ListBuku.php" class="nav-card">
                    <h3>📖 Data Buku</h3>
                    <p>Kelola koleksi buku</p>
                </a>
                <a href="views/ListAnggota.php" class="nav-card">
                    <h3>👥 Data Anggota</h3>
                    <p>Kelola data anggota</p>
                </a>
                <a href="views/ListPeminjaman.php" class="nav-card">
                    <h3>🔄 Data Peminjaman</h3>
                    <p>Kelola transaksi peminjaman</p>
                </a>
            </div>
        </div>
    </div>
</body>
</html>