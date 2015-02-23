<?php

include_once "./db/koneksi_db.php";

class Keanggotaan_umur {

    private $id;
    private $nama_keanggotaan;
    private $keterangan;

    public function getId() {
        return $this->id;
    }

    public function getNama_keanggotaan() {
        return $this->nama_keanggotaan;
    }

    public function getKeterangan() {
        return $this->keterangan;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNama_keanggotaan($nama_keanggotaan) {
        $this->nama_keanggotaan = $nama_keanggotaan;
    }

    public function setKeterangan($keterangan) {
        $this->keterangan = $keterangan;
    }

}

class Keanggotaan_harga {

    private $id;
    private $nama_keanggotaan;
    private $keterangan;

    public function getId() {
        return $this->id;
    }

    public function getNama_keanggotaan() {
        return $this->nama_keanggotaan;
    }

    public function getKeterangan() {
        return $this->keterangan;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNama_keanggotaan($nama_keanggotaan) {
        $this->nama_keanggotaan = $nama_keanggotaan;
    }

    public function setKeterangan($keterangan) {
        $this->keterangan = $keterangan;
    }

}

interface Keanggotaan_umur_dao {

    public function find_all();
    
}

interface Keanggotaan_harga_dao {

    public function find_all();
    
}

class Keanggotaan_umur_dao_impl implements Keanggotaan_umur_dao{
    private $con;
    
    public function __construct() {
        $this->con = DbKoneksi::connect_db();
    }
    
    public function find_all() {
        $hasil = array();
        $query = "SELECT * FROM keanggotaan_umur";
        $sql = $this->con->query($query);
        while($res = $sql->fetch_assoc()){
            $k = new Keanggotaan_umur();
            $k->setId($res['id']);
            $k->setNama_keanggotaan($res['nama_keanggotaan']);
            $k->setKeterangan($res['keterangan']);
            $hasil[] = $k;
        }
        $sql->free();
        $this->con->close();
        return $hasil;
    }

}

class Keanggotaan_harga_dao_impl implements Keanggotaan_harga_dao{
    private $con;
    
    public function __construct() {
        $this->con = DbKoneksi::connect_db();
    }
    
    public function find_all() {
        $hasil = array();
        $query = "SELECT * FROM keanggotaan_harga";
        $sql = $this->con->query($query);
        while($res = $sql->fetch_assoc()){
            $k = new Keanggotaan_harga();
            $k->setId($res['id']);
            $k->setNama_keanggotaan($res['nama_keanggotaan']);
            $k->setKeterangan($res['keterangan']);
            $hasil [] = $k;
        }
        $sql->free();
        $this->con->close();
        return $hasil;
    }

}
