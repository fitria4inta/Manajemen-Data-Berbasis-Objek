<?php
class Peminjaman {

    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function getAll() {
        return $this->conn->query("SELECT * FROM peminjaman");
    }
    
    public function getById($id) {
        return $this->conn->query("SELECT * FROM peminjaman WHERE id_peminjaman=$id");
    }
    
    public function create($id_anggota, $id_buku, $tanggal_pinjam, $tanggal_kembali) {
        return $this->conn->query("INSERT INTO peminjaman(id_anggota, id_buku, tanggal_pinjam, tanggal_kembali, status) 
                                   VALUES('$id_anggota', '$id_buku', '$tanggal_pinjam', '$tanggal_kembali', 'Dipinjam')");
    }
    
    public function update($id, $id_anggota, $id_buku, $tanggal_pinjam, $tanggal_kembali, $status) {
        return $this->conn->query("UPDATE peminjaman SET 
                                   id_anggota='$id_anggota', 
                                   id_buku='$id_buku', 
                                   tanggal_pinjam='$tanggal_pinjam', 
                                   tanggal_kembali='$tanggal_kembali', 
                                   status='$status' 
                                   WHERE id_peminjaman=$id");
    }
    
    public function delete($id) {
        return $this->conn->query("DELETE FROM peminjaman WHERE id_peminjaman=$id");
    }
}
?>