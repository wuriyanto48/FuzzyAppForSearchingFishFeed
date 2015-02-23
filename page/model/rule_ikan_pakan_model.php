<?php

include_once "./db/koneksi_db.php";

class Rule_ikan_pakan {

    private $id;
    private $kode_jenis_ikan;
    private $kode_jenis_pakan;
    private $umur_min;
    private $umur_max;

    public function getId() {
        return $this->id;
    }

    public function getKode_jenis_ikan() {
        return $this->kode_jenis_ikan;
    }

    public function getKode_jenis_pakan() {
        return $this->kode_jenis_pakan;
    }

    public function getUmur_min() {
        return $this->umur_min;
    }

    public function getUmur_max() {
        return $this->umur_max;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setKode_jenis_ikan($kode_jenis_ikan) {
        $this->kode_jenis_ikan = $kode_jenis_ikan;
    }

    public function setKode_jenis_pakan($kode_jenis_pakan) {
        $this->kode_jenis_pakan = $kode_jenis_pakan;
    }

    public function setUmur_min($umur_min) {
        $this->umur_min = $umur_min;
    }

    public function setUmur_max($umur_max) {
        $this->umur_max = $umur_max;
    }

}

interface Rule_ikan_pakan_dao {

    public function save($id, $kode_jenis_ikan, $kode_jenis_pakan, $umur_min, $umur_max);

    public function update($id, $kode_jenis_ikan, $kode_jenis_pakan, $umur_min, $umur_max);

    public function delete($id);

    public function find_one($id);

    public function find_one_b($id);

    public function find_all();

    public function find_all_limit($start, $batch);

    public function jumlah_data();
}

class Rule_ikan_pakan_dao_impl implements Rule_ikan_pakan_dao {

    private $con;

    public function __construct() {
        $this->con = DbKoneksi::connect_db();
    }

    public function delete($id) {
        $query = "DELETE FROM rule_ikan_pakan WHERE id = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("s", $id);
        $prep->execute();
        $prep->close();
        $this->con->close();
    }

    public function find_all() {
        $hasil = array();
        $query = "SELECT * FROM rule_ikan_pakan";
        $sql = $this->con->query($query);
        while ($res = $sql->fetch_assoc()) {
            $r = new Rule_ikan_pakan();
            $r->setId($res['id']);
            $r->setKode_jenis_ikan($res['kode_jenis_ikan']);
            $r->setKode_jenis_pakan($res['kode_jenis_pakan']);
            $r->setUmur_min($res['umur_min']);
            $r->setUmur_max($res['umur_max']);
            $hasil[] = $r;
        }
        $sql->free();
        $this->con->close();
        return $hasil;
    }

    public function find_one($id) {
        $r = new Rule_ikan_pakan();
        $query = "SELECT * FROM rule_ikan_pakan WHERE id = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("s", $id);
        $prep->execute();
        $prep->bind_result($id_res, $kode_jenis_ikan_res, $kode_jenis_pakan_res, $umur_min_res, $umur_max_res);
        if ($prep->fetch()) {
            $r->setId($id_res);
            $r->setKode_jenis_ikan($kode_jenis_ikan_res);
            $r->setKode_jenis_pakan($kode_jenis_pakan_res);
            $r->setUmur_min($umur_min_res);
            $r->setUmur_max($umur_max_res);
        }
        return $r;
    }

    public function jumlah_data() {
        $jml = 0;
        $query = "SELECT COUNT(*) AS JUMLAH FROM rule_ikan_pakan";
        $sql = $this->con->query($query);
        while ($res = $sql->fetch_assoc()) {
            $jml = $res['JUMLAH'];
        }
        return $jml;
    }

    public function save($id, $kode_jenis_ikan, $kode_jenis_pakan, $umur_min, $umur_max) {
        $query = "INSERT INTO rule_ikan_pakan(id, kode_jenis_ikan, kode_jenis_pakan, umur_min, umur_max)VALUES(?,?,?,?,?)";
        $prep = $this->con->prepare($query);
        $prep->bind_param("sssdd", $id, $kode_jenis_ikan, $kode_jenis_pakan, $umur_min, $umur_max);
        $prep->execute();
        $prep->close();
        $this->con->close();
    }

    public function update($id, $kode_jenis_ikan, $kode_jenis_pakan, $umur_min, $umur_max) {
        $query = "UPDATE rule_ikan_pakan SET kode_jenis_ikan = ?, kode_jenis_pakan = ?, umur_min = ?, umur_max = ? WHERE id = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("ssdds", $kode_jenis_ikan, $kode_jenis_pakan, $umur_min, $umur_max, $id);
        $prep->execute();
        $prep->close();
        $this->con->close();
    }

    public function find_all_limit($start, $batch) {
        $hasil = array();
        $query = "SELECT id, nama_jenis, nama_pakan, umur_min, umur_max FROM rule_ikan_pakan, jenis_ikan, jenis_pakan WHERE rule_ikan_pakan.kode_jenis_ikan = jenis_ikan.kode AND rule_ikan_pakan.kode_jenis_pakan = jenis_pakan.kode_pakan LIMIT ?, ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("ii", $start, $batch);
        $prep->execute();
        $prep->bind_result($id_res, $kode_jenis_ikan_res, $kode_jenis_pakan_res, $umur_min_res, $umur_max_res);
        while ($prep->fetch()) {
            $r = new Rule_ikan_pakan();
            $r->setId($id_res);
            $r->setKode_jenis_ikan($kode_jenis_ikan_res);
            $r->setKode_jenis_pakan($kode_jenis_pakan_res);
            $r->setUmur_min($umur_min_res);
            $r->setUmur_max($umur_max_res);
            $hasil[] = $r;
        }
        $prep->close();
        $this->con->close();
        return $hasil;
    }

    public function find_one_b($id) {
        $r = new Rule_ikan_pakan();
        $query = "SELECT * FROM rule_ikan_pakan WHERE id = '$id'";
        $sql = $this->con->query($query);
        if ($sql) {
            $res = $sql->fetch_assoc();
            $r->setId($res['id']);
            $r->setKode_jenis_ikan($res['kode_jenis_ikan']);
            $r->setKode_jenis_pakan($res['kode_jenis_pakan']);
            $r->setUmur_min($res['umur_min']);
            $r->setUmur_max($res['umur_max']);
        }
        $this->con->close();
        return $r;
    }

}
