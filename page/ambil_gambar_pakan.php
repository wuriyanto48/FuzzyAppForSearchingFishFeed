<?php

include_once "../page/model/jenis_pakan_model.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_GET['kode_pakan'])) {
    $kode_pakan = filter_input(INPUT_GET, 'kode_pakan');
    $token = filter_input(INPUT_GET, 'token');

    $cek = md5(md5($kode_pakan) . md5("kata diacak"));
    if ($token == $cek) {
        $jd = new Jenis_pakan_gambar_dao_impl();
        $j = $jd->find_one($kode_pakan);
        $gambar_pakan = $j->getGambar_pakan();
        header("Content-type: image/jpeg");
        echo $gambar_pakan;
    } else {
        echo "SQL Injection terdeteksi..";
    }
}