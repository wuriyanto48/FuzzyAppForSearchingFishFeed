<?php

include_once "./db/koneksi_db.php";

class Jenis_pakan { // Kelas Model Jenis Pakan

    private $kode_pakan;
    private $kode_tipe;
    private $nama_pakan;
    private $harga;

    public function getKode_pakan() {
        return $this->kode_pakan;
    }

    public function getKode_tipe() {
        return $this->kode_tipe;
    }

    public function getNama_pakan() {
        return $this->nama_pakan;
    }

    public function getHarga() {
        return $this->harga;
    }

    public function setKode_pakan($kode_pakan) {
        $this->kode_pakan = $kode_pakan;
    }

    public function setKode_tipe($kode_tipe) {
        $this->kode_tipe = $kode_tipe;
    }

    public function setNama_pakan($nama_pakan) {
        $this->nama_pakan = $nama_pakan;
    }

    public function setHarga($harga) {
        $this->harga = $harga;
    }

}

class Jenis_pakan_detail { // Kelas Model Jenis Pakan Detail

    private $id;
    private $kode_pakan;
    private $bobot_kadar_air;
    private $bobot_protein;
    private $bobot_lemak;
    private $bobot_serat_kasar;
    private $bobot_kadar_abu;

    public function getId() {
        return $this->id;
    }

    public function getKode_pakan() {
        return $this->kode_pakan;
    }

    public function getBobot_kadar_air() {
        return $this->bobot_kadar_air;
    }

    public function getBobot_protein() {
        return $this->bobot_protein;
    }

    public function getBobot_lemak() {
        return $this->bobot_lemak;
    }

    public function getBobot_serat_kasar() {
        return $this->bobot_serat_kasar;
    }

    public function getBobot_kadar_abu() {
        return $this->bobot_kadar_abu;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setKode_pakan($kode_pakan) {
        $this->kode_pakan = $kode_pakan;
    }

    public function setBobot_kadar_air($bobot_kadar_air) {
        $this->bobot_kadar_air = $bobot_kadar_air;
    }

    public function setBobot_protein($bobot_protein) {
        $this->bobot_protein = $bobot_protein;
    }

    public function setBobot_lemak($bobot_lemak) {
        $this->bobot_lemak = $bobot_lemak;
    }

    public function setBobot_serat_kasar($bobot_serat_kasar) {
        $this->bobot_serat_kasar = $bobot_serat_kasar;
    }

    public function setBobot_kadar_abu($bobot_kadar_abu) {
        $this->bobot_kadar_abu = $bobot_kadar_abu;
    }

}

class Tipe_pakan {  // Kelas Model Tipe Pakan

    private $kode_tipe;
    private $nama_tipe;

    public function getKode_tipe() {
        return $this->kode_tipe;
    }

    public function getNama_tipe() {
        return $this->nama_tipe;
    }

    public function setKode_tipe($kode_tipe) {
        $this->kode_tipe = $kode_tipe;
    }

    public function setNama_tipe($nama_tipe) {
        $this->nama_tipe = $nama_tipe;
    }

}

class Jenis_pakan_gambar { // Kelas Model Untuk Gambar Jenis Pakan

    private $id;
    private $kode_pakan;
    private $gambar_pakan;

    public function getId() {
        return $this->id;
    }

    public function getKode_pakan() {
        return $this->kode_pakan;
    }

    public function getGambar_pakan() {
        return $this->gambar_pakan;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setKode_pakan($kode_pakan) {
        $this->kode_pakan = $kode_pakan;
    }

    public function setGambar_pakan($gambar_pakan) {
        $this->gambar_pakan = $gambar_pakan;
    }

}

interface Jenis_pakan_dao {

    public function save($kode_pakan, $kode_tipe, $nama_pakan, $harga);

    public function update($kode_pakan, $kode_tipe, $nama_pakan, $harga);

    public function delete($kode_pakan);

    public function find_one($kode_pakan);

    public function find_one_b($kode_pakan);

    public function find_all();

    public function find_all_limit($start, $batch);

    public function jumlah_data();
}

interface Jenis_pakan_detail_dao {

    public function save($kode_pakan, $bobot_kadar_air, $bobot_protein, $bobot_lemak, $bobot_serat_kasar, $bobot_kadar_abu);

    public function update($kode_pakan, $bobot_kadar_air, $bobot_protein, $bobot_lemak, $bobot_serat_kasar, $bobot_kadar_abu);

    public function delete($kode_pakan);

    public function find_one($kode_pakan);

    public function find_all();
}

interface Tipe_pakan_dao {

    public function save($kode_tipe, $nama_tipe);

    public function update($kode_tipe, $nama_tipe);

    public function delete($kode_tipe);

    public function find_one($kode_tipe);

    public function find_all();
}

interface Jenis_pakan_gambar_dao {

    public function save($kode_pakan, $gambar_pakan);

    public function update($kode_pakan, $gambar_pakan);

    public function delete($kode_pakan);

    public function find_one($kode_pakan);
}

class Jenis_pakan_dao_impl implements Jenis_pakan_dao {

    private $con;

    public function __construct() {
        $this->con = DbKoneksi::connect_db();
    }

    public function delete($kode_pakan) {
        $query = "DELETE FROM jenis_pakan WHERE kode_pakan = ?'";
        $prep = $this->con->prepare($query);
        $prep->bind_param("s", $kode_pakan);
        $prep->execute();
        $prep->close();
        $this->con->close();
    }

    public function find_all() {
        $hasil = array();
        $query = "SELECT * FROM jenis_pakan";
        $sql = $this->con->query($query);
        while ($res = $sql->fetch_assoc()) {
            $j = new Jenis_pakan();
            $j->setKode_pakan($res['kode_pakan']);
            $j->setKode_tipe($res['kode_tipe']);
            $j->setNama_pakan($res['nama_pakan']);
            $j->setHarga($res['harga']);
            $hasil[] = $j;
        }
        $sql->free();
        $this->con->close();
        return $hasil;
    }

    public function find_one($kode_pakan) {
        $j = new Jenis_pakan();
        $query = "SELECT * FROM jenis_pakan WHERE kode_pakan = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("s", $kode_pakan);
        $prep->execute();
        $prep->bind_result($kode_pakan_res, $kode_tipe_res, $nama_pakan_res, $harga_res);
        if ($prep->fetch()) {
            $j->setKode_pakan($kode_pakan_res);
            $j->setKode_tipe($kode_tipe_res);
            $j->setNama_pakan($nama_pakan_res);
            $j->setHarga($harga_res);
        }
        $prep->close();
        $this->con->close();
        return $j;
    }

    public function jumlah_data() {
        $jml = 0;
        $query = "SELECT COUNT(*) AS JUMLAH FROM jenis_pakan";
        $sql = $this->con->query($query);
        while ($res = $sql->fetch_assoc()) {
            $jml = $res['JUMLAH'];
        }
        return $jml;
    }

    public function save($kode_pakan, $kode_tipe, $nama_pakan, $harga) {
        $query = "INSERT INTO jenis_pakan(kode_pakan, kode_tipe, nama_pakan, harga)VALUES(?,?,?,?)";
        $prep = $this->con->prepare($query);
        $prep->bind_param("sssd", $kode_pakan, $kode_tipe, $nama_pakan, $harga);
        $prep->execute();
        $prep->close();
        $this->con->close();
    }

    public function update($kode_pakan, $kode_tipe, $nama_pakan, $harga) {
        $query = "UPDATE jenis_pakan SET kode_tipe = ?, nama_pakan = ?, harga = ? WHERE kode_pakan = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("ssds", $kode_tipe, $nama_pakan, $harga, $kode_pakan);
        $prep->execute();
        $this->con->close();
    }

    public function find_all_limit($start, $batch) {
        $hasil = array();
        $query = "SELECT kode_pakan,nama_tipe,nama_pakan,harga FROM jenis_pakan, tipe_pakan WHERE jenis_pakan.kode_tipe = tipe_pakan.kode_tipe LIMIT ?, ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("ii", $start, $batch);
        $prep->execute();
        $prep->bind_result($kode_pakan_res, $kode_tipe_res, $nama_pakan_res, $harga_res);
        while ($prep->fetch()) {
            $j = new Jenis_pakan();
            $j->setKode_pakan($kode_pakan_res);
            $j->setKode_tipe($kode_tipe_res);
            $j->setNama_pakan($nama_pakan_res);
            $j->setHarga($harga_res);
            $hasil[] = $j;
        }
        $prep->close();
        $this->con->close();
        return $hasil;
    }

    public function find_one_b($kode_pakan) {
        $j = new Jenis_pakan();
        $query = "SELECT * FROM jenis_pakan WHERE kode_pakan = '$kode_pakan'";
        $sql = $this->con->query($query);
        if ($sql) {
            $res = $sql->fetch_assoc();
            $j->setKode_pakan($res['kode_pakan']);
            $j->setKode_tipe($res['kode_tipe']);
            $j->setNama_pakan($res['nama_pakan']);
            $j->setHarga($res['harga']);
        }
        return $j;
    }

}

class Jenis_pakan_detail_dao_impl implements Jenis_pakan_detail_dao {

    private $con;

    public function __construct() {
        $this->con = DbKoneksi::connect_db();
    }

    public function delete($kode_pakan) {
        $query = "DELETE FROM jenis_pakan_detail WHERE kode_pakan = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("s", $kode_pakan);
        $prep->execute();
        $this->con->close();
    }

    public function find_all() {
        $hasil = array();
        $query = "SELECT * FROM jenis_pakan_detail";
        $sql = $this->con->query($query);
        while ($res = $sql->fetch_assoc()) {
            $j = new Jenis_pakan_detail();
            $j->setId($res['id']);
            $j->setKode_pakan($res['kode_pakan']);
            $j->setBobot_kadar_air($res['bobot_kadar_air']);
            $j->setBobot_protein($res['bobot_protein']);
            $j->setBobot_lemak($res['bobot_lemak']);
            $j->setBobot_serat_kasar($res['bobot_serat_kasar']);
            $j->setBobot_kadar_abu($res['bobot_kadar_abu']);
            $hasil[] = $j;
        }
        $sql->free();
        $this->con->close();
        return $hasil;
    }

    public function find_one($kode_pakan) {
        $j = new Jenis_pakan_detail();
        $query = "SELECT * FROM jenis_pakan_detail WHERE kode_pakan = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("s", $kode_pakan);
        $prep->execute();
        $prep->bind_result($id_res, $kode_pakan_res, $bobot_kadar_air_res, $bobot_protein_res, $bobot_lemak_res, $bobot_serat_kasar_res, $bobot_kadar_abu_res);
        if ($prep->fetch()) {
            $j->setId($id_res);
            $j->setKode_pakan($kode_pakan_res);
            $j->setBobot_kadar_air($bobot_kadar_air_res);
            $j->setBobot_protein($bobot_protein_res);
            $j->setBobot_lemak($bobot_lemak_res);
            $j->setBobot_serat_kasar($bobot_serat_kasar_res);
            $j->setBobot_kadar_abu($bobot_kadar_abu_res);
        }
        $prep->close();
        $this->con->close();
        return $j;
    }

    public function save($kode_pakan, $bobot_kadar_air, $bobot_protein, $bobot_lemak, $bobot_serat_kasar, $bobot_kadar_abu) {
        $query = "INSERT INTO jenis_pakan_detail(kode_pakan, bobot_kadar_air, bobot_protein, bobot_lemak, bobot_serat_kasar, bobot_kadar_abu)VALUES(?,?,?,?,?,?)";
        $prep = $this->con->prepare($query);
        $prep->bind_param("sddddd", $kode_pakan, $bobot_kadar_air, $bobot_protein, $bobot_lemak, $bobot_serat_kasar, $bobot_kadar_abu);
        $prep->execute();
        $prep->close();
        $this->con->close();
    }

    public function update($kode_pakan, $bobot_kadar_air, $bobot_protein, $bobot_lemak, $bobot_serat_kasar, $bobot_kadar_abu) {
        $query = "UPDATE jenis_pakan_detail SET bobot_kadar_air = ?, bobot_protein = ?, bobot_lemak = ?, bobot_serat_kasar = ?, bobot_kadar_abu = ? WHERE kode_pakan = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("ddddds", $bobot_kadar_air, $bobot_protein, $bobot_lemak, $bobot_serat_kasar, $bobot_kadar_abu, $kode_pakan);
        $prep->execute();
        $prep->close();
        $this->con->close();
    }

}

class Tipe_pakan_dao_impl implements Tipe_pakan_dao {

    private $con;

    public function __construct() {
        $this->con = DbKoneksi::connect_db();
    }

    public function delete($kode_tipe) {
        $query = "DELETE FROM tipe_pakan WHERE kode_tipe = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("s", $kode_tipe);
        $prep->execute();
        $prep->close();
        $this->con->close();
    }

    public function find_all() {
        $hasil = array();
        $query = "SELECT * FROM tipe_pakan";
        $sql = $this->con->query($query);
        while ($res = $sql->fetch_assoc()) {
            $t = new Tipe_pakan();
            $t->setKode_tipe($res['kode_tipe']);
            $t->setNama_tipe($res['nama_tipe']);
            $hasil[] = $t;
        }
        $sql->free();
        $this->con->close();
        return $hasil;
    }

    public function find_one($kode_tipe) {
        $t = new Tipe_pakan();
        $query = "SELECT * FROM tipe_pakan WHERE kode_tipe = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("s", $kode_tipe);
        $prep->execute();
        $prep->bind_result($kode_tipe_res, $nama_tipe_res);
        if ($prep->fetch()) {
            $t->setKode_tipe($kode_tipe_res);
            $t->setNama_tipe($nama_tipe_res);
        }
        $prep->close();
        $this->con->close();
        return $t;
    }

    public function save($kode_tipe, $nama_tipe) {
        $query = "INSERT INTO tipe_pakan(kode_tipe, nama_tipe)VALUES(?, ?)";
        $prep = $this->con->prepare($query);
        $prep->bind_param("ss", $kode_tipe, $nama_tipe);
        $prep->execute();
        $prep->close();
        $this->con->close();
    }

    public function update($kode_tipe, $nama_tipe) {
        $query = "UPDATE tipe_pakan SET nama_tipe = ? WHERE kode_tipe = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("ss", $nama_tipe, $kode_tipe);
        $prep->execute();
        $prep->close();
        $this->con->close();
    }

}

class Jenis_pakan_gambar_dao_impl implements Jenis_pakan_gambar_dao {

    private $con;

    public function __construct() {
        $this->con = DbKoneksi::connect_db();
    }

    public function delete($kode_pakan) {
        $query = "DELETE FROM jenis_pakan_gambar WHERE kode_pakan = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("s", $kode_pakan);
        $prep->execute();
        $prep->close();
        $this->con->close();
    }

    public function find_one($kode_pakan) {
        $j = new Jenis_pakan_gambar();
        $query = "SELECT * FROM jenis_pakan_gambar WHERE kode_pakan = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("s", $kode_pakan);
        $prep->execute();
        $prep->bind_result($id_res, $kode_pakan_res, $gambar_pakan_res);
        if ($prep->fetch()) {
            $j->setId($id_res);
            $j->setKode_pakan($kode_pakan_res);
            $j->setGambar_pakan($gambar_pakan_res);
        }
        $prep->close();
        $this->con->close();
        return $j;
    }

    public function save($kode_pakan, $gambar_pakan) {
        $query = "INSERT INTO jenis_pakan_gambar(kode_pakan, gambar_pakan)VALUES(?, ?)";
        $prep = $this->con->prepare($query);
        $null = NULL;
        $prep->bind_param("sb", $kode_pakan, $null);
        $prep->send_long_data(1, file_get_contents($gambar_pakan));
        $prep->execute();
        $prep->close();
        $this->con->close();
    }

    public function update($kode_pakan, $gambar_pakan) {
        $query = "UPDATE jenis_pakan_gambar SET gambar_pakan = ? WHERE kode_pakan = ?";
        $prep = $this->con->prepare($query);
        $null = NULL;
        $prep->bind_param("bs", $null, $kode_pakan);
        $prep->send_long_data(0, file_get_contents($gambar_pakan));
        $prep->execute();
        $prep->close();
        $this->con->close();
    }

}
