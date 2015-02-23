<?php

include_once "./db/koneksi_db.php";

class Admin {

    private $id;
    private $username;
    private $password;

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

}

interface Admin_dao {

    public function find_one($id);

    public function login($username, $password);
}

class Admin_dao_impl implements Admin_dao {
    
    private $con;
    
    public function __construct() {
        $this->con = DbKoneksi::connect_db();
    }

    public function find_one($id) {
        $a = new Admin();
        $query = "SELECT * FROM admin WHERE id = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("i", $id);
        $prep->execute();
        $prep->bind_result($id_res, $username, $password);
        if ($prep->fetch()) {
            $a->setId($id_res);
            $a->setUsername($username);
            $a->setPassword($password);
        }
        return $a;
    }

    public function login($username, $password) {
        $a = new Admin();
        $query = "SELECT * FROM admin WHERE username = ? AND password = ?";
        $prep = $this->con->prepare($query);
        $prep->bind_param("ss",$username, $password);
        $prep->execute();
        $prep->bind_result($id_res, $username_res, $password_res);
        if ($prep->fetch()) {
            $a->setId($id_res);
            $a->setUsername($username_res);
            $a->setPassword($password_res);
        }
        return $a;
    }

}
