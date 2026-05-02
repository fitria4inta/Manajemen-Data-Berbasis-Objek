<?php
class Anggota {

    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function getAll() {
        return $this->conn->query("SELECT * FROM anggota");
    }
    
    public function getById($id) {
        return $this->conn->query("SELECT * FROM anggota WHERE id_anggota=$id");
    }
    
    public function create($kode_anggota, $nama_anggota, $jenis_kelamin, $alamat, $no_hp) {
        return $this->conn->query("INSERT INTO anggota(kode_anggota, nama_anggota, jenis_kelamin, alamat, no_hp) 
                                   VALUES('$kode_anggota', '$nama_anggota', '$jenis_kelamin', '$alamat', '$no_hp')");
    }
    
    public function update($id, $kode_anggota, $nama_anggota, $jenis_kelamin, $alamat, $no_hp) {
        return $this->conn->query("UPDATE anggota SET 
                                   kode_anggota='$kode_anggota', 
                                   nama_anggota='$nama_anggota', 
                                   jenis_kelamin='$jenis_kelamin', 
                                   alamat='$alamat', 
                                   no_hp='$no_hp' 
                                   WHERE id_anggota=$id");
    }
    
    public function delete($id) {
        return $this->conn->query("DELETE FROM anggota WHERE id_anggota=$id");
    }
}
?>