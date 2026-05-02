<?php
include_once dirname(__DIR__) . "/config/Database.php";
include_once dirname(__DIR__) . "/models/Anggota.php";

class AnggotaController {
    public $model;
    
    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->model = new Anggota($db);
    }
}
?>