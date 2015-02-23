<?php

final class DbKoneksi {

    public static function connect_db() {
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database_name = 'fuzzy_ikan_web';
        $con = new mysqli($host, $username, $password, $database_name);
        if ($con->connect_error) {
            die("Gagal terhubung ke database");
        }
        return $con;
    }

}
