<?php
include_once dirname(__DIR__) . "/config/Database.php";
include_once dirname(__DIR__) . "/models/Peminjaman.php";

class PeminjamanController {
    public $model;
    
    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->model = new Peminjaman($db);
    }
}
?>