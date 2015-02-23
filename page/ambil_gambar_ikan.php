<?php

include_once "../page/model/jenis_ikan_model.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_GET['kode_ikan'])) {
    $kode_ikan = filter_input(INPUT_GET, 'kode_ikan');
    $token = filter_input(INPUT_GET, 'token');

    $cek = md5(md5($kode_ikan) . md5("kata diacak"));
    if ($token == $cek) {
        $jd = new Jenis_ikan_gambar_dao_impl();
        $j = $jd->find_one($kode_ikan);
        $gambar_ikan = $j->getGambar_ikan();
        header("Content-type: image/jpeg");
        echo $gambar_ikan;
    } else {
        echo "SQL Injection detected !!!";
    }
}