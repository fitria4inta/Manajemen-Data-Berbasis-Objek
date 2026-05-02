<?php
class Buku {

    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function getAll() {
        return $this->conn->query("SELECT * FROM buku");
    }
    
    public function getById($id) {
        return $this->conn->query("SELECT * FROM buku WHERE id_buku=$id");
    }
    
    public function create($kode_buku, $judul_buku, $penulis, $penerbit, $tahun_terbit, $stok) {
        return $this->conn->query("INSERT INTO buku(kode_buku, judul_buku, penulis, penerbit, tahun_terbit, stok) 
                                   VALUES('$kode_buku', '$judul_buku', '$penulis', '$penerbit', '$tahun_terbit', '$stok')");
    }
    
    public function update($id, $kode_buku, $judul_buku, $penulis, $penerbit, $tahun_terbit, $stok) {
        return $this->conn->query("UPDATE buku SET 
                                   kode_buku='$kode_buku', 
                                   judul_buku='$judul_buku', 
                                   penulis='$penulis', 
                                   penerbit='$penerbit', 
                                   tahun_terbit='$tahun_terbit', 
                                   stok='$stok' 
                                   WHERE id_buku=$id");
    }
    
    public function delete($id) {
        return $this->conn->query("DELETE FROM buku WHERE id_buku=$id");
    }
}
?>