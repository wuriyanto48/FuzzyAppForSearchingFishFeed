<?php

include_once './db/koneksi_db.php';

class Jenis_ikan {

    private $kode;
    private $nama_jenis;
    private $keterangan;

    public function getKode() {
        return $this->kode;
    }

    public function getNama_jenis() {
        return $this->nama_jenis;
    }

    public function getKeterangan() {
        return $this->keterangan;
    }

    public function setKode($kode) {
        $this->kode = $kode;
    }

    public function setNama_jenis($nama_jenis) {
        $this->nama_jenis = $nama_jenis;
    }

    public function setKeterangan($keterangan) {
        $this->keterangan = $keterangan;
    }

}

class Jenis_ikan_gambar {

    private $id_gambar;
    private $kode_jenis_ikan;
    private $gambar_ikan;

    public function getId_gambar() {
        return $this->id_gambar;
    }

    public function getKode_jenis_ikan() {
        return $this->kode_jenis_ikan;
    }

    public function getGambar_ikan() {
        return $this->gambar_ikan;
    }

    public function setId_gambar($id_gambar) {
        $this->id_gambar = $id_gambar;
    }

    public function setKode_jenis_ikan($kode_jenis_ikan) {
        $this->kode_jenis_ikan = $kode_jenis_ikan;
    }

    public function setGambar_ikan($gambar_ikan) {
        $this->gambar_ikan = $gambar_ikan;
    }

}

interface Jenis_ikan_dao {

    public function save($kode, $nama_jenis, $keterangan);

    public function update($kode, $nama_jenis, $keterangan);

    public function delete($kode);

    public function find_one($kode);
    
    public function find_one_b($kode);

    public function find_all();

    public function find_all_limit($start, $batch);

    public function jumlah_data();
}

interface Jenis_ikan_gambar_dao {

    public function save($kode_jenis_ikan, $gambar_ikan);

    public function update($kode_jenis_ikan, $gambar_ikan);

    public function delete($kode_jenis_ikan);

    public function find_one($kode_jenis_ikan);
}

class Jenis_ikan_dao_impl implements Jenis_ikan_dao {

    private $con;

    public function __construct() {
        $this->con = DbKoneksi::connect_db();
    }

    public function delete($kode) {
        $query = "DELETE FROM jenis_ikan WHERE kode = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("s", $kode);
        $prep->execute();
        $prep->close();
        $this->con->close();
    }

    public function find_all() {
        $hasil = array();
        $query = "SELECT * FROM jenis_ikan";
        $sql = $this->con->query($query);
        while ($res = $sql->fetch_assoc()) {
            $j = new Jenis_ikan();
            $j->setKode($res['kode']);
            $j->setNama_jenis($res['nama_jenis']);
            $j->setKeterangan($res['keterangan']);
            $hasil[] = $j;
        }
        $sql->free();
        $this->con->close();
        return $hasil;
    }

    public function find_one($kode) {
        $j = new Jenis_ikan();
        $query = "SELECT * FROM jenis_ikan WHERE kode = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("s", $kode);
        $prep->execute();
        $prep->bind_result($kode_res, $nama_jenis_res, $keterangan_res);
        if ($prep->fetch()) {
            $j = new Jenis_ikan();
            $j->setKode($kode_res);
            $j->setNama_jenis($nama_jenis_res);
            $j->setKeterangan($keterangan_res);
        }
        $prep->close();
        $this->con->close();
        return $j;
    }

    public function jumlah_data() {
        $jml = 0;
        $query = "SELECT COUNT(*) AS JUMLAH FROM jenis_ikan";
        $sql = $this->con->query($query);
        while ($res = $sql->fetch_assoc()) {
            $jml = $res['JUMLAH'];
        }
        return $jml;
    }

    public function save($kode, $nama_jenis, $keterangan) {
        $query = "INSERT INTO jenis_ikan(kode, nama_jenis, keterangan)VALUES(?,?,?)";
        $prep = $this->con->prepare($query);
        $prep->bind_param("sss", $kode, $nama_jenis, $keterangan);
        $prep->execute();
        $prep->close();
        $this->con->close();
    }

    public function update($kode, $nama_jenis, $keterangan) {
        $query = "UPDATE jenis_ikan SET nama_jenis = ?, keterangan = ? WHERE kode = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("sss", $nama_jenis, $keterangan, $kode);
        $prep->execute();
        $prep->close();
        $this->con->close();
    }

    public function find_all_limit($start, $batch) {
        $hasil = array();
        $query = "SELECT * FROM jenis_ikan LIMIT ?,?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("ii", $start, $batch);
        $prep->execute();
        $prep->bind_result($kode, $nama_jenis, $keterangan);
        while ($prep->fetch()) {
            $j = new Jenis_ikan();
            $j->setKode($kode);
            $j->setNama_jenis($nama_jenis);
            $j->setKeterangan($keterangan);
            $hasil[] = $j;
        }
        $prep->close();
        $this->con->close();
        return $hasil;
    }

    public function find_one_b($kode) {
        $ji = new Jenis_ikan();
        $query = "SELECT * FROM jenis_ikan WHERE kode = '$kode'";
        $sql = $this->con->query($query);
        if($sql){
            $res = $sql->fetch_assoc();
            $ji->setKode($res['kode']);
            $ji->setNama_jenis($res['nama_jenis']);
            $ji->setKeterangan($res['keterangan']);
        }
        return $ji;
    }

}

class Jenis_ikan_gambar_dao_impl implements Jenis_ikan_gambar_dao {
    
    private $con;
    
    public function __construct() {
        $this->con = DbKoneksi::connect_db();
    }

    public function delete($kode_jenis_ikan) {
        $query = "DELETE FROM jenis_ikan_gambar WHERE kode_ikan = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("s", $kode_jenis_ikan);
        $prep->execute();
        $prep->close();
        $this->con->close();
    }

    public function find_one($kode_jenis_ikan) {
        $j = new Jenis_ikan_gambar();
        $query = "SELECT * FROM jenis_ikan_gambar WHERE kode_ikan = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("s", $kode_jenis_ikan);
        $prep->execute();
        $prep->bind_result($id, $kode_ikan, $gambar);
        if($prep->fetch()){
            $j->setId_gambar($id);
            $j->setKode_jenis_ikan($kode_ikan);
            $j->setGambar_ikan($gambar);
        }
        $prep->close();
        $this->con->close();
        return $j;
    }

    public function save($kode_jenis_ikan, $gambar_ikan) {
        $query = "INSERT INTO jenis_ikan_gambar(kode_ikan, gambar_ikan)VALUES(?, ?)";
        $prep = $this->con->prepare($query);
        $null = NULL;
        $prep->bind_param("sb", $kode_jenis_ikan, $null);
        $prep->send_long_data(1, file_get_contents($gambar_ikan));
        $prep->execute();
        $prep->close();
        $this->con->close();
    }

    public function update($kode_jenis_ikan, $gambar_ikan) {
        $query = "UPDATE jenis_ikan_gambar SET gambar_ikan = ? WHERE kode_ikan = ?";
        $prep = $this->con->prepare($query);
        $null = NULL;
        $prep->bind_param("bs",$null, $kode_jenis_ikan);
        $prep->send_long_data(0, file_get_contents($gambar_ikan));
        $prep->execute();
        $prep->close();
        $this->con->close();
    }

}
